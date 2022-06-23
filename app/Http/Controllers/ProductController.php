<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\CategoryProduct;
use App\Brand;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data = Product::all();

        $data = Product::latest()->paginate(5);
        return view('backend.product.index',[
            'data'=>$data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $category = CategoryProduct::all();
        $brand = Brand::all();
        return view('backend.product.create',[
            'category'=>$category,
            'brand'=>$brand
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request ->input('product_name');
        $quantity =$request ->input('product_quantity');
        $slug = $request ->input('product_slug');
        $category_id = $request ->input('category_id');
        $brand_id = $request ->input('brand_id');
        $product_desc = $request ->input('product_desc');
        $product_content = $request->input('product_content');

        $path_avatar = '';
        if ( $request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $fileExtension = $request->file('product_image')->getClientOriginalExtension(); // Lấy . của file

            $filename = $slug.'-'.time().'.'.$fileExtension;

            $path_upload = 'upload/product/';

            $file->move($path_upload, $filename);

            $path_avatar = $filename;

//            dd($path_avatar); die();


    }

        $product_price = $request ->input('product_price');
        $product_status = $request ->input('product_status');


            $product = new Product();
            $product->product_name = $name;
            $product->product_quantity = $quantity;
            $product->product_slug = $slug;
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->product_desc = $product_desc;
            $product->product_content = $product_content;
            $product->product_price = $product_price;
            $product->product_image = $path_avatar;
            $product->product_status = $product_status;

            $product->save();
            session()->flash('success', 'Product create successfully');
            return redirect()->route('admin.product.index');





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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($product_id)
    {
        $edit_pro = Product::find($product_id);
        $category = CategoryProduct::all();
        $brand = Brand::all();
//        dd($edit_pro);

        return view('backend.product.edit',[
            'edit_pro'=>$edit_pro,
            'category'=>$category,
            'brand'=>$brand

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $name = $request ->input('product_name');
        $quantity =$request ->input('product_quantity');
        $slug = $request ->input('product_slug');
        $category_id = $request ->input('category_id');
        $brand_id = $request ->input('brand_id');
        $product_desc = $request ->input('product_desc');
        $product_content = $request->input('product_content');

        $path_avatar = '';
        if ( $request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);

            $fileExtension = $request->file('product_image')->getClientOriginalExtension(); // Lấy . của file

            $filename = $slug.'-'.time().'.'.$fileExtension;

            $path_upload = 'upload/product/';

            $file->move($path_upload, $filename);

            $path_avatar = $filename;

        }

        $product_price = $request ->input('product_price');
        $product_status = $request ->input('product_status');


        $product = Product::find($product_id);
        $product->product_name = $name;
        $product->product_quantity = $quantity;
        $product->product_slug = $slug;
        $product->category_id = $category_id;
        $product->brand_id = $brand_id;
        $product->product_desc = $product_desc;
        $product->product_content = $product_content;
        $product->product_price = $product_price;
        $product->product_image = $path_avatar;
        $product->product_status = $product_status;

        $product->save();
        session()->flash('success', 'Product update successfully');
        return redirect()->route('admin.product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $isDelete = Product::destroy($product_id);

        if ($isDelete) {
            return response()->json(['success' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message'=>'Thất bại']);
        }

    }
}
