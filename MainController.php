<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    //
    function index()
    {
    	return view('Login');
    }
    function checklogin(Request $request)
    {
    	$this->validate($request,[
        'email'   => 'required| email',
        'password'  => 'required | alphaNum|min:5'
    	]);

    	$user_data = array(
     'email' => $request->get('email'),
     'password' => $request ->get('password')
    	);
    	if(Auth::attempt($user_data))
    	{
          return redirect('main/sucesslogin');
    	}else{
             return back()->with('error','Wrong login Details');
    	}
    }

    function successlogin(){
    	return view('successlogin');
    }

    function logout(){
    	Auth::logout();
    	return redirect('main');
    }
     
}
