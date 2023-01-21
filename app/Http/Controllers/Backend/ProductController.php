<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('is_active',1)
        ->with('category')
        ->latest('id')
        ->select('id','category_id','name','slug','product_price','product_stock',
        'alert_quality','product_image','product_rating','updated_at')
        ->paginate(10);


        return view('Backend.pages.Product.index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id','title'])->get();
        return view('Backend.pages.Product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'category_id' =>$request->category_id,
            'name' => $request->name,
            'slug' =>Str::slug($request->name),
            'product_price' =>$request->product_price,
            'product_code' =>$request->product_code,
            'product_stock' =>$request->product_stock,
            'alert_quality' =>$request->alert_quality,
            'short_description' =>$request->short_description,
            'long_description' =>$request->long_description,
            'additional_info' =>$request->additional_info,

        ]);

        $this->image_upload($request, $product->id);
        $this->multiple_image_upload($request, $product->id);

        Toastr::success('Product Store Successfully');
        return redirect()->route('product.index');
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
