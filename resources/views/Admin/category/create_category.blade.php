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
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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


                <form id="myForm" action="{{ route('category.store') }}"  method="POST" enctype="multipart/form-data">

                    @csrf


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category_Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" name="category_name" class="form-control"  />
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Category_photo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input  id="image"   type="file" name="category_image" class="form-control"  />
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <img id="showImage"  src="{{ (!empty($categoris->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" style="width: 100px; height:100px">
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








<div class="mb-3">
    <label for="inputProductDescription" class="form-label">Product Images</label>
    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
</div>



<div class="mb-3">
    <label for="inputProductDescription" class="form-label">Product Images</label>
   <input class="form-control" type="file" id="formFileMultiple" multiple="">
</div>
