<?php

namespace App\Http\Controllers;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use App\SiteSetting;

class SiteSettingsController extends Controller
{

	public function __construct(){
        parent::__construct();       
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{			

		$site_settings = SiteSetting::findOrFail($id);				
		//dd($banners);
		return View('admin.site_settings.edit',compact('site_settings'));
		
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data=request()->except('_method','_token','lang_id');		
		
		$validator=Validator::make($data,
			array(				
				'name'=>'required',
				'email'=>'required|email',
				'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',				
				)
		);

		if($validator->fails()){
			return Redirect::route("site_settings.edit",$id)
					->withErrors($validator)
					->withInput();
		}	

		//dd($data);
		$imageName=null;
		$file=request()->file('logo');	
		$old_image_name = $data['old_image'];	
			if($file != null){				
				$imageName = time().'_'.get_file_name($file->getClientOriginalName());				
				$data['logo']=$imageName;						
		}

		//dd($data);
		
		unset($data['old_image']);	
		$site_settings_data = SiteSetting::where('id',$id)->update($data);		

		if($site_settings_data){													
				if($imageName!=null){
					\Storage::delete('sites/site_settings/'.$old_image_name);
					$file->storeAs('sites/site_settings',$imageName);					
				}

				$message="You have successfully updated";
				return redirect()->route('site_settings.edit',$id)
					->with('flash_success',$message);
		}else{

			$message="You don't update anything";
				return redirect()->route('site_settings.edit',$id)
					->with('flash_warning',$message);
		}			
	}

	
}
