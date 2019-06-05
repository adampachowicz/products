<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('/products.index', ['products' => $produts = Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $userid = Auth::user()->id;
       
        
        request()->validate([
            'title'         =>  ['required', 'min:3', 'max:40'],
            'description'   =>  ['required', 'min:100', 'max:1000'],
            'image'         =>  ['required', 'max:4000000','mimes:jpg,jpeg,png']
        ]);

        $image = request()->file('image');
       
        $imagename = $image->getClientOriginalName();
     
        $product = new Product();
        $product->title = request('title');
        $product->description = request('description');
        $product->mime = $image->extension();
        $product->image_filname = $image->getClientOriginalName();
        $product->image = $image->getClientOriginalName();
        $product->user_id = $userid;
        $image->storeAs('/public/uploads', $imagename);
        $product->save();
            
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.product', array('product'=> $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {       
        return view('products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($product_id)
    {
        $userid = Auth::user()->id;
        $validate = request()->validate([
            'title'         =>  ['required', 'min:3', 'max:40'],
            'description'   =>  ['required', 'min:100', 'max:1000'],
            'image'         =>  ['required', 'max:4000000','mimes:jpg,jpeg,png']
        ]);

        $product = Product::findOrFail($product_id);
       $image = request()->file('image');
       
       $imagename = $image->getClientOriginalName();
        
        $product->title = request('title');
        $product->description = request('description');
        $product->mime = $image->extension();
        $product->image_filname = $image->getClientOriginalName();
        $product->image = $image->getClientOriginalName();
        $product->user_id = $userid;
        $image->storeAs('/public/uploads', $imagename);
        $product->save();
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}
