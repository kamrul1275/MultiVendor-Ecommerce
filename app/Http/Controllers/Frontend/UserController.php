<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class UserController extends Controller
{


   public function Index($var = null)
   {    

    $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    $speacial_offer = Product::where('speacial_offer',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
    $new_products = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();

    
    return view('Frontend.layout.dashboard',compact('hot_deals','speacial_offer','new_products'));
   }
   // end method


   public function UserDashboard()
   {

    $id=Auth::user()->id;
    $user_name=User::find($id);



    return view('Frontend.page.user_dashboard',compact('user_name'));



   }
   // end method


   public function UserProfileStore(Request $request)
   {
    $id=Auth::user()->id;
    $user_name=User::find($id);

        $user_name->username= $request->username;

        //dd($request->name);

        $user_name->name= $request->name;
        $user_name->email= $request->email;
        $user_name->phone= $request->phone;
        $user_name->address= $request->address;

        //dd($request->photo);

        if($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user_images/'.$user_name->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $user_name['photo'] = $filename;
        }

        //dd($data);

        $user_name->save();

     return redirect()->back();
   }


   public function UserDestroy(Request $request)
   {
       Auth::guard('web')->logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       $notification = array(
        'message' => 'User logout Successfully',
        'alert-type' => 'success'
    );

       return redirect('/login')->with($notification);
   }


   public function UserLogin($var = null)
   {
    return view('Frontend.body.pages.user_login');
   }
   // end method


   public function UserRegister($var = null)
   {
    return view('Frontend.body.pages.user_register');
   }
   // end method UserProfile


   public function UserProfile($var = null)
   {
    return view('Frontend.body.pages.user_register');
   }
   // end method


}
