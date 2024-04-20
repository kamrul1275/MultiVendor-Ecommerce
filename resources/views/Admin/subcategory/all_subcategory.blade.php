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
                    <li class="breadcrumb-item active" aria-current="page">Subcategory Data Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">

                <a href="{{ route('SubCategory.create_subcategory') }}" type="button" class="btn btn-primary"> Add SubCategory</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Subcategory DataTable </h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Category_Name</th>
                            <th>SubCategory_Name</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($SubCategories as $key => $item)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->Category->category_name ??  "" }}</td>
                            <td>{{ $item->subcategory_name }}</td>
                             <td>

                                {{-- <img src="{{ asset($item->brand_image) }}" style="width: 70px; height:40px;" >  </td> --}}


                            {{-- <img  src="{{ asset($item->brand_image) }}"  style="width: 70px; height:40px;"> --}}
                            <div class="mt-3">
                            <td>

            <a href="" class="btn btn-info">Edit</a>


            <a href="{{ route('SubCategory.delete',$item->id)  }}" class="btn btn-danger" id="delete"  >Delete</a>

                            </td>
                        </tr>

                         @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S.No</th>
                            <th>Category_Name</th>
                            <th>SubCategory_Name</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
