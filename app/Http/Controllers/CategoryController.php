<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryProduct;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryProduct::all();
        $data = CategoryProduct::latest()->paginate(5);
        return view('backend.category.index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meta_keyword = $request->input('meta_keywords');
        $category_name = $request->input('category_name');
        $slug_category_product = $request->input('slug_category_product');
        $category_desc = $request->input('category_desc');
        $category_status = $request ->input('category_status');

        $category = new CategoryProduct();
        $category -> meta_keywords = $meta_keyword;
        $category -> category_name = $category_name;
        $category -> slug_category_product = $slug_category_product;
        $category -> category_desc =$category_desc;
        $category -> category_status = $category_status;
        $category ->save();
        session()->flash('success','category create successfully.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $edit_category = CategoryProduct::find($category_id);
        return  view('backend.category.edit',[
            'edit_category'=>$edit_category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $meta_keyword = $request->input('meta_keywords');
        $category_name = $request->input('category_name');
        $slug_category_product = $request->input('slug_category_product');
        $category_desc = $request->input('category_desc');
        $category_status = $request ->input('category_status');

        $category = CategoryProduct::find($category_id);
        $category -> meta_keywords = $meta_keyword;
        $category -> category_name = $category_name;
        $category -> slug_category_product = $slug_category_product;
        $category -> category_desc =$category_desc;
        $category -> category_status = $category_status;
        $category ->save();
        session()->flash('success','category update successfully.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $delete = CategoryProduct::destroy($category_id);
            if($delete){
                return response()->json(['success'=>1,'massage'=>'thanh cong']);
            }else{
                return response()->json(['success'=>0,'massage'=>'that bai']);
            }
    }
}
