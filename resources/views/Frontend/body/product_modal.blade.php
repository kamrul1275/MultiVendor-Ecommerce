<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" id="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->

                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src=" " id="pImage" alt="product image" />
                                    </figure>
                                    
                                </div>
                                <!-- THUMBNAILS -->
                                <!-- <div class="slider-nav-thumbnails">
                                    <div><img src="Frontend/assets/imgs/shop/thumbnail-3.jpg" alt="product image" /></div>
                                  
                                </div> -->
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail" ><a href="shop-product-right.html" class="text-heading" id="pName"> </a></h3>
                              
<!-- colo -->
                            <div class="form-group col-sm-9 text-secondary" id="colorArea">Color
                                    <select class="form-select form-select-sm mb-3" id="color" name="color" aria-label=".form-select-sm example">

                                      <!-- <option value="">Red</option> -->
                                     
                                    </select>
                                </div>

<!-- size -->

                            <div class="form-group col-sm-9 text-secondary" id="sizeArea">size
                                    <select class="form-select form-select-sm mb-3" id="size" name="size" aria-label=".form-select-sm example">

                                      <!-- <option value="">Small</option> -->
                                     
                                    </select>
                                </div>


                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand"  >$ </span>
                                        <span class="current-price text-brand" id="pPrice" > </span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15" id="pDiscount">  </span>
                                        </span>
                                    </div>
                                </div>
<div class="detail-extralink mb-30">
                                                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" id="pQuanty" name="pQuanty" class="qty-val" value="1" min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">

                                    <input type="hidden" id="product_id">

                                        <button type="submit"  onclick="addToCart()" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    <ul>
                                        <li class="mb-5" id="pBrand">Brand: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">Category:<span class="text-brand" id="pCategory"> </span></li>
                                    </ul>


                                    </div>
                                    <div class="col-md-6">

                                    <ul>
                                        <li class="mb-5" >Code:  <span class="text-brand" id="pCode"> </span></li>
                                        
                                        
                                        <li class="mb-5">aviable:<span class="badge badge-pill badge-success"  id="aviable" style="background: green; color:white"> </span></li>

                                        <li class="mb-5">stokeOut:<span class="badge badge-pill badge-danger" id="stokeout"  style="background: red; color:white"> </span>
                                    </li>
                                    </ul>

                                    </div>
                                </div>
                            
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
