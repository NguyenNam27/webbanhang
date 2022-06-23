<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::all();


        $slide = Slider::where(['slider_status'=>1])
                        ->orderBy('slider_id','desc')
                        ->get();
        return view('backend.slide.index',[
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
        return view('backend.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'slider_name'=>'required|max:255',
            'slider_image'=>'required|max:10000',

        ],
        [
            'slider_name.required'=>'Bạn cần nhập tên slide',
            'slider_image.required'=>'Bạn cần nhập ảnh',


        ]);

        $slider_name = $request->input('slider_name');
        $slider_image = '';
        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $fileExtension = $request->file('slider_image')->getClientOriginalExtension();
            $filename = $slider_name.'-'.time().'.'.$fileExtension;


            $path_upload = 'upload/slider/';

            $file->move($path_upload, $filename);
            $slider_image = $filename;
        }

        $slider_status = $request->input('slider_status');
        $slider_desc = $request->input('slider_desc');


        $slider = new Slider();
        $slider->slider_name = $slider_name;
        $slider->slider_image = $slider_image;

        $slider->slider_status = $slider_status;
        $slider->slider_desc= $slider_desc;

        $slider->save();

        session()->flash('success','Slide create successfully.');

        return redirect()->route('admin.slide.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slider_id)
    {
        $edit = Slider::find($slider_id);

        return view('backend.slide.edit',[
            'edit' => $edit
        ]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider_id)
    {
        $slider_name = $request->input('slider_name');
        $slider_image = '';
        if($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $request->validate([
                'image' => 'mimes:jpeg,bmp,png'
            ]);
            $fileExtension = $request->file('slider_image')->getClientOriginalExtension();
            $filename = $slider_name.'-'.time().'.'.$fileExtension;


            $path_upload = 'upload/slider/';

            $file->move($path_upload, $filename);
            $slider_image = $filename;
        }

        $slider_status = $request->input('slider_status');
        $slider_desc = $request->input('slider_desc');


        $slider = Slider::find($slider_id);
        $slider->slider_name = $slider_name;
        $slider->slider_image = $slider_image;

        $slider->slider_status = $slider_status;
        $slider->slider_desc= $slider_desc;

        $slider->save();

        session()->flash('success','Slide update successfully.');

        return redirect()->route('admin.slide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider_id)
    {
        $isDelete = Slider::destroy($slider_id);

        if ($isDelete) {
            return response()->json(['success' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message'=>'Thất bại']);
        }
    }
}
