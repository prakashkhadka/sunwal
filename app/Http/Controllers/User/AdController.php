<?php

namespace App\Http\Controllers\User;

use App\Adviewcounter;
use App\Adimage;
use App\Ad;
use App\Subcategory;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;


class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id', 'hasgender')->all();
        
        $userInfo = Auth::user();
        return view('user.post', compact('userInfo', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        $this->validate($request, [
            
            'title'=>'required|min:5|max:150',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'ownermsg'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'consent'=>'required'
            ]); 
            
       $input['user_id'] = Auth::user()->id;

       $input['title'] = $request->title;
       //$input['title'] = "New Title";

       $input['category_id'] = $request->category_id;
       //$input['category_id'] = 5;

       $input['subcategory_id'] = $request->subcategory_id;
       //$input['subcategory_id'] = 5;

       $input['gender_id'] = $request->gender_id;
       //$input['gender_id'] = 3;
       
       $input['price'] = $request->price;
       //$input['price'] = 200;

       $input['ownermsg'] = $request->ownermsg;
       //$input['ownermsg'] = "Hello World";

       $input['condition']= $request->condition;
       //$input['condition']= "new";

       $input['phone']= $request->phone;
       //$input['phone']= 45496;

       $input['address'] = $request->address;
       //$input['address'] = "Sunwal -12, Bhumahi, Nawalparasi";

       $input['consent'] = $request->consent;
       //$input['consent'] = "agree";
       
       $adv = Ad::create($input);
       $adCounter['ad_id'] = $adv->id;
       Adviewcounter::create($adCounter);
        
        if($request->hasFile('file')){
            $files = $request->file('file');
            $ad['ad_id'] = $adv->id;
            foreach($files as $file){
                $photoName = time() . $file->getClientOriginalName();
                $ad['file'] = $photoName;
                $file->move('productImages', $photoName);
                Adimage::create($ad);
            }
        }

        Session::flash('postSuccess', 'बिज्ञापन प्रकाशित गर्नुभएकोमा धन्यबाद ! केहि समय पछि नै प्रकाशित हुनेछ |');
        return redirect('user/post/create');
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
    public function edit($adID, $userID)
    {   
        //
    }

    public function editMyAd($adID, $userID)
    {   
        $uID = Auth::user()->id;
        if($uID == $userID){
            $ad = Ad::findOrFail($adID);

            $categories = Category::pluck('title', 'id', 'hasgender')->all();
            $userInfo = Auth::user();
            $subCatID = $ad->subcategory_id;
            //$subCategory = Subcategory::findOrFail($subCatID)->pluck('title', 'id')->all();
            $subCategory = Subcategory::where('category_id', $ad->category_id)->pluck('title', 'id')->all();
            //$subCategory = Subcategory::where('id', $subCatID)->pluck('title', 'id')->all();
            return view('user/editMyAd', compact('ad', 'userInfo', 'categories', 'subCategory'));
        }
        else{
            return view('unauthorised');
        }
        
        //return $ad = Ad::findOrFail($id);
        //return view('user.editMyAd');
    }

    public function updateMyAd(Request $request, $id, $userID)
    {
        //return $id . "user Id is : </br>" . $userID. "Content is :  </br>". $request->all();
        //return $request->all();
        $uID = Auth::user()->id;
        if($uID == $userID){
            
            $this->validate($request, [
            
            'title'=>'required|min:5|max:150',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'ownermsg'=>'required',
            'price'=>'required',
            'condition'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'consent'=>'required'
            ]); 
            
       $input['user_id'] = Auth::user()->id;

       $input['title'] = $request->title;
       //$input['title'] = "New Title";

       $input['category_id'] = $request->category_id;
       //$input['category_id'] = 5;

       $input['subcategory_id'] = $request->subcategory_id;
       //$input['subcategory_id'] = 5;

       $input['gender_id'] = $request->gender_id;
       //$input['gender_id'] = 3;
       
       $input['price'] = $request->price;
       //$input['price'] = 200;

       $input['ownermsg'] = $request->ownermsg;
       //$input['ownermsg'] = "Hello World";

       $input['condition']= $request->condition;
       //$input['condition']= "new";

       $input['phone']= $request->phone;
       //$input['phone']= 45496;

       $input['address'] = $request->address;
       //$input['address'] = "Sunwal -12, Bhumahi, Nawalparasi";

       $input['consent'] = $request->consent;
       //$input['consent'] = "agree";
       
       //$adv = Ad::update($input);
       Ad::where('id', $id)->update($input);
        
        if($request->hasFile('file')){
            $files = $request->file('file');
            $ad['ad_id'] = $id;
            foreach($files as $file){
                $photoName = time() . $file->getClientOriginalName();
                $ad['file'] = $photoName;
                $file->move('productImages', $photoName);
                Adimage::create($ad);
            }
        }

        Session::flash('updatePostSuccess', 'message');
        //return redirect('user/post/create');
        return back();
    }


        
        else{
            return view('unauthorised');
        }
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
        //return $id;
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
    public function getSubCat($id){
        $cat = Category::findOrFail($id);
        //return $subC = $cat->categories()->whereCategoryId($id)->get();

        $data['hasG'] = $cat->hasgender;
        $data['subC'] = $cat->categories()->whereCategoryId($id)->get();

        return $data;   
    }

    public function getSubCatEdit($id, $uID){

        $cat = Category::findOrFail($uID);
        //return $subC = $cat->categories()->whereCategoryId($id)->get();

        $data['hasG'] = $cat->hasgender;
        $data['subC'] = $cat->categories()->whereCategoryId($uID)->get();
        //$data['initialSubC'] = $cat->categories()->all();

        return $data;   
    }


}
