@extends('Admin.layout.master')

@section('admin_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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

                <a href="{{ route('create.state') }}" type="button" class="btn btn-primary"> Add State</a>

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
                            <th>District</th>
                            <th>Division</th>
                            <th>Sate</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($states as $key => $item)

                        <tr>
                        <td>{{ $key+1 }}</td>
                            <td>{{ $item->division_name }}</td>
                            <td>{{ $item->district_name }}</td>
                            <td>{{ $item->division_name }}</td>
                           

                  <td> 
                                <a href="{{ route('edit.coupon',$item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('delete.coupon',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>


                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                        <th>S.No</th>
                        <th>District</th>
                        <th>Division</th>
                        <th>Sate</th>
                        
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
