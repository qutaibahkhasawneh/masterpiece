<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::get();
        return view('admin.operation-categories',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('pages.index', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_img'=>'required'

        ]);
        $imageName = time().'-'.$request->post('category_name').'-'.$request->file('category_img')->extension();
        $request->file('category_img')->move(public_path('PostsImage'), $imageName);
        $category = Category::create([
        'category_name'=>$request->category_name,
        'category_img'=>$imageName
    ]);
    return redirect("admin_c")->with('success','Category add successuflly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category= Category::get();
        return view('admin.edit_categories',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'=>'required',
            'category_img'=>'required'

        ]);

        $category->update($request->all());
        return redirect()->view('admin.operation-categories')
        ->with('success','Category updated successuflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.operation-categories')
        ->with('success','Category deleted successuflly');
    }

    public function editCategories($id){
        $category = Category::where ('id', '=', $id)->first();
        return view('admin.edit_categories', compact('category'));
    }

    public function updateCategories(Request $request){

        $request->validate([
            'category_name'=>'required',
            'category_img'=>'required'

        ]);

        $id = $request->id;
        $imageName = time().'-'.$request->post('category_name').'-'.$request->file('category_img')->extension();
        $request->file('category_img')->move(public_path('PostsImage'), $imageName);
        $catName = $request->category_name;
        $category_img = $imageName;

        Category::where('id','=', $id)->update([
            'category_name'=>$catName,
            'category_img'=>$category_img

        ]);
        return redirect()->back()->with('success','Category updated successuflly');
    }

    public function deleteCategories($id){
        Category::where('id', '=',$id)->delete();
        return redirect()->back()->with('success','Delete Category Successfully');
    }
}
