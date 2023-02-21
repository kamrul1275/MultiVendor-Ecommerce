<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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



     public function InactiveVendor( $var = null)
     {

        $InactiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->get();

        return view('Admin.vendor.inactive_vendor',compact('InactiveVendor'));
     }
// End Mehtod


public function InactiveVendorDetails($id=null)
{
    //$id = Auth::user()->id;
   $InactiveVendors = User::find($id);

   return view('Admin.vendor.inactive_vendorDetails',compact('InactiveVendors'));
}
// End Mehtod


   public function InactiveVendorApprove(Request $request)
   {


          $verdor_id = $request->id;
          //dd($request->id);
          $user = User::findOrFail($verdor_id)->update([
              'status' => 'active',
          ]);


$notification = array(
    'message' => 'Vendor  Updated Successfully',
    'alert-type' => 'success'
);

return redirect()->route('vendor.active')->with($notification);





   }


     public function ActiveVendor( $id = null)

     {

        $ActiveVendor = User::where('status','active')->where('role','vendor')->latest()->get();
        return view('Admin.vendor.active_vendor',compact('ActiveVendor'));
     }
    //  end method


    public function ActiveVendorDetails( $id = null)
    {

        $active_vendorDetails = User::find($id);
       return view('Admin.vendor.active_vendorDetails',compact('active_vendorDetails'));
    }//  end method



   public function ActiveVendorApprove(Request $request)
   {


       $verdor_id = $request->id;

       //dd($verdor_id);
       $vendor = User::findOrFail($verdor_id)->update([
           'status' => 'inactive',
       ]);


       //dd( $vendor);



$notification = array(
    'message' => 'Vendor  Updated Successfully',
    'alert-type' => 'success'
);



       return redirect()->route('vendor.inactive')->with($notification);

   }//  end method

}
