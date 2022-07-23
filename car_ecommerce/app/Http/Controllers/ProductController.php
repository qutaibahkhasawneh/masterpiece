<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        return view('admin.add-products',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_img'=>'required',
            'category_id'=>'required'


        ]);
        $imageName = time().'-'.$request->post('product_name').'-'.$request->file('product_img')->extension();
        $request->file('product_img')->move(public_path('PostsImage'), $imageName);
        $product = Product::create([
        'product_name'=>$request->product_name,
        'product_description'=>$request->product_description,
        'product_price'=>$request->product_price,
        'product_img'=>$imageName,
        'category_id'=>$request->category_id
    ]);
    return redirect("add_product")->with('success','Product add successuflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product= Prodcut::get();
        return view('admin.edit_categories',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', '=',$id)->delete();
        return redirect()->back()->with('success','Delete Category Successfully');
    }

    public function addProduct(){
        $category =Category::all();
        return view('admin.create_products',compact('category'));
    }

    public function editProducts($id){
        $category =Category::all();
        $product = Product::where ('products.id', '=', $id)->join('categories','products.category_id','=','categories.id')->get(['categories.category_name','products.product_name','products.id','products.category_id','products.product_description','products.product_img','products.product_price'])->first();

        return view('admin.edit_products', compact('product','category'));

    }

    public function updateProducts(Request $request){

        $request->validate([

            'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_img'=>'required',
            'category_id'=>'required'

        ]);
        $imageName = time().'-'.$request->post('product_name').'-'.$request->file('product_img')->extension();
        $request->file('product_img')->move(public_path('PostsImage'), $imageName);
        $id = $request->id;
        $product_name = $request->product_name;
        $product_img = $imageName;
        $product_description = $request->product_description;
        $product_price = $request->product_price;
        $category_id = $request->category_id;

        Product::where('id','=', $id)->update([
            'product_name'=>$product_name,
            'product_description'=>$product_description,
            'product_price'=>$product_price,
            'product_img'=>$product_img,
            'category_id'=>$category_id

        ]);
        return redirect()->back()->with('success','Product updated successuflly');
    }
}
