<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperAdminLoginController extends Controller
{
	public function __construct(){
		$this->middleware('guest:superAdmin');
	}

    public function showLoginForm(){
    	return view('auth.superAdmin-login');
    	//return "Is working";
    }

    public function login(Request $request){
    	//return true;
    	
    	
    	

    	// Validate form data
    	
    	$this->validate($request, [
    			'email'=>'required|email',
    			'password'=>'required|min:6'
    		]);

    	// Attempt to log the admin in
    	if(Auth::guard('superAdmin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
    		// If successful, redirect to their intended location
    		return redirect()->intended(route('superAdmin.dashboard'));
    	}
    	// If the form data is not validated, it redirects to login
    	// If unsuccessful, then redirect back to login with the form data
    	else{
    		return redirect()->back()->withInput($request->only('email', 'remember'));
    	}
    	
    }
}
