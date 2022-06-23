<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Coupon;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Cookie;
use http\Env\Response;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;


class CartController extends Controller
{

    public function index()
    {
        $category = CategoryProduct::where('category_status','0')
            ->orderBy('category_id','desc')
            ->get();

        $listProduct = Cart::content();
        $total = Cart::subtotal(0,",",".");
//        dd($listProduct);

        return view('frontend.cart.cart',[
            'category'=>$category,
            'listProduct'=>$listProduct,
            'total'=>$total,

        ]);
    }
    public function  addCart($product_id){



            $add_product = Product::findOrFail($product_id);


              Cart::add([
                'id' => $add_product->product_id,
                'name' => $add_product->product_name,
                'price' => $add_product->product_price,
                'qty' => 1,
                'options' => [
                    'image' => $add_product->product_image,
                ]
            ]);
        session(['totalPrice'=> Cart::count()]);

        return redirect()->route('cart.index');
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        $list = Cart::content();
        $total_price = Cart::subtotal(0,",",".");
        return view('frontend.cart.cart',[
            'list'=>$list,
            'total_price'=>$total_price
        ]);


    }
    public function updateCart(Request $request ){
        $rowId = $request->input('id');
        $qty =   $request->input('qty');

//        if (Cookie::get('shopping_cart'))
//        {
//            $cookie_data = stripslashes(Cookie::get('shopping_cart'));
//            $cart_data = json_decode($cookie_data, true);
//
//            $list_rowId = array_column($cart_data, 'rowId');
//            $is_there = $rowId;
//
//            if (in_array($is_there,$list_rowId))
//            {
//                foreach($cart_data as $keys => $values)
//                {
//                    if($cart_data[$keys]["rowId"] == $rowId)
//                    {
//                        $cart_data[$keys]["qty"] =  $qty;
//                        $ttPrice = ($cart_data[$keys]['price']*$qty);
//                         $grand_Price = number_format($ttPrice);
//                        $item_data = json_encode($cart_data);
//                        $minutes = 60;
//                        Cookie::queue(Cookie::make('shopping_cart', $item_data, $minutes));
//                        return response()->json([
//                            'id'=>$rowId,
//                            'status'=>'"'.$cart_data[$keys]["name"].'" Quantity Updated',
//                            'gtPrice'=>''.$grand_Price.''
//                        ]);
//                    }
//                }
//            }
//        }

return view('frontend.cart.cart',[
    'id'=>$rowId,
    'qyt'=>$qty,
]);


//          dd($request->all());
//       Cart::update($rowId,$qty);
//
//        $listProduct = Cart::content();
//        $total = Cart::subtotal(0,",",".");
//
//        return view('frontend.cart.test',[
//            'listProduct'=>$listProduct,
//            'total'=>$total
//        ]);



    }
    public function check_coupon(Request $request)
    {

       $coupon_code = $request->input('coupon_code');

//        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
//        dd($coupon);
//        if($coupon){
//            $count_coupon = $coupon->count();
//            if ($count_coupon > 0){
//                $coupon_session = Session::get('coupon');
//                if ($coupon_session == true){
//                    $is_avaiable = 0;
//                    if ($is_avaiable == 0){
//                        $cou[] = array(
//                          'coupon_code'=>$coupon->coupon_code,
//                            'coupon_condition'=>$coupon->coupon_condition,
//                            'coupon_number'=>$coupon->coupon_number
//                        );
//                        session::put('coupon',$cou);
//                    }
//                } else {
//                    $cou[] = array(
//                        'coupon_code'=>$coupon->coupon_code,
//                        'coupon_condition'=>$coupon->coupon_condition,
//                        'coupon_number'=>$coupon->coupon_number
//                    );
//                    session::put('coupon',$cou);
//                }
//                session::save();
//                return redirect()->back()->with('message','thêm mã giảm giá thành công');
//            }
//
//        } else{
//            return redirect()->back()->with('message',' mã giảm giá sai');
//        }
        return view('frontend.cart.cart2');

    }


}
