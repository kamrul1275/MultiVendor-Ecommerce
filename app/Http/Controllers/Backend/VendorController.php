<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendorController extends Controller
{


    public function VendorLogin($var = null)
    {
       return view('Vendor.body.vendor_login');
    }

    // end method


    public function VendorRegister( $var = null)
    {
        return view('vendor.body.vendor_register');
    }
    // end method



    public function Vendorstore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'join_date' => $request->join_date,
            'password' => Hash::make($request->password),
            'role' => 'vendor',
            'status' => 'inactive',
        ]);


        $notification = array(
            'message' => 'Vendor register Successfully',
            'alert-type' => 'success'
        );
        return redirect('/vendor/login')->with($notification);
    }


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

        $data = User::find($id);

        //dd($request->username);

        $data->username = $request->username;
        $data->email = $request->email;
        //dd($request->phone);


        //dd($data->phone);
        $data->phone = $request->phone;


        $data->address = $request->address;


        //dd($request->photo);
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/vendor_image/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vendor_image'),$filename);
            $data['photo'] = $filename;
        }

        //dd($data);

        $data->save();




    $notification = array(
        'message' => 'Vendor Profile Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

} // End Mehtod



}
