<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{


    public function VendorLogin($var = null)
    {
       return view('Vendor.body.vendor_login');
    }

    // end method


    public function VendorDashboard($var = null)
    {
       return view('Vendor.layout.vendor_dashboard');
    }

    // end method



    public function VendorLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Vendor logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/vendor/login')->with($notification);


    }

    // end method

    public function VendorProfile($var = null)
    {

        $id= Auth::user()->id;
        $vendor_profile = User::find($id);

        return view('vendor.body.vendor_profile',compact('vendor_profile'));
    }
// end method



public function VendorProfileStore(Request $request)
{
    $id = Auth::user()->id;

        $dataV = User::find($id);

        //dd($request->username);

        $dataV->username = $request->username;
        $dataV->email = $request->email;
        //dd($request->phone);


        //dd($data->phone);
        $dataV->phone = $request->phone;


        $dataV->address = $request->address;



        // update vendor image up


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_images/'.$dataV->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_images'),$filename);
            $dataV['photo'] = $filename;
        }

   //dd($dataV->photo);
        $dataV->save();

    $notification = array(
        'message' => 'Vendor Profile Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

} // End Mehtod



}
