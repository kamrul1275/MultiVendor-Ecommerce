<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{

    public function CreateCategory(){

    return view('Admin.category.create_category');

   }//end method


   public function AllCategory(){

      $Categories= Category::latest()->get();

      return view('Admin.category.all_category',compact('Categories'));


   }//end method




   public function StoreCategory(Request $request){


    //dd($request->category_name);


    $image = $request->file('category_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
    $save_url = 'upload/category/'.$name_gen;



    Category::insert([
        'category_name' => $request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
        'category_image' => $save_url,
    ]);


   $notification = array(
        'message' => 'Category Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('Category.all_category')->with($notification);


   }//end method




   public function EditCategory(){


   }//end method




   public function UpdateCategory(){


   }//end method




   public function DeleteCategory($id){

    $BrandDelete = Category::findOrfail($id);
    $BrandDelete->delete();


    $notification = array(
        'message' => 'Category Delete Successfully',
        'alert-type' => 'success'
    );
    return redirect()->route('Category.all_category')->with($notification);
   }//end method


}
