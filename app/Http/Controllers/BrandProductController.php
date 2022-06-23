<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();

        $data = Brand::latest()->paginate(5);
        return view('backend.brand.index',[
            'data'=>$data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([

        // ],
        // [


        // ]);
        $brand_name = $request->input('brand_name');
        $brand_slug = $request->input('brand_slug');
        $brand_desc = $request->input('brand_desc');
        $brand_status = $request->input('brand_status');

        $brand = new Brand();
        $brand -> brand_name = $brand_name;
        $brand -> brand_slug = $brand_slug;
        $brand -> brand_desc = strip_tags($brand_desc);

        $brand -> brand_status = $brand_status;
         $brand ->save();


         session()->flash('success','brand create successfully.');

            return redirect()->route('admin.brand.index')->with('thêm thành công');

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
    public function edit($brand_id)
    {
        $brand = Brand::find($brand_id);

        return view('backend.brand.edit',[
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {
        $brand_name = $request->input('brand_name');
        $brand_slug = $request->input('brand_slug');
        $brand_desc = $request->input('brand_desc');
        $brand_status = $request->input('brand_status');

        $brand = Brand::find($brand_id);
        $brand -> brand_name = $brand_name;
        $brand -> brand_slug = $brand_slug;
        $brand -> brand_desc = $brand_desc;
        $brand -> brand_status = $brand_status;
         $brand ->save();


         session()->flash('success','brand update successfully.');

            return redirect()->route('admin.brand.index')->with('thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        $isDelete = Brand::destroy($brand_id);

        if ($isDelete) { // xóa thành công
            return response()->json(['success' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message'=>'Thất bại']);
        }
    }
}
