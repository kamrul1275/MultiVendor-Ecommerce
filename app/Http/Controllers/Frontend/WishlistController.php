<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function addToWshlist(Request $request, $product_id){
    

   if(Auth::check()){

      $exist = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

      if(!$exist){
            
        Wishlist::insert([

            'user_id'=>Auth::id(),
            'product_id'=>$product_id,
            'created_at'=>Carbon::now(),

            
        ]);

        return response()->json([
            'success'=>'successfully add on your wishlist',
         ]);
           
      }else{

         return response()->json([
            'error'=>'already  add on your wishlist',
         ]);

      }

   }else{
    return response()->json([
        'error'=>'login first',
     ]);
  } 

    }//end method

    function WshlistProduct(){

return view('Frontend.wishlist.wishlist');

    }//end method


    function GetWshlistProduct(){

  $wishlist = Wishlist::with('products')->where('user_id',Auth::id())->latest()->get();

  $wishQty =Wishlist::count();

  return response()->json([
   'wishList'=>$wishlist,
   'wishListCount'=>$wishQty,
]);
    }//end method






function wishlistRemove($id){

    Wishlist::where('user_id', Auth::id())->where('id',$id)
->delete();

   return response()->json([
      'error'=>'Wishlist Delete Successfully',
   ]);

}//end method





}
