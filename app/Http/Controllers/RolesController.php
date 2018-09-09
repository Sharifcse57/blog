<?php

namespace App\Http\Controllers;
use App\Permission;
use App\Role;
use App\RolePermission;
use App\User;
use Illuminate\Http\Request;
use Redirect;
use Route;
use Validator;

class RolesController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$roles = Role::orderBy('is_deletable', 'desc')->get();
		$roleArr = Role::pluck('name', 'id');
		//dd($roles);
		return View('admin.roles.index', compact('roles', 'roleArr'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		/*create permission*/
		//$this->createRolePermission();

		$permission = array();
		$parents = Permission::where('parent_id', NULL)->orderBy('name')->pluck('name', 'id')->toArray();
		$childs = Permission::whereIn('parent_id', array_keys($parents))->get(array('name', 'id', 'parent_id'));
		foreach ($childs as $ele) {
			$arrr[$ele->parent_id][$ele->id] = $ele->name;
		}

		foreach ($parents as $key => $parent) {
			foreach ($arrr[$key] as $key2 => $child) {
				$permission[$parent][$key2] = $child;
			}
		}

		return View('admin.roles.create', compact('permission', 'parents'))->render();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$data = request()->only('name', 'description', 'status', 'is_deletable');
		$data_all = request()->except('name', 'description', 'status', 'is_deletable', '_token');
		$validator = Validator::make($data,
			array(
				'name' => 'required|unique:roles',
			)
		);

		if ($validator->fails()) {
			return redirect()->route("roles.create")
				->withErrors($validator)
				->withInput();
		}
		//print_r($data); exit;
		$roles = Role::create($data);
		if ($roles) {
			$data2['role_id'] = $roles->id;
			foreach ($data_all as $data_one) {
				$data2['permission_id'] = $data_one;
				$all_done = RolePermission::create($data2);

			}
			if ($all_done) {
				$message = "You have successfully created";
				return redirect()->route('roles.index')
					->with('flash_success', $message);
			}
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$roles = Role::findorfail($id);
		$permissions = Permission::with('children')->whereNull('parent_id')->orderBy('name')->get()->toArray();
		$checkPermissions = RolePermission::with('Permission')->where('role_id', $id)->pluck('permission_id')->toArray();
		return View('admin.roles.edit', compact('permissions', 'checkPermissions', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$validator = Validator::make($data = request()->only('name', 'description', 'status', 'is_deletable'),
			array(
				'name' => 'required|unique:roles,name,' . $id,
			)
		);
		if ($validator->fails()) {
			return redirect()->route('roles.edit', $id)
				->withErrors($validator)
				->withInput();
		}
		//dd($data);
		$permissions = request()->get('permissions');
		if (!isset($permissions)) {$permissions = array();}
		$Role = Role::find($id);
		$Role->fill($data);
		$Role->save();
		$Role->permissions()->sync($permissions);
		if ($Role) {
			$message = "You have successfully updated";
			return redirect()->route('roles.edit', $id)
				->with('flash_success', $message);

		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$data = request()->only('role_id');
		$applyed = User::where('role_id', $id)->update($data);
		$permissionDelete = RolePermission::where('role_id', $id)->delete();
		$Role = Role::destroy($id);
		if ($Role) {
			$message = "You have successfully deleted";
			return redirect()->route('roles.index')
				->with('flash_success', $message);
		}

	}

	private function createRolePermission() {
		$allRoutes = Route::getRoutes();
		$controllers = array();

		foreach ($allRoutes as $route) {
			$action = $route->getAction();

			if (array_key_exists('controller', $action)) {
				$controllerAction = explode('@', $action['controller']);
				$controllers[class_basename($controllerAction[0])][$controllerAction[1]] = $controllerAction[1];
				//dd(class_basename($controllerAction[0]));
			}
		}

		// permission not need for this following controlles
		unset($controllers['SitesController'], $controllers['AjaxController'], $controllers['ForgotPasswordController'], $controllers['ResetPasswordController'], $controllers['HomeController'], $controllers['LoginController']);

		//dd($controllers);
		foreach ($controllers as $key => $controller) {

			$data['name'] = $key;
			$parent = Permission::firstOrCreate($data);
			if ($parent) {
				$data2['parent_id'] = $parent->id;
				foreach ($controller as $elements) {
					$data2['name'] = $elements;
					$all_done = Permission::firstOrCreate($data2);
				}
			}
		}

	}

}
