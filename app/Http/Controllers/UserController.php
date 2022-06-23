<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

        $user = User::latest()->paginate(5);
        return view('backend.user.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request -> validate(
            [
                'name'=>'required|max:255',
                'email'=>'required|email',
                'password'=>'required|min:6',
                'phone'=>'required',

            ],
            [
                'name.required' => 'bạn cần nhập họ tên',
                'email.email' => 'Email không được định dạng đúng',
                'password.required' =>'Vui lòng nhập mật khẩu',
                'password.min' =>'mật khẩu phải có 6 ký tự',
                'phone.required'=>'vui lòng nhập số điện thoại',


            ]);
        $admin_email = $request->input('email');
        $admin_password = $request->input('password');
        $admin_name = $request->input('name');
        $admin_phone = $request->input('phone');


        $user = new User();
        $user->email = $admin_email;
        $user->name = $admin_name;
        $user->password = bcrypt($admin_password);
        $user->phone = $admin_phone;

        $user->save();

        session()->flash('success','User create successfully.');

            return redirect()->route('admin.user.index')->with('thêm thành công');



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
        $edit = User::find($id);
        return view('backend.user.edit',['edit' => $edit]);
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

            $admin_email = $request->input('email');
            $admin_password = $request->input('password');
            $admin_name = $request->input('name');
            $admin_phone = $request->input('phone');


            $user = User::find($id);
            $user->email = $admin_email;

            $user->password = bcrypt($admin_password);
            $user->name = $admin_name;
            $user->phone = $admin_phone;

            $user->save();

            session()->flash('success','User update successfully.');

                return redirect()->route('admin.user.index')->with('thêm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = User::destroy($id);

        if ($isDelete) { // xóa thành công
            return response()->json(['success' => 1,'message'=>'Thành công']);
        } else {
            return response()->json(['success' => 0, 'message'=>'Thất bại']);
        }

    }
}
