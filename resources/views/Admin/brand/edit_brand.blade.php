@extends('Admin.layout.master')

@section('admin_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Update User Profile</li>
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


                <form id="myForm" action="{{ route('brand.update',$EditBrand->id) }}"  method="POST" enctype="multipart/form-data">

                    @csrf


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Brand_Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text"  name="brand_name" value="{{ $EditBrand->brand_name }}" class="form-control"  />
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Brand_photo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input  id="image"   type="file" name="brand_image" class="form-control"  />
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage"  src="{{ (!empty($brands->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" style="width: 100px; height:100px">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <button class="btn btn-primary px-4">Update</button>
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


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection
