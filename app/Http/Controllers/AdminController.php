<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



      public function AdminLoginForm( $var = null)
      {
        return view('Admin.body.admin_login');
      }


    public function AdminDashboard( $var = null)
    {
        return view('Admin.layout.dashboard');
    }
    // end method



    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        $notification = array(
            'message' => 'Admin logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    }

    // end method


     public function AdminProfile( $var = null)
     {


        $id = Auth::user()->id;
        $admin_profile = User::find($id);
        return view('Admin.body.admin_profile',compact('admin_profile'));

     }
// end method



    public function AdminProfilestore(Request $request)
    {
        $id = Auth::user()->id;

        $data = User::find($id);

        //dd($request->username);

        $data->username = $request->username;
        $data->email = $request->email;
        //dd($request->phone);


        //dd($data->phone);
        $data->phone = $request->phone;


        $data->address = $request->address;


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        //dd($data);

        $data->save();



        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Mehtod



     public function AdminInactive( $var = null)
     {
        return view('Admin.vendor.inactive_vendor');
     }

     public function AdminActive( $var = null)
     {
        return view('Admin.vendor.active_vendor');
     }
}
