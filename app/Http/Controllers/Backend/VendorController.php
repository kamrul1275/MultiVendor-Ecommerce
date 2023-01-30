<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return redirect('/vendor/login');
    }

    // end method

    public function VendorProfile($var = null)
    {
        return view('vendor.body.vendor_profile');
    }



}
