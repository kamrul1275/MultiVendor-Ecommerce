<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

use Image;


class BrandController extends Controller
{
    public function CreateBrand( $var = null)
    {


        return view('Admin.brand.create_brand');

    }// end method...........


    public function AllBrand( $var = null)
    {
        //$brands =Brand::latest()->get();
        $Brands = Brand::latest()->get();
        return view('Admin.brand.all_brand',compact('Brands'));

    }// end method...........



    public function StoreBrand(Request $request){

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url,
        ]);


       $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.all_brand')->with($notification);

    }// End Method



     function EditBrand($id){

         $EditBrand = Brand::findOrfail($id);

         return view('Admin.brand.edit_brand',compact('EditBrand'));

     }// End Method


     public function UpdateBrand(Request $request, $id){

        // $brand_id = $request->id;
        // $old_img = $request->old_image;




        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::findOrFail($id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-',$request->brand_name)),
            'brand_image' => $save_url,
        ]);


       $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.all_brand')->with($notification);


    }// End Method





function DeleteBrand($id){

    $BrandDelete = Brand::findOrfail($id);
    $BrandDelete->delete();


    $notification = array(
        'message' => 'Brand Delete Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('admin.all_brand')->with($notification);

}








}

