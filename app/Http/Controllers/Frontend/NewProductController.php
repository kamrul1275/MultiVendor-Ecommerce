<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class NewProductController extends Controller
{
    function ProductModalVew($id){
       
      $produuct = Product::with('categories','brands')->findOrFail($id);
      
      $color = $produuct->product_color;
      $product_color = explode(',',$color);

      $size = $produuct->product_size;
      $product_size = explode(',',$size);


return response()->json([

    'product' => $produuct,
    'color'=> $product_color,
    'size'=> $product_size,


]);
     
    }
    //end method
}
