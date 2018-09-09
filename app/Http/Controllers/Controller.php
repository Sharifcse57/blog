<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use App\RolePermission;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    public $menu_list; 

	public function __construct(){
    	$this->middleware(function ($request, $next) {    		
            if($request->user()){
                $this->menu_list=RolePermission::select('permission_id')->with(['permission'=>function($q){
                        $q->select('id','name','parent_id');
                }])->where('role_id',$request->user()->role_id)->get()->toArray();                
                //dump($this->menu_list);               
                $controllerArr = [];
                $allIndexes = [];
                foreach( $this->menu_list as $key => $value){                
                    if($value['permission']['parent_id'] == null){
                        $controllerArr[$value['permission']['id']] = $value['permission']['name'];
                    }else{  
                        $allIndexes[] = $controllerArr[$value['permission']['parent_id']].'@'.$value['permission']['name'];
                    }  
                }  
                view()->share('menu_list',$allIndexes);
            }
            return $next($request);
        }); 
	}

}
