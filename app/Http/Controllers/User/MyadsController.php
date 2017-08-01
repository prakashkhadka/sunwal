<?php

namespace App\Http\Controllers\User;

use App\Adviewcounter;
use App\Adimage;
use App\Messagereply;
use App\Message;
use App\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MyadsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userInfo = Auth::user()->userInfo;
        $userInfo['name'] = Auth::user()->name;
        $userId = Auth::user()->id;
        $adNumber = Ad::where('user_id', $userId)->count();
        $rmAd = Ad::withTrashed()->where('user_id', $userId)->orderBy('deleted_at', 'desc')->whereNotNull('deleted_at')->count();
        $myItems = Ad::where('user_id',$userId)->orderBy('created_at', 'desc')->paginate(10);
        $myMessageNumber = Message::where('seller_id', $userId)->count();
        
        return view('user.myads', compact('userInfo', 'adNumber', 'myItems','myMessageNumber', 'rmAd', 'maxViewedAd'));
    }
    public function myAdSinglePage($catId, $slug){
        $adContent = Ad::where('slug', $slug)->first();
        $maxViewCount = Adviewcounter::max('counter');
        
        return view('user/myAdSingle', compact('adContent', 'maxViewCount'));
    }

    public function myMessage(){
        $userId = Auth::user()->id;
        $messages = Message::where('seller_id',$userId)->orderBy('created_at', 'desc')->get();
        $gpumsg = Messagereply::where('user_id', $userId)->get();
        
        
        
        return view('user.myMessage', compact('messages', 'gpumsg'));
    }

    public function messageReply(Request $request){

        $this->validate($request, [
            'message'=>'required|min:5|max:1000'
        ]);
        
        $input = $request->all();
        $input['sender_id'] = Auth::user()->id;
        Messagereply::create($input);
        return back();
    }

    public function deleteMessage($id){
        $msg = Message::findOrFail($id);
        $msg->delete();
        Session::flash('deleteSuccess', 'message');
        return back();
    }

    public function deleteMessageReply($id){
        $msg = Messagereply::findOrFail($id);
        $msg->delete();
        Session::flash('deleteSuccessReply', 'message');
        return back();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        Session::flash('deleteMyAd', 'message');
        return redirect('myAds');
    }

    public function removedAds($userID){
        $authUser = Auth::user()->id;
        if($authUser == $userID){
            $removedAds = Ad::onlyTrashed()->where('user_id', $userID)->orderBy('deleted_at', 'desc')->paginate(10);
            return view('user/removedItems', compact('removedAds'));
        }
    }

    public function deleteForever($adID, $userID){
        //return $adID . "User id is : " . $userID;
        $authUser = Auth::user()->id;
        if($userID == $authUser){
            //return "User is authenticated";
            $ad = Ad::onlyTrashed()->where('id', $adID)->forceDelete();
            Session::flash('deleteForever', 'message');
            return back();
        }
    }
    public function restore($adID, $userID){
        //return $adID . "User id is : " . $userID;
        $authUser = Auth::user()->id;
        if($userID == $authUser){
            //return "User is authenticated";
            $ad = Ad::onlyTrashed()->where('id', $adID)->restore();
            Session::flash('restore', 'message');
            return back();

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function removeImg($adID, $imgName){
        
       

        unlink(public_path() . '/productImages/' . $imgName);
        $img = Adimage::where('file', $imgName)->delete();
        $img->delete();
        //$imgNo = Adimage::where("ad_id", $adID)->count();
        //return $imgNo;

    }
}
