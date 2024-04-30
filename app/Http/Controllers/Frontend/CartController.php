<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;
// use Cart;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    function addToCartSore(Request $request, $id){

 $product = Product::find($id);
 //dd($id, $request->all());

 //dd($id);

if( $product->discount_price == null){

    Cart::add([

        'id'=>$id,
        
        'name'=>$request->product_name,
        'qty'=>$request->quanty, 
        'price'=>$product->selling_price,
        'weight'=>1,
        

         'options' => [
            'size' => $request->size, 
            'color'=>$request->color,
            'image'=>$product->product_thambnail,
        
        ],
        
        
         ]);

         return response()->json([
            'success'=>'successfully add to cart'
            ]);

}else{

    Cart::add([

        'id'=>$id,
        
        'name'=>$request->product_name,
        'qty'=>$request->quanty, 
        'price'=>$product->discount_price,
        'weight'=>1,
        

         'options' => [
          'size' => $request->size, 
         'color'=>$request->color,
         'image'=>$product->product_thambnail,
        
        ],
        
        
         ]);

         return response()->json([
            'success'=>'successfully add to cart'
            ]);
}




    }
    //end method

    function miniCartGet(){

             
        $carts = Cart::content();
        $cartqty = Cart::count();
        $carttotal = Cart::total();

        return response()->json([
               
              'carts'=>$carts,
              'cartqty'=> $cartqty,
              'carttotal'=>$carttotal,

        ]);


    }




function removeminiCart($rowId){

    Cart::remove($rowId);

    return response()->json([
        'success'=>'successfully remove to cart'
        ]);

}


// my cart


function myCart(){
    return view("Frontend.cart.mycart");
}



function getMyCart(){
        
    $carts = Cart::content();
    $cartqty = Cart::count();
    $carttotal = Cart::total();

    return response()->json([
           
          'carts'=>$carts,
          'cartqty'=> $cartqty,
          'carttotal'=>$carttotal,

    ]);


}

// remove my cart

public function CartRemove($rowId){
    Cart::remove($rowId);
    return response()->json(['success' => 'Successfully Remove From Cart']);

}// End Method

function CartQntyDecrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty -1);

    return response()->json('Decrement');

        
}//end method  CartQntyIncrement

function CartQntyIncrement($rowId){
    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty +1);

    return response()->json('Increment');

        
}//end method



function couponApply(Request $request) {
    $coupon = Coupon::where('coupon_name', $request->coupon_name)
                    ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
                    ->first();

    if ($coupon) {
        // Debug Cart::total() value
        $cartTotal = Cart::total();
        if (!is_numeric($cartTotal)) {
            return response()->json(['error' => 'Cart total is not numeric. Value: ' . $cartTotal]);
        }
        
        // Ensure coupon discount is numeric
        $couponDiscount = $coupon->coupon_discount;
        if (!is_numeric($couponDiscount)) {
            return response()->json(['error' => 'Coupon discount is not numeric. Value: ' . $couponDiscount]);
        }
        
        // Calculate discount and total amount
        $discountAmount = round($cartTotal * $couponDiscount / 100);
        $totalAmount = round($cartTotal - $discountAmount);

        Session::put('coupon', [
            'coupon_name' => $coupon->coupon_name, 
            'coupon_discount' => $couponDiscount, 
            'discount_amount' => $discountAmount, 
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'validity' => true,                
            'success' => 'Coupon Applied Successfully'
        ]);
    } else {
        return response()->json(['error' => 'Invalid Coupon']);
    }
}




public function CouponCalculation(){

    if (Session::has('coupon')) {

        return response()->json([

         'subtotal' => Cart::total(),
         'coupon_name' => session()->get('coupon')['coupon_name'],
         'coupon_discount' => session()->get('coupon')['coupon_discount'],
         'discount_amount' => session()->get('coupon')['discount_amount'],
         'total_amount' => session()->get('coupon')['total_amount'], 
        ]);
    }else{
        return response()->json(array(
            'total' => Cart::total(),
        ));
    } 
}// End Method






public function CouponRemove(){

    Session::forget('coupon');
    return response()->json(['success' => 'Coupon Remove Successfully']);

}// End Method



}
