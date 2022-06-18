<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
use Image;
use File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.addproduct');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('backend.manageproduct',compact('product'));
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
            'name'=>'required',
            'category_name'=>'required',
            'brand_name'=>'required',
            'drescreption'=>'required',
            'status'=>'required',
        ]);
        $product= new Product();
        $product->name = $request->name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->drescreption = $request->drescreption;
        $product->status = $request->status;

        $image = $request->file('image');
             $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
             $location =public_path('backend/product/'.$imageCustomeName);
             Image::make( $image)->resize(195, 243)->save($location);
        $product->image= $imageCustomeName;
        $product->save();
        return redirect()->route('manage');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return view('backend.editproduct',compact('products'));
        
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
        $request->validate([
            'name'=>'required',
            'category_name'=>'required',
            'brand_name'=>'required',
            'drescreption'=>'required',
            'status'=>'required',
        ]);
        
        $product=  Product::find($id);
        $product->name = $request->name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->drescreption = $request->drescreption;
        $product->status = $request->status;

        if(!empty($request->image)){
            File::exists('backend/product/'.$product->image);
            File::delete('backend/product/'.$product->image);
            
            $image = $request->file('image');
            $imageCustomeName = rand().'.'.$image->getClientOriginalExtension();
            $location =public_path('backend/product/'.$imageCustomeName);
            Image::make( $image)->resize(195, 243)->save($location);
            $product->image= $imageCustomeName;
           }
        $product->update();
        return redirect()->route('manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=  Product::find($id);
        if( File::exists('backend/product/'.$product->image)){
            File::delete('backend/product/'.$product->image);
        }
        $product->delete();
        return redirect()->route('manage');

    }
}
