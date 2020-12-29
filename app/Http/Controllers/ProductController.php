<?php

namespace App\Http\Controllers;

use App\Product;
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
        $products = Product::all();
        return view('products.index', compact('products')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');//
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
            'sku'=>'required',
            'description'=>'required'
        ]);

        $product = new Product([
            'name' => $request->get('name'),
            'sku' => $request->get('sku'),
            'description' => $request->get('description'),
 
        ]); 
        
        $product->save();
        return redirect('/products')->with('success', 'product saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
     
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = product::find($id);
        return view('products.edit', compact('product'));
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
            'sku'=>'required',
            'description'=>'required'
        ]);

        $product = product::find($id);
        $product->name = $request->get('name');
        $product->sku = $request->get('sku');
        $product->description = $request->get('description');
        $product->save();

        return redirect('/products')->with('success', 'Product updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'product deleted!');
    }
}
