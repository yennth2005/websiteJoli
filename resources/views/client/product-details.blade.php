@extends('client.layouts.main')

@section('content')
    <!-- product details area start -->
    <section class="product__details-area pt-80 pb-80">
        <div class="container">
            <div class="row gutter-y-30">
                <div class="col-xl-6 col-lg-6">
                    <div class="product__details-thumb-tab">
                        <div class="product__details-thumb-content w-img">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                    aria-labelledby="nav-one-tab">
                                    <img src="assets/img/product-details/product-details-1.png" alt="">
                                </div>
                                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                    <img src="assets/img/product-details/product-details-2.png" alt="">
                                </div>
                                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                                    <img src="assets/img/product-details/product-details-3.png" alt="">
                                </div>
                                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                                    <img src="assets/img/product-details/product-details-4.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="product__details-thumb-nav xc-tab">
                            <nav>
                                <div class="nav nav-tabs justify-content-sm-between" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-one-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one"
                                        aria-selected="true">
                                        <img src="assets/img/product-details/product-details-sm-1.png" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two"
                                        type="button" role="tab" aria-controls="nav-two" aria-selected="false">
                                        <img src="assets/img/product-details/product-details-sm-2.png" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-three-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three"
                                        aria-selected="false">
                                        <img src="assets/img/product-details/product-details-sm-3.png" alt="">
                                    </button>
                                    <button class="nav-link" id="nav-four-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four"
                                        aria-selected="false">
                                        <img src="assets/img/product-details/product-details-sm-4.png" alt="">
                                    </button>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="product__details-wrapper">

                        <div class="product__details-stock">
                            <span>18 In Stock</span>
                        </div>
                        <h3 class="product__details-title">Apple Watch Series 7 </h3>

                        <div class="product__details-rating d-flex align-items-center">
                            <div class="product__rating product__rating-2 d-flex">
                                <span>
                                    <i class="icon-star"></i>
                                </span>
                                <span>
                                    <i class="icon-star"></i>
                                </span>
                                <span>
                                    <i class="icon-star"></i>
                                </span>
                                <span>
                                    <i class="icon-star"></i>
                                </span>
                                <span>
                                    <i class="icon-star"></i>
                                </span>
                            </div>
                            <div class="product__details-rating-count">
                                <span>(4 customer review)</span>
                            </div>
                        </div>

                        <p>Shop Harry.com for every day low prices. Free shipping on orders $35+ or Pickup In-store and get
                        </p>

                        <div class="product__details-price">
                            <span class="product__details-ammount old-ammount">$82.00</span>
                            <span class="product__details-ammount new-ammount">$54.00</span>
                            <span class="product__details-offer">-12%</span>
                        </div>

                        <div class="product__details-quantity">
                            <div class="xc-product-quantity mt-10 mb-10">
                                <span class="xc-cart-minus sub">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <input class="xc-cart-input" type="text" value="1" />
                                <span class="xc-cart-plus add">
                                    <i class="fas fa-plus"></i>
                                </span>
                            </div>
                        </div>

                        <div class="product__details-action d-flex flex-wrap align-items-center">
                            <a href="cart.html" class="product-add-cart-btn swiftcart-btn">
                                Add to Cart
                            </a>
                            <button type="button" class="product-action-btn">
                                <i class="icon-love"></i>
                            </button>
                            <button type="button" class="product-action-btn">
                                <i class="icon-eye"></i>
                            </button>
                        </div>
                        <div class="product__details-sku product__details-more">
                            <p>SKU:</p>
                            <span>29045-SB-8</span>
                        </div>
                        <div class="product__details-categories product__details-more">
                            <p>Categories:</p>
                            <span>
                                <a href="#">Bag,</a>
                            </span>
                            <span>
                                <a href="#">Ladies Bag,</a>
                            </span>
                            <span>
                                <a href="#">Handbags</a>
                            </span>
                        </div>
                        <div class="product__details-tags">
                            <span>Tags:</span>
                            <a href="#">Bag</a>
                            <a href="#">Woman</a>
                            <a href="#">fashion</a>
                        </div>
                        <div class="product__details-share">
                            <span>Share:</span>

                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product details area end -->

    <!-- product details tab area start -->
    <section class="product__details-tab-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product__details-tab-nav">
                        <nav>
                            <div class="product__details-tab-nav-inner nav xc-tab-menu d-flex flex-sm-nowrap flex-wrap"
                                id="nav-tab-info" role="tablist">

                                <button class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-desc" type="button" role="tab" aria-controls="nav-desc"
                                    aria-selected="true">Description</button>

                                <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-additional" type="button" role="tab"
                                    aria-controls="nav-additional" aria-selected="false">Additional information</button>

                                <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-review" type="button" role="tab"
                                    aria-controls="nav-review" aria-selected="false">Reviews (02)</button>
                                <span id="marker" class="xc-tab-line d-none d-sm-inline-block"></span>
                            </div>
                        </nav>
                    </div>
                    <div class="product__details-tab-content">
                        <div class="tab-content" id="nav-tabContent-info">
                            <div class="tab-pane fade show active" id="nav-desc" role="tabpanel"
                                aria-labelledby="nav-desc-tab">
                                <div class="product__details-description product__details-review-inner mt-60">
                                    <div class="product__details-description-content">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                            fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam,
                                            Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                            dolore eu fugiat nulla pariatur. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-additional" role="tabpanel"
                                aria-labelledby="nav-additional-tab">
                                <div class="product__details-additional">
                                    <div class="product__details-additional-inner">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Brand:</th>
                                                    <td>Apple</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Style:</th>
                                                    <td>GPS</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Screen Size:</th>
                                                    <td>41 Millimeters</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Color:</th>
                                                    <td>Green Aluminum Case with Clover Sport Band</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Compatible Devices:</th>
                                                    <td>Smarxchone</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Special Feature:</th>
                                                    <td>Activity Tracker, Heart Rate Monitor, Sleep Monitor, Blood
                                                        Oxygen</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Capacity:</th>
                                                    <td>32GB</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                <div class="product__details-review pt-60">
                                    <div class="product__details-review-inner">
                                        <div class="product-rating">
                                            <h4 class="product-rating-title">Ratings and reviews</h4>
                                            <div class="product-rating-wrapper d-flex flex-wrap align-items-center mb-50">
                                                <div class="product-rating-number mr-40">
                                                    <h4 class="product-rating-number-title">4.5</h4>
                                                    <div class="product-rating-star">
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="product-rating-bar-wrapper">
                                                    <div class="product-rating-bar-item d-flex align-items-center">
                                                        <div class="product-rating-bar-text">
                                                            <span>5</span>
                                                        </div>
                                                        <div class="product-rating-bar">
                                                            <div class="single-progress" data-width="70%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating-bar-item d-flex align-items-center">
                                                        <div class="product-rating-bar-text">
                                                            <span>4</span>
                                                        </div>
                                                        <div class="product-rating-bar">
                                                            <div class="single-progress" data-width="60%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating-bar-item d-flex align-items-center">
                                                        <div class="product-rating-bar-text">
                                                            <span>3</span>
                                                        </div>
                                                        <div class="product-rating-bar">
                                                            <div class="single-progress" data-width="40%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating-bar-item d-flex align-items-center">
                                                        <div class="product-rating-bar-text">
                                                            <span>2</span>
                                                        </div>
                                                        <div class="product-rating-bar">
                                                            <div class="single-progress" data-width="10%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating-bar-item d-flex align-items-center">
                                                        <div class="product-rating-bar-text">
                                                            <span>1</span>
                                                        </div>
                                                        <div class="product-rating-bar">
                                                            <div class="single-progress" data-width="25%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product__details-review-list mb-65">
                                            <div class="product-review-item">
                                                <div class="product-review-avater d-flex align-items-center">
                                                    <div class="product-review-avater-thumb">
                                                        <img src="assets/img/blog/comment-avata-1.jpg" alt="">
                                                    </div>
                                                    <div class="product-review-avater-info">
                                                        <h4 class="product-review-avater-title">Michelle Hunter</h4>
                                                    </div>
                                                </div>
                                                <div class="product-review-rating d-flex align-items-center">
                                                    <div class="product-review-rating-wrapper d-flex">
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                    </div>
                                                    <div class="product-review-rating-date">
                                                        <span>August 8, 2022</span>
                                                    </div>
                                                </div>
                                                <p>I’m upgrading from a series 1, so it is a completely different
                                                    watch. I am very satisfied with this purchase. Most of the heart
                                                    monitoring functions only work with people.</p>
                                            </div>
                                            <div class="product-review-item">
                                                <div class="product-review-avater d-flex align-items-center">
                                                    <div class="product-review-avater-thumb">
                                                        <img src="assets/img/blog/comment-avata-2.jpg" alt="">
                                                    </div>
                                                    <div class="product-review-avater-info">
                                                        <h4 class="product-review-avater-title">Sean Hathaway</h4>
                                                    </div>
                                                </div>
                                                <div class="product-review-rating d-flex align-items-center">
                                                    <div class="product-review-rating-wrapper d-flex">
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                    </div>
                                                    <div class="product-review-rating-date">
                                                        <span>August 10, 2022</span>
                                                    </div>
                                                </div>
                                                <p>I’m upgrading from a series 1, so it is a completely different
                                                    watch. I am very satisfied with this purchase. Most of the heart
                                                    monitoring functions only work with people.</p>
                                            </div>
                                        </div>
                                        <div class="product-review-form">
                                            <h3 class="product-review-form-title">Add a review</h3>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                            <form action="#">
                                                <div class="product-review-form-rating  mb-25">
                                                    <h3 class="rate-title">Rate this product:</h3>
                                                    <div class="product-review-rating-wrapper d-flex">
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                        <span>
                                                            <i class="icon-star"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="product-review-input is-textarea">
                                                            <textarea placeholder="Your Review Here..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="product-review-input">
                                                            <input type="text" placeholder="Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="product-review-input">
                                                            <input type="email" placeholder="Email*">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="product-review-agree d-flex align-items-start mb-25">
                                                            <input type="checkbox" id="p-agree">
                                                            <label for="p-agree">Save my name, email, and website in
                                                                this browser for the next time I comment</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="product-review-btn">
                                                            <button class="swiftcart-btn" type="submit">Submit
                                                                Review</button>
                                                        </div>
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
            </div>
        </div>
    </section>
@endsection
