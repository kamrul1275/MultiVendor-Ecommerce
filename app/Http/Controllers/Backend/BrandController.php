<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function CreateBrand( $var = null)
    {
        return view('Admin.brand.create_brand');
    }


    public function AllBrand( $var = null)
    {
        return view('Admin.brand.all_brand');
    }
}
