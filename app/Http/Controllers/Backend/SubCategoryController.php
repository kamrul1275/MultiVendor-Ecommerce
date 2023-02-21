<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{



    public function CreateSubCategory($var = null)

    {
        $categories = Category::orderBy('category_name','ASC')->get();

        //dd($categories);
        return view('Admin.subcategory.create_subcategory',compact('categories'));

    }
    // end method


    public function AllSubCategory($var = null)
    {
        $SubCategories= Subcategory::latest()->get();
        return view('Admin.subcategory.all_subcategory',compact('SubCategories'));

    }
    // end method



   public function StoreSubCategory(Request $request)
    {
//dd($request->category_name);




Subcategory::insert([
    'category_id'=>$request->category_id,

    //dd('category_id'),
    'subcategory_name' => $request->subcategory_name,
    'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),

]);


$notification = array(
    'message' => 'SubCategory Inserted Successfully',
    'alert-type' => 'success'
);

return redirect()->route('SubCategory.all_subcategory')->with($notification);



    }
    // end method

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }// End Method

}
