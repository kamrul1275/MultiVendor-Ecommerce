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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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



$('#pQuanty').val(data.product.quantity);
$('#product_id').val(data.product.id);



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

}//end method



// start add to cart

function addToCart(id) {
    var product_name = $('#pName').text();
    var id = $('#product_id').val();
    var quanty = $('#pQuanty').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();

    $.ajax({
        url: "Cart/Data/Store/"+id,
        type: 'POST',
        dataType: 'json', // Corrected dataType value
        data: {
            id:id,
            color: color,
            size: size,
            product_name: product_name,
            quanty: quanty
        },
        success: function(data) {


            // used miniCart autoupdate
            miniCart();
           $('#closeModal').click();

        // Start Message
        const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }

              // End Message

            console.log(data);
        }
    });
}

// end add to cart



</script>


<script>



function miniCart(){

       $.ajax({

              type:'GET',
              dataType:'json',
              url:"/product/minit/cart",


              success:function(response){

            //  console.log(response);


            // $("#qtny").text(response.cartqty);
            $("#cartqtny").text(response.cartqty);
            $('span[id="carSubtotal"]').text(response.carttotal)


            var miniCart = "";

            $.each(response.carts , function(key ,value){

                miniCart += `

                                     <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest" style="height:50px; width:50px;" src="/${value.options.image}"  /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">${value.name}</a></h4>
                                                <h4><span>${value.qty} × </span>${value.price}</h4>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a type="submit" id="${value.rowId}" onclick="removeminiCart(this.id)" ><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>

                                    </ul>
                                    <hr>  <br>

                                 `
            })

            $("#miniCart").html(miniCart);

              }

       })

}

miniCart();


// remove cart

function removeminiCart(rowId){
  $.ajax({

    type:'GET',
    dataType:'JSON',

    url:"/remove/minit/cart/"+rowId,

    success:function(data){

           // used miniCart autoupdate
           miniCart();

    // Start Message
    const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }


    }
     
  })
}

</script>

</body>

</html>
