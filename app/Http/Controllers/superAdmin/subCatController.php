<?php

namespace App\Http\Controllers\superAdmin;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth:superAdmin'); // This uses admin guard instead of default web guard
    }


    public function index()
    {
        $subcategories = subCategory::all();
        return view('superAdmin.subCategory.subCategoryIndex', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        return view('superAdmin.subCategory.createsubCategory', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $category_id = $request->category_id;
        $file = $request->file('subCatImg');
        $name = time() . $file->getClientOriginalName();
        $file->move('subCatImg', $name);
        Subcategory::create(['subCatImg'=>$name, 'title'=>$title, 'category_id'=>$category_id]);
        return redirect('/superAdmin/subCategory');
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
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::pluck('title', 'id')->all();
        $currentCategory = $subcategory->category_id;
        $subcategory['category'] = $currentCategory;
        return view('superAdmin.subCategory.editsubCategory', compact('subcategory', 'categories'));
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
        $input = $request->all();

        if($file = $request->file('subCatImg')){
            //return $file->getClientOriginalName();
            //return "Photo is received";
            $name = time() . $file->getClientOriginalName();
            $file->move('subCatImg', $name);
            $input['subCatImg'] = $name;
        }
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update($input);
        return redirect('superAdmin/subCategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        unlink(public_path() . '/subCatImg/' . $subcategory->subCatImg);
        $subcategory->delete();
        return redirect('superAdmin/subCategory');
    }

    
}
