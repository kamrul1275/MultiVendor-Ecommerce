<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{

   public function AllProduct( $var = null)
   {
         $products = Product::latest()->get();
          return view('Admin.product.all_product',compact('products'));
   }
   //    end method



   public function CreateProduct( $var = null)
   {
           $brands = Brand::get();
           $categories = Category::get();
           $activeVendors = User::where('status','active')->where('role','vendor')->get();

          return view('Admin.product.create_product',compact('brands','categories','activeVendors'));
   }
   //    end method




    public function StoreProduct(Request $request)
    {

       $image = $request->file('product_thambnail');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
       $save_url = 'upload/products/thambnail/'.$name_gen;





       //dd($request->brand_id);

       $product_id = Product::insertGetId([


        //dd($request->product_name),

       
           'brand_id' => $request->brand_id,


          // dd($request->brand_id),


           'category_id' => $request->category_id,
           'subcategory_id' => $request->subcategory_id,
           'product_name' => $request->product_name,
           'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),

           'product_code' => $request->product_code,
           'product_qty' => $request->product_qty,
           'product_tags' => $request->product_tags,
           'product_size' => $request->product_size,
           'product_color' => $request->product_color,

           'selling_price' => $request->selling_price,
           'discount_price' => $request->discount_price,
           'short_descript' => $request->short_descript,
           'long_descript' => $request->long_descript,
   //dd($request->hot_deals),
           'hot_deals' => $request->hot_deals,
           'featured' => $request->featured,
           'speacial_offer' => $request->speacial_offer,
           'speacial_deals' => $request->speacial_deals,

           'product_thambnail' => $save_url,
           'vendor_id' => $request->vendor_id,
           'status' => 1,
           'created_at' => Carbon::now(),

       ]);

       //dd($request->brand_id);

    /// Multiple Image Upload From her //////

    $images = $request->file('multi_img');
    foreach($images as $img){
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
    $uploadPath = 'upload/products/multi-image/'.$make_name;



    MultiImg::insert([

        'product_id' => $product_id,
        'photo_name' => $uploadPath,
        'created_at' => Carbon::now(),

    ]);
    } // end foreach

    /// End Multiple Image Upload From her //////

    $notification = array(
        'message' => 'Product Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.product')->with($notification);


    }


    function ProdctDelete($id){

        $data = Product::findOrfail($id);
        $data->delete();
    
    
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);


       }//end method


    }


