<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Coupon::all();
//        $data1 = Coupon::latest()->paginate(2);

        return view('backend.coupon.index',[
            'data'=>$data,
//            'data1'=>$data1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([

        ],[

        ]);
        $coupon_name = $request->input('coupon_name');
        $coupon_time = $request->input('coupon_time');
        $coupon_condition = $request->input('coupon_condition');
        $coupon_number = $request->input('coupon_number');
        $coupon_code = $request->input('coupon_code');

        $coupon = new Coupon();
        $coupon -> coupon_name = $coupon_name;
        $coupon -> coupon_time = $coupon_time;
        $coupon -> coupon_condition = $coupon_condition;
        $coupon -> coupon_number = $coupon_number;
        $coupon -> coupon_code =$coupon_code;
        $coupon ->save();
        session()->flash('success','tạo thành công');
        return redirect()-> route('admin.coupon.index');
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
    public function edit($coupon_id)
    {
        $edit = Coupon::find($coupon_id);
        return view('backend.coupon.edit',[
            'edit'=>$edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $coupon_id)
    {

        $coupon_name = $request->input('coupon_name');
        $coupon_time = $request->input('coupon_time');
        $coupon_condition = $request->input('coupon_condition');
        $coupon_number = $request->input('coupon_number');
        $coupon_code = $request->input('coupon_code');

        $coupon = Coupon::find($coupon_id);
        $coupon -> coupon_name = $coupon_name;
        $coupon -> coupon_time = $coupon_time;
        $coupon -> coupon_condition = $coupon_condition;
        $coupon -> coupon_number = $coupon_number;
        $coupon -> coupon_code =$coupon_code;
        $coupon ->save();
        session()->flash('success','cập nhập thành công');
        return redirect()-> route('admin.coupon.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($coupon_id)
    {
        $Delete = Coupon::destroy($coupon_id);

        if ($Delete) { // xóa thành công
            return response()->json(['success' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message'=>'Thất bại']);
        }
    }
}
