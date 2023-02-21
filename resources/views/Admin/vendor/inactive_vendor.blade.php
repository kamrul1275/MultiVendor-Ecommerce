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

                <a href="{{ route('Category.create_category') }}" type="button" class="btn btn-primary"> Add Category</a>

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
                            <th>Vendor_Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($InactiveVendor as $key => $item)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->join_date }}</td>
                            <td> <span class="btn btn-danger">{{ $item->status }}</span></td>



                            {{-- <img  src="{{ asset($item->brand_image) }}"  style="width: 70px; height:40px;"> --}}
                            <div class="mt-3">
                            <td>

            <a href="{{ route('vendor.inactive.details', $item->id) }}" class="btn btn-info">Details</a>




                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Vendor_Name</th>
                            <th>Email</th>
                            <th>Join Date</th>
                            <th>Status</th>
                            <th>Action</th>


                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
