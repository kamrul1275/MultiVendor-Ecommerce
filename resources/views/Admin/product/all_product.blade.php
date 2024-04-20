@extends('Admin.layout.master')



@section('admin_content')


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

                <a href="{{ route('create.product') }}" type="button" class="btn btn-primary"> Add Product</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">DataTable Example</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Product_Name</th>
                            <th>Product_Code</th>
                            <th>Qty</th> 
                            <!-- <th>Color</th>  -->
                            <th>Main Thambnail</th> 
                            <th>Selling_Price</th>
                            <th>Discount_Price</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($products as $key => $item)

                        <tr>
                            <td>{{  $key+1 }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->product_code }}</td>
                           <td>{{ $item->product_qty }}</td>
                            <!-- <td>{{ $item->product_color }}</td> -->

                            <td> <img src="{{ asset($item->product_thambnail) }}" style="width: 70px; height:40px;" >  </td>

                            <td>{{ $item->selling_price }}</td>
                            <td>{{ $item->discount_price }}</td>


               <td>

            <a href="" class="btn btn-info">Edit</a>


            <a href="{{ route('delete.product',$item->id)}}" class="btn btn-danger"  >Delete</a>

                </td>
                        
            </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                        <th>S.No</th>
                            <th>Product_Name</th>
                            <th>Product_Code</th>
                            <th>Qty</th>
                            <th>Main Thambnail</th> 
                            <th>Selling_Price</th>
                            <th>Discount_Price</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
