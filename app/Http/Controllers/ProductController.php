<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductShowResource;
use App\Models\Product;
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
        $product = Product::latest()->paginate(10);
        $productResource = ProductResource::collection($product);
        return response()->json([
            'isSuccess' => true,
            'data' => $productResource
        ], 200);
    }

    public function productByPrice()
    {
        $product = Product::orderBy('price', 'DESC')->get();
        $productResource = ProductResource::collection($product);
        return response()->json([
            'isSuccess' => true,
            'data' => $productResource
        ], 200);
    }

    public function productComplete()
    {
        $product = Product::with(array('category' => function ($query) {
            $query->select('id', 'name');
        }))->with(array('detail' => function ($query) {
            $query->select('id', 'product_id', 'description', 'color', 'size');
        }))->latest()->get();
        return response()->json([
            'isSuccess' => true,
            'elements'  => $product->count(),
            'data' => $product
        ], 200);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with(array('detail' => function ($query) {
            $query->select('product_id', 'description', 'color', 'size');
        }))->first();
        $productResource = ProductShowResource::make($product);
        return response()->json([
            'isSuccess' => true,
            'data' => $productResource
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
    public function destroy(Product $product)
    {
        //
    }
}
