<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct(); 
        $this->middleware('auth');
        //$this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

        $users=User::select(\DB::raw('count(*) as total, status'))->groupBy('status')->get();

        return view('admin.admin_home',compact('users'));
    }
    
}
