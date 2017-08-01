<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Adviewcounter;
use App\Contactus;
use App\User;
use App\Message;
use App\Ad;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $adCount = Ad::all()->count();
        $categories = Category::all();
        return view('index', compact('categories', 'adCount'));
    }

    public function listing($id){
        //$category_id = $id;
        $listingItems = Ad::where('category_id', $id)->where('allowed', 1)->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $subCI = 0;
        return view('publicView/listing', compact('categories', 'subcategories', 'id', 'listingItems', 'subCI'));
    }

      public function sublisting($id, $subCatID){
        $listingItems = Ad::where('category_id', $id)->where('allowed', 1)->orderBy('created_at', 'desc')->where('subcategory_id', $subCatID)->paginate(10);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $subCI = $subCatID;
        return view('publicView/listing', compact('categories', 'subcategories', 'id', 'listingItems', 'subCI'));
    }

    public function listingSinglePage($catId, $slug){
        $adContent = Ad::where('slug', $slug)->where('allowed', 1)->first();
        //$count = $adContent->counter;
        //$adContent['counter'] = $count+1;
        //$adContent->update();
        $adID = $adContent->id;
        $adCounter = Adviewcounter::where('ad_id', $adID)->get();
        $counter = $adCounter[0]->counter;
        $counter = $counter + 1;
        $adCounter[0]['counter'] = $counter;
        $adCounter[0]->update();
        return view('publicView/listingSinglePage', compact('adContent'));
        
    }

   public function message(Request $request, $id){
        if($request->has('user_id')){
            $userID = $request->user_id;
            $user = User::findOrFail($userID);
            $input['name'] = $user->name;
            $input['email'] = $user->email;
            $input['user_id'] = $request->user_id;
            $input['ad_id'] = $request->ad_id;
            $input['seller_id'] = $request->seller_id;
            $input['phone'] = $request->phone;
            $input['message'] = $request->message;
            Message::create($input);
            Session::flash('messageSuccess', 'message');
            return back();
        }
        
        else{
            $input = $request->all();
            Message::create($input);
            Session::flash('messageSuccess', 'message');
            return back();
        }
        
        //$input = $request->all();
        //Message::create($input);
        //Session::flash('messageSuccess', 'message');
        //return back();
    }

    // Controller for report about Ad
    public function report(Request $request, $id){
       Complaint::create($request->all());
       Session::flash('reportSuccess', 'message');
       return back();
    }

    public function contactUs(){
        return view('publicView.contactUs');
    }

    public function sendMessage(Request $request){
        $message = $request->all();
        Contactus::create($message);
        Session::flash('contactSuccess', 'message');
        return back();
    }

    public function termsConditions(){
        return view('publicView.termsConditions');
    }

    public function aboutUs(){
        return view('publicView.aboutUs');
    }

    public function postTC(){
        return view('publicView.postTermsConditions');
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
        //
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
}
