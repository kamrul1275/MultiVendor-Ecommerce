<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistric;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{


    function AllDivision(){
     $divisions = ShipDivision::latest()->get();
     return view('Admin.shippArea.division.all_division',compact('divisions'));
    } //end mmethod



    function createDivision(){
     
        return view('Admin.shippArea.division.add_division');
       } //end mmethod



    //    district


    function AllDistrict(){

        $districts = ShipDistric::latest()->get();
        return view('Admin.shippArea.district.all_district',compact('districts'));
    }//end mmethod


  function storeDivision(Request $request){

    $data =new ShipDivision();
    $data->division_name =$request->division_name;
    $data->save();


    $notification = array(
        'message' => 'Division Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.Division')->with($notification); 
  }


    // Start District Part

    function createDistrict(){

        $divisions = ShipDivision::latest()->get();
        return view('Admin.shippArea.district.add_district',compact('divisions'));
    }//end mmethod



    function storeDistrict(Request $request){
        $data =new ShipDistric();
        $data->division_id =$request->division_id;
        $data->distric_name =$request->distric_name;
        // dd($data);
        $data->save();
    
    
        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.district')->with($notification); 
    }//end method




    function AllState(){

       $states =ShipState::latest()->get()
;        return view('Admin.shippArea.state.all_state',compact('states'));
    }



    function CreateState(){

        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistric::latest()->get();
        return view('Admin.shippArea.state.add_state',compact('divisions','districts'));
    }


    function storeState(Request $request){

    }//end method



       
}
