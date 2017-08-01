<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use App\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin'); // This uses admin guard instead of default web guard
    }
    
    public function waitingMessage(){
    	$waitingMessages = Contactus::where('replied', 0)->get();
    	return view('admin.waitingMessages', compact('waitingMessages'));
    }

    public function complaint(){
    	$complaints = Complaint::all();
    	return view('admin.complaints', compact('complaints'));
    }
}
