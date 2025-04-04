@extends('client.layouts.main')

@section('content')
    <!-- xc-breadcrumb area start -->
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
    <!-- xc-breadcrumb area end -->

    <div class="xc-cart-page pt-80 pb-80">
        <div class="container">
            <form action="#">
                <div class="row gutter-y-30 gx-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="xc-cart-page__table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"><img
                                                    src="assets/img/cart/cart-1.png" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">Level Bolt Smart Lock</a>
                                        </td>
                                        <td class="product-price"><span class="amount">$130.00</span></td>
                                        <td class="product-quantity">
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus sub">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="text" value="1">
                                                <span class="xc-cart-plus add">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                        <td class="product-remove"><button type="submit"><i
                                                    class="fa fa-times"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"><img
                                                    src="assets/img/cart/cart-2.png" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">Level Bolt Smart Lock</a>
                                        </td>
                                        <td class="product-price"><span class="amount">$130.00</span></td>
                                        <td class="product-quantity">
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus sub">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="text" value="1">
                                                <span class="xc-cart-plus add">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                        <td class="product-remove"><button type="submit"><i
                                                    class="fa fa-times"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="product-details.html"><img
                                                    src="assets/img/cart/cart-3.png" alt=""></a></td>
                                        <td class="product-name"><a href="product-details.html">Level Bolt Smart Lock</a>
                                        </td>
                                        <td class="product-price"><span class="amount">$130.00</span></td>
                                        <td class="product-quantity">
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus sub">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="text" value="1">
                                                <span class="xc-cart-plus add">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">$130.00</span></td>
                                        <td class="product-remove"><button type="submit"><i
                                                    class="fa fa-times"></i></button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
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
                                            <div class="cart-totails">
                                                <h4>Subtotal</h4>
                                                <h4>$4589</h4>
                                            </div>
                                            <p>Wetters, as opposed to using Content here, content here, making it look like
                                                readable English. Many desktop </p>
                                            <a class="cart-checkout-btn" href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
