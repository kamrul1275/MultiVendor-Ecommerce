@extends('Admin.layout.master')

@section('admin_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Division Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Division Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-10">
                    <div class="card">
             <div class="card-body">


                <form id="myForm" action="{{ route('store.coupon') }}"  method="POST" enctype="multipart/form-data">

                    @csrf


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State_Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" name="division_name" class="form-control"  />
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Division Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <select class="form-select form-select-lg mb-3" name="category_id" aria-label=".form-select-lg example">

                                       @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">District Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <select class="form-select form-select-lg mb-3" name="category_id" aria-label=".form-select-lg example">

                                       @foreach ($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->district }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        
                           
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button class="btn btn-primary px-4">Save</button>
                                </div>
                            </div>
                        </form>

                        </div>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection








