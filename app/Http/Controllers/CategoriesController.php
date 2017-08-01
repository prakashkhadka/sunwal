<?php

namespace App\Http\Controllers;

use App\SuperAdmin;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:superAdmin'); // This uses admin guard instead of default web guard
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categories = Category::all();
        return view('superAdmin.category.categoryIndex', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superAdmin.category.createCategory');
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
        $file = $request->file('categoryImg');
        $name = time() . $file->getClientOriginalName();
        $file->move('categoryImages', $name);
        Category::create(['categoryImg'=>$name, 'title'=>$title]);
        return redirect('/superAdmin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('superAdmin.category.editCategory', compact('category'));
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

        if($file = $request->file('categoryImg')){
            //return $file->getClientOriginalName();
            //return "Photo is received";
            $name = time() . $file->getClientOriginalName();
            $file->move('categoryImages', $name);
            $input['categoryImg'] = $name;
        }
        $category = Category::findOrFail($id);

        $category->update($input);
        return redirect('/superAdmin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        unlink(public_path() . '/categoryImages/' . $category->categoryImg);
        $category->delete();
        return redirect('/superAdmin/categories');
    }
}
