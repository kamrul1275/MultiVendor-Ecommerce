<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
   
   function CreateCoupon(){
return view('Admin.coupon.create_coupon');
   } //end method

   function AllCoupon(){

      $coupons = Coupon::get();
    return view('Admin.coupon.all_coupon',compact('coupons'));
   } //end method

   function StoreCoupon(Request $request){

      Coupon::insert([
         'coupon_name' => $request->coupon_name,
         'coupon_discount' =>  $request->coupon_discount,
         'coupon_validity' =>  $request->coupon_validity,
         'created_at'=>Carbon::now(), 
     ]);
 
 
    $notification = array(
         'message' => 'Coupon Inserted Successfully',
         'alert-type' => 'success'
     );
 
     return redirect()->route('create.coupon')->with($notification);
 
   }// end method



   public function EditCoupon($id){

      $coupon = Coupon::findOrFail($id);
      return view('Admin.coupon.edit_coupon',compact('coupon'));

  }// End Method 


  public function UpdateCoupon(Request $request){

      $coupon_id = $request->id;

       Coupon::findOrFail($coupon_id)->update([
          'coupon_name' => strtoupper($request->coupon_name),
          'coupon_discount' => $request->coupon_discount,
          'coupon_validity' => $request->coupon_validity,
         
      ]);

     $notification = array(
          'message' => 'Coupon Updated Successfully',
          'alert-type' => 'success'
      );

      return redirect()->route('all.coupon')->with($notification); 


  }// End Method 

   public function DeleteCoupon($id){

      Coupon::findOrFail($id)->delete();

       $notification = array(
          'message' => 'Coupon Deleted Successfully',
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification); 


  }// End Method 
}
