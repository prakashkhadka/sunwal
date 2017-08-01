<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostsReviewController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin'); // This uses admin guard instead of default web guard
    }

    public function waitingPosts(){
    	
    	$waitingAds = Ad::where('allowed', 0)->get();

    	return view('admin.waitingPosts', compact('waitingAds'));
    }

    public function singleAdToApprove($id){
    	$adminID = Auth::user()->id;
    	$adToApprove = Ad::where('id', $id)->get();
    	return view('admin.singleAdToApprove', compact('adToApprove', 'adminID'));
    }

    public function approvePost($adID, $adminID){
    	$adminId = Auth::user()->id;
    	if($adminId == $adminID){
    		
    		$input['adminwhoallowed'] = $adminId;
    		$input['allowed'] = 1;

    		Ad::where('id', $adID)->update($input);
    		return redirect('admin/waitingPosts');

    	}
    	else{
    		return "Unauthrorised";
    	}
    }
}
