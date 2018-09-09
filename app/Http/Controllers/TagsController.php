<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Validator;

class TagsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$tags = Tag::orderBy('id', 'desc')->get();
		return view('admin.tags.create', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$tags = Tag::orderBy('id', 'desc')->get();
		return view('admin.tags.create', compact('tags'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {
		$data = request()->all();
		$validator = Validator::make($data,
			array(
				'name' => 'required',
			)
		);

		if ($validator->fails()) {
			return Redirect()->route("tags.create")
				->withErrors($validator)
				->withInput();
		}
		$tags = Tag::create($data);
		if ($tags) {
			$message = "You have successfully created";
			return Redirect()->route('tags.index')
				->with('flash_success', $message);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$tags = Tag::where('id', $id)->first();
		return View('admin.tags.edit', compact('tags'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id) {
		$data = request()->except('_method', '_token');
		$validator = Validator::make($data,
			array(
				'name' => 'required',
			)
		);

		if ($validator->fails()) {
			return Redirect()->route("tags.edit", $id)
				->withErrors($validator)
				->withInput();
		}
		$tags = Tag::where('id', $id)->update($data);
		if ($tags) {
			$message = "You have successfully updated";
			return redirect()->route('tags.create')
				->with('flash_success', $message);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$tags = Tag::where('id', $id)->delete();
		if ($tags) {
			$message = "You have successfully deleted";
			return redirect()->route('tags.create')
				->with('flash_success', $message);
		} else {
			$message = "Data could not be deleted";
			return redirect()->route('tags.create')
				->with('flash_error', $message);
		}
	}
}
