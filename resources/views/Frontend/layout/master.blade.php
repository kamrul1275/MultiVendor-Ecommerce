<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Online - Multipurpose eCommerce</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="Frontend/assets/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="Frontend/assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="Frontend/assets/css/main.css?v=5.3" />
</head>

<body>
    <!-- Modal -->
@include('Frontend.body.product_modal')
    <!-- Quick view -->
  



    <!-- Header  -->
   @include('Frontend.body.frontend_header')
   <!-- End Header  -->




    <!--End header-->








    <main class="main">


@yield('content')

    </main>






@include('Frontend\body\frontend_footer')


    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="Frontend/assets/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS-->


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
    <script src="Frontend/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="Frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="Frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="Frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="Frontend/assets/js/plugins/slick.js"></script>
    <script src="Frontend/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="Frontend/assets/js/plugins/waypoints.js"></script>
    <script src="Frontend/assets/js/plugins/wow.js"></script>
    <script src="Frontend/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="Frontend/assets/js/plugins/magnific-popup.js"></script>
    <script src="Frontend/assets/js/plugins/select2.min.js"></script>
    <script src="Frontend/assets/js/plugins/counterup.js"></script>
    <script src="Frontend/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="Frontend/assets/js/plugins/images-loaded.js"></script>
    <script src="Frontend/assets/js/plugins/isotope.js"></script>
    <script src="Frontend/assets/js/plugins/scrollup.js"></script>
    <script src="Frontend/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="Frontend/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="Frontend/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="Frontend/assets/js/main.js?v=5.3"></script>
    <script src="Frontend/assets/js/shop.js?v=5.3"></script>


    <script>

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

    </script>


<script>

//alert('ok');
function productView($id){
// alert($id); 
 //var id = 3; 
$.ajax({

type:'GET',
  url:'/product/view/'+$id,
  dataType:'JSON',

  success:function(data){

 console.log(data);

          
$('#pName').text(data.product.product_name);
$('#pCode').text(data.product.product_code);
$('#pCategory').text(data.product.categories.category_name); 
$('#pBrand').text(data.product.categories.brand_name);  
// image
$('#pImage').attr('src','/' + data.product.product_thambnail);



$('#pPrice').text(data.product.selling_price);
$('#pDiscount').text(data.product.discount_price);

// available and stockout



if(data.product.product_qty >0){
 $('#aviable').text('');
 $('#stokeout').text('');
 $('#aviable').text('aviable');
}else{

    $('#aviable').text('');
 $('#stokeout').text('');
 $('#stokeout').text('stokeout');

}











// color

$('select[name="color"]').empty();

  $.each(data.color, function(key,value){
         
    $('select[name="color"]').append( '<option value=" '+ value+' "  >' +value+' </option>' )

    if(data.color==""){
$("#colorArea").hidden();
    }else{
        $("#colorArea").show();

    }


  })//end method


  // size

$('select[name="size"]').empty();

$.each(data.size, function(key,value){
       
  $('select[name="size"]').append( '<option value=" '+ value+' "  >' +value+' </option>' )

  if(data.size==""){
$("#sizeArea").hidden();
  }else{
      $("#sizeArea").show();

  }

  
})














  }

});

}


</script>

</body>

</html>
