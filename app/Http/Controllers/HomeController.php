<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use DB;
use Session;
session_start();

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('backend.home.login');
    }

    public function postLogin( Request $request)
    {
//        $this->validate($request,
//        [
//            'email'=>'required|email',
//            'password'=>'required|min:6|max:20'
//        ],
//        [
//            'email.required'=>'Bạn chưa nhập email',
//            'email.email' =>'email chưa đúng định dạng',
//            'password.required'=>'Bạn chưa nhập password',
//            'password.min' =>'mật khẩu ít nhất 6 ký tự',
//            'password.max'=>'mật khẩu nhiều nhất 20 ký tự'
//        ]);

        // $result = array('email'=>$request->input('email'), 'password'=>$request->input('password'));

        // if(Auth::attempt($result)){
        //     return redirect()->route('admin.user.index')->with(['flag'=>'sucsess','massage'=>'đăng nhập thành công']);
        // }else{
        //     return redirect()->route('admin.index')->with(['flag'=>'danger','massage'=>'đăng nhập thất bại']);
        // }

//        $email = $request->input('email');
//        $password = $request->input(bcrypt('password'));
//        $result = DB::table('user')->where('email', $email)->where('password', $password)->first();
//
//        if($result){
//            Session::put('name', $result->name);
//            Session::put('id', $result->id);
//            return redirect()->route('admin.user.index');
//        }else{
//            Session::put('massage','Sai mật khẩu.Mời nhập lại');
//            return redirect()->route('admin.index');
//        }
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        $checkLogin = Auth::attempt($data, $request->has('remember'));

        if ($checkLogin) {
            return redirect()->route('admin.product.index');
        }
        session()->flash('error','Sai tài khoản hoặc mật khẩu.');
        return redirect()->back();

    }
}
