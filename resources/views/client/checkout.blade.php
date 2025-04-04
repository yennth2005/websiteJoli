@extends('client.layouts.main')

@section('content')
    <div class="xc-breadcrumb__area base-bg">
        <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="xc-breadcrumb__content p-relative z-index-1">
                        <div class="xc-breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="icon-arrow-right"></i></span>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- checkout-area start -->

    <section class="checkout-area pt-80 pb-85">
        <div class="container">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkbox-form">
                            <h3 class="mb-30">Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">

                                        <input type="text" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">

                                        <input type="text" placeholder="Example LTD.">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">

                                        <input type="text" placeholder="Street address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">

                                        <input type="text" placeholder="Town / City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="email" placeholder="Town / City">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="State / County">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="Postcode / Zip">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <input type="text" placeholder="Phone number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <textarea placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="shop_cart_widget xc-accordion">
                            <div class="accordion" id="shop_size">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="size__widget">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#size_widget_collapse" aria-expanded="true"
                                            aria-controls="size_widget_collapse">Shopping Cart
                                        </button>
                                    </h2>
                                    <div id="size_widget_collapse" class="accordion-collapse collapse show"
                                        aria-labelledby="size__widget" data-bs-parent="#shop_size" style="">
                                        <div class="accordion-body">
                                            <div class="cart-coupon-code">
                                                <input type="text" placeholder="Coupon Code">
                                                <button>Apply</button>
                                            </div>
                                            <div class="cart-subtitle">
                                                <h4>Subtotal</h4>
                                                <h4>$4589</h4>
                                            </div>
                                            <div class="cart-checkout">
                                                <h4>Shipping</h4>
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item-2">
                                                        <input type="radio" name="pay" id="c-rate">
                                                        <label for="c-rate">Flat rate</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-orange">
                                                        <input type="radio" name="pay" id="c-Free">
                                                        <label for="c-Free">Free shipping</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-green">
                                                        <input type="radio" name="pay" id="c-pickup">
                                                        <label for="c-pickup">Local pickup</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-checkout">
                                                <h4>Payment Method</h4>
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item-2">
                                                        <input type="radio" name="opt" id="p-rate">
                                                        <label for="p-rate">Direct bank transfer</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-orange">
                                                        <input type="radio" name="opt" id="c-shipping">
                                                        <label for="c-shipping">Cash on delivery</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-green">
                                                        <input type="radio" name="opt" id="p-pickup">
                                                        <label for="p-pickup">PayPal</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart-totails">
                                                <h4>total</h4>
                                                <h4>$4589</h4>
                                            </div>
                                            <p>Wetters, as opposed to using Content here, content here, making it look like
                                                readable English. Many desktop </p>
                                            <a class="cart-checkout-btn" href="#">Place Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
