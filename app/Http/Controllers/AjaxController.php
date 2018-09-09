<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\LoveCount;
use App\Excursion;
use App\Trip;




class AjaxController extends Controller
{
	public function __construct(){
        parent::__construct();       
    }

    public function changeLanguage(){
    	if (request()->ajax())
		{                     
             session()->forget('langsName');
             $langsVal=request()->get('langsVal');
             session()->put('langsName',$langsVal);            
             return session()->get('langsName');
		}

    }

    public function addLoves(){
        if (request()->ajax())
        {   
            $data=request()->all();
            $excursions=array();
            $trips=array();
            if($data['dataItems']=='excurtions'){
                $excursions=Excursion::where('slug',$data['dataSlug'])->pluck('id');
                if(count($excursions)>0){
                    foreach ($excursions as $key => $value) {
                        $newData[$key]['excursion_id']=$value;
                        $newData[$key]['lang_id']=$data['dataLangId'];
                        $newData[$key]['count']=1;
                        $newData[$key]['trip_id']=0;
                        $newData[$key]['visitor_ip']=request()->ip();
                        $newData[$key]['created_at']=\Carbon\Carbon::now()->toDateTimeString();
                    }

                    $insertsArr=LoveCount::insert($newData);

                    session()->push('hurtigruten.excursions',$data['dataSlug']);  
                }

            }else{
                $trips=Trip::where('slug',$data['dataSlug'])->pluck('id');
                if(count($trips)>0){
                    foreach ($trips as $key => $value) {
                        $newData[$key]['excursion_id']=0;
                        $newData[$key]['lang_id']=$data['dataLangId'];
                        $newData[$key]['count']=1;
                        $newData[$key]['trip_id']=$value;
                        $newData[$key]['visitor_ip']=request()->ip();
                        $newData[$key]['created_at']=\Carbon\Carbon::now()->toDateTimeString();
                        
                    }
                    $insertsArr=LoveCount::insert($newData);

                    session()->push('hurtigruten.trips',$data['dataSlug']);  
                }
            }

             return 1;
        }

    }

    public function getexcursions() {
        $trip_slug = request()->trip_slug;
        $trip_id = Trip::where('lang_id', $this->langsName)->where('slug', $trip_slug)->pluck('id', 'slug')->first();
        $excurtion = Excursion::where('trip_id', $trip_id)->where('published', 1)->pluck('title', 'id');
        return response()->json($excurtion);

    }
   
}
