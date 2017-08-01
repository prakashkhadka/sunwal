<?php

namespace App\Http\Controllers;

use App\Adviewcounter;
use App\Message;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = Auth::user()->userInfo;
        $userInfo['name'] = Auth::user()->name;
        //$userInfo['adNumber'] = Auth::user()->ads()->title;
        $userId = Auth::user()->id;
        $adNumber = Ad::where('user_id', $userId)->count();
        $myMessageNumber = Message::where('seller_id', $userId)->count();
        $rmAd = Ad::withTrashed()->where('user_id', $userId)->whereNotNull('deleted_at')->count();
        $maxViewCount = Adviewcounter::max('counter');
        //Id of the most viewed counter
        $maxViewedId = Adviewcounter::where('counter', $maxViewCount)->first()->ad_id;

        
        $maxViewedAd = Ad::where('id', $maxViewedId)->first();
        return view('user/home', compact('userInfo', 'adNumber', 'myMessageNumber', 'rmAd', 'maxViewedAd', 'maxViewCount'));
    }

    
}
