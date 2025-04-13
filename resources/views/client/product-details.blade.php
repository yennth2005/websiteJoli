@extends('client.layouts.main')

@section('content')
    <div class="xc-page-wrapper">
        <div class="xc-search-popup">
            <div class="xc-search-popup__wrap">
                <a href="#" class="xc-search-popup__close xc-close-toggler"></a>
                <div class="xc-search-popup__form">
                    <form role="search" method="get" action="#">
                        <input type="search" placeholder="Search Here..." value="" name="s">
                        <button type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="xc-mobile-nav__wrapper">
            <div class="xc-mobile-nav__overlay xc-close-toggler"></div>
            <!-- /.mobile-nav__overlay -->
            <div class="xc-mobile-nav__content">
                <a href="#" class="xc-mobile-nav__close xc-search-popup__close xc-close-toggler"></a>
                <div class="logo-box">
                    <a href="index.html"><img src="assets/img/logo/white-logo.png" width="150" alt="" /></a>
                </div>
                <!-- /.logo-box -->
                <div class="xc-mobile-nav__menu"></div>
                <!-- /.mobile-nav__container -->

                <ul class="xc-mobile-nav__contact list-unstyled">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:needhelp@swiftcart.com">needhelp@corpai.com</a>
                    </li>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:666-888-0000">666 888 0000</a>
                    </li>
                </ul><!-- /.mobile-nav__contact -->
                <div class="xc-mobile-nav__top">
                    <div class="xc-mobile-nav__social">
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-facebook-square"></a>
                        <a href="#" class="fab fa-pinterest-p"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div><!-- /.mobile-nav__social -->
                </div><!-- /.mobile-nav__top -->
            </div>
            <!-- /.mobile-nav__content -->
        </div>
        <!-- /.mobile-nav__wrapper -->
        <div class="xc-back-to-top-wrapper">
            <button id="xc_back-to-top" type="button" class="xc-back-to-top-btn">
                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
                <span class="xc-back-to-top-progress"></span>
            </button>
        </div>
        <!-- xc-breadcrumb area start -->
        <div class="xc-breadcrumb__area base-bg">
            <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="xc-breadcrumb__content p-relative z-index-1">
                            <div class="xc-breadcrumb__list">
                                <span><a href="#">Home</a></span>
                                <span class="dvdr"><i class="icon-arrow-right"></i></span>
                                <span>Product Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- xc-breadcrumb area end -->

        <!-- product details area start -->
        <section class="product__details-area pt-80 pb-80">
            <div class="container">
                <div class="row gutter-y-30">
                    <div class="col-xl-6 col-lg-6">
                        <div class="product__details-thumb-tab">
                            <div class="product__details-thumb-content w-img">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6">
                        <div class="product__details-wrapper">
                            <h3 class="product__details-title">{{ $product->name }}</h3>
                            <p>Mô tả: {{ $product->description }}</p>
                            <div class="product__details-stock">
                                @if ($product->stock > 0)
                                    <span>{{ $product->stock }} sản phẩm còn lại</span>
                                @else
                                    <span class="text-danger">Hết hàng</span>
                                @endif
                            </div>

                            <div class="product__details-price">
                                <span class="product__details-ammount new-ammount">
                                    {{ number_format($product->price, 0, ',', '.') }} $
                                </span>
                            </div>

                            <div class="product__details-action d-flex flex-wrap align-items-center">
                                @if ($product->stock > 0)
                                    <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="stock" value="{{ $product->stock }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <b>Chọn số lượng</b>
                                        <input type="number" id="quantity" name="quantity" class="form-control"
                                            value="1" min="1" max="{{ $product->stock }}" required
                                            oninput="validateQuantity(this)">
                                        <span id="quantity-error" class="text-danger mt-1 d-block"
                                            style="display:none;"></span>


                                        <!-- Nút thêm vào giỏ hàng (ở lại trang hiện tại) -->
                                        <button type="submit" name="action" value="add"
                                            class="btn btn-primary">Thêm vào giỏ hàng</button>

                                        <!-- Nút đặt hàng ngay (chuyển đến trang giỏ hàng) -->
                                        <button type="submit" name="action" value="order" class="btn btn-success">Đặt
                                            hàng ngay</button>
                                    </form>
                                @else
                                    <button type="button" class="product-add-cart-btn swiftcart-btn disabled" disabled>
                                        Hết hàng
                                    </button>
                                @endif
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
                                        data-bs-target="#nav-desc" type="button" role="tab"
                                        aria-controls="nav-desc" aria-selected="true">Description</button>

                                    <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-additional" type="button" role="tab"
                                        aria-controls="nav-additional" aria-selected="false">Additional
                                        information</button>

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
                                            <p class="mb-0">{{ $product->description }}</p>
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
                                <div class="tab-pane fade" id="nav-review" role="tabpanel"
                                    aria-labelledby="nav-review-tab">
                                    <div class="product__details-review pt-60">
                                        <div class="product__details-review-inner">
                                            <div class="product-rating">
                                                <h4 class="product-rating-title">Ratings and reviews</h4>
                                                <div
                                                    class="product-rating-wrapper d-flex flex-wrap align-items-center mb-50">
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
                                                            <div
                                                                class="product-review-agree d-flex align-items-start mb-25">
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
        <!-- product details tab area end -->

        <!-- related product -->

        <div class="xc-related-product pb-80">
            @foreach ($relatedProducts as $product)
                <div class="container">
                    <h3 class="xc-section-title mb-30">Related products</h3>
                    <div class="row gutter-y-30">
                        <div class="col-xl-3 col-md-6">
                            <div class="xc-product-eight__item">
                                <div class="xc-product-eight__img">
                                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="fas">
                                    <span class="xc-product-eight__offer">30% off</span>
                                    <div class="xc-product-eight__icons">
                                        <button class="xc-product-eight__action">
                                            <i class="icon-love"></i>
                                            <span class="xc-product-eight__tooltip">Add To Wishlist</span>
                                        </button>
                                        <button class="xc-product-eight__action">
                                            <i class="icon-magnifying-glass"></i>
                                            <span class="xc-product-eight__tooltip">Quick view</span>
                                        </button>
                                        <button class="xc-product-eight__action">
                                            <i class="icon-shopping-cart"></i>
                                            <span class="xc-product-eight__tooltip">Add To Cart</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="xc-product-eight__content">
                                    <div class="xc-product-eight__ratting">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        (25 Reviews)
                                    </div>
                                    <h3 class="xc-product-eight__title"><a
                                            href="{{ route('product.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <h5 class="xc-product-eight__price"> {{ number_format($product->price, 0, ',', '.') }}
                                        VNĐ</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection

<script>
    function validateQuantity(input) {
        const max = parseInt(input.max);
        const value = parseInt(input.value);
        const errorSpan = document.getElementById('quantity-error');

        if (value > max) {
            errorSpan.style.display = 'block';
            errorSpan.innerText = `Bạn chỉ có thể mua tối đa ${max} sản phẩm.`;
            input.setCustomValidity("Invalid"); // để ngăn submit
        } else {
            errorSpan.style.display = 'none';
            input.setCustomValidity(""); // cho phép submit
        }
    }
</script>
