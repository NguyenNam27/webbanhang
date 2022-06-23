<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Contact;
use App\Product;
use App\Slider;
use App\Brand;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ShopController extends Controller
{

    public function index()
    {
        $slide = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '0')->get();
        $category = CategoryProduct::where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();

        $brand = Brand::where('brand_status', '0')
            ->orderBy('brand_id', 'desc')
            ->get();
        $product = Product::where('product_status', '0')
            ->orderBy('product_id', 'desc')
            ->limit(15)
            ->get();
        $product_laptop = DB::table('tbl_product')
            ->where('category_id', 11)
            ->get();
        $product_Samsung = DB::table('tbl_product')
            ->where('category_id', 9)
            ->get();
        return view('frontend.index', [
            'slide' => $slide,
            'category' => $category,
            'brand' => $brand,
            'product' => $product,
            'product_laptop' => $product_laptop,
            'product_Samsung' => $product_Samsung
        ]);
    }
    public function show_category($category_id)
    {
        $slide = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '0')->get();
        $category = CategoryProduct::where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = Brand::where('brand_status', '0')
            ->orderBy('brand_id', 'desc')
            ->get();

        $detail_category = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('tbl_product.category_id', $category_id)
            ->paginate(6);

        return view('frontend.show_category', [
            'slide' => $slide,
            'category' => $category,
            'brand' => $brand,
            'detail_category' => $detail_category
        ]);
    }
    public function category()
    {
        $category = CategoryProduct::where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
        $mobile = DB::table('tbl_product')
            ->where('category_id', 13)
            ->get();
        $laptop = DB::table('tbl_product')
            ->where('category_id', 11)
            ->limit(6)
            ->get();
        $thoitrangnam = DB::table('tbl_product')
            ->where('category_id', 3)
            ->limit(6)
            ->get();
        $thucanthucung = DB::table('tbl_product')
            ->where('category_id', 8)
            ->get();

        return view('frontend.category', [
            'mobile' => $mobile,
            'category' => $category,
            'laptop' => $laptop,
            'thoitrangnam' => $thoitrangnam,
            'thucanthucung' => $thucanthucung
        ]);
    }
    public function detail_product($product_id)
    {
        $category = CategoryProduct::where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
        $brand = Brand::where('brand_status', '0')
            ->orderBy('brand_id', 'desc')
            ->get();
        $product_detail = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', $product_id)
            ->get();
//        dd($product_detail);
        $product_feature = DB::table('tbl_product')
            ->where('category_id', 9)
            ->get();


        return view('frontend.detail_product', [
            'category' => $category,
            'brand' => $brand,
            'product_detail' => $product_detail,
            'product_feature' => $product_feature,
        ]);
    }
    public function contact()
    {
        $slide = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '0')->get();
        $category = CategoryProduct::where('category_status', '0')
            ->orderBy('category_id', 'desc')
            ->get();
        return view('frontend.contact_us', [
            'category' => $category,
            'slide' => $slide
        ]);
    }
    public function postContact(Request $request)
    {
        dd($request->all());
//        $request->validate([
//
//        ],[
//
//        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        $contact->content = $request->input('content');

        $contact->save();
        return redirect()->route('contact');


    }


}
