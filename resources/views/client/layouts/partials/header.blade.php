<header>
    <div class="xc-header-one bg-black" id="xc-header-sticky">
        <div class="container">
            <div class="xc-header-one__wrapper">
                <div class="xc-header-one__logo">
                    <a href="/"><img src="{{ asset('assets/client/img/logo/black-logo.png') }}" alt="logo"
                            width="158"></a>
                </div>
                <div class="xc-header-one__right">
                    <div class="xc-header-one__search d-none d-xl-block">
                        <form action="#">
                            <input type="search" placeholder="Search">
                            <select>
                                <option value="1" selected disabled>All category</option>
                                <option value="2">Health & Beauty</option>
                                <option value="3">Digital & Electronics</option>
                                <option value="4">Tools, equipments</option>
                            </select>
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="xc-header-one__btns d-none d-lg-flex">
                        <a href="/dashboard" class="xc-header-one__btn">
                            <i class="icon-user"></i>Profile
                        </a>
                        <a href="#" class="xc-header-one__btn">
                            <i class="icon-comment"></i>Message
                        </a>
                        <a href="#" class="xc-header-one__btn">
                            <i class="icon-heart"></i>Wishlist
                        </a>
                        <a href="cart.html" class="xc-header-one__btn">
                            <i class="icon-grocery-store"></i>My cart
                        </a>
                        <!-- mobile drawer  -->
                        <div class="xc-header-one__hamburger d-xl-none">
                            <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                                <i class="icon-menu"></i>Nav Bar
                            </button>
                        </div>
                    </div>
                </div>
                <!-- mobile drawer  -->
                <div class="xc-header-one__hamburger d-lg-none">
                    <button type="button" class="xc-offcanvas-btn xc-header-one__btn">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="xc-header-two xc-header-three" id="xc-header-sticky">
        <div class="container">
            <div class="xc-header-two__wrapper">
                <div class="xc-header-two__right">
                    <div class="xc-header-one__menu xc-main-menu">
                        <nav id="mobile-menu">
                            <ul class="ul-0">
                                <li class="has-dropdown">
                                    <a href="/">Home</a>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li class="has-dropdown"><a href="shop.html">Shop</a>
                                    <ul class="submenu">
                                        <li><a href="shop.html">Shop</a>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="/cart">Cart</a></li>
                                        <li><a href="/checkout">Checkout</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown"><a href="#">Page</a>
                                    <ul class="submenu">
                                        <li><a href="product-landing.html">Product Landing</a></li>
                                        <li><a href="vendor.html">Vendor</a></li>
                                        <li><a href="faq.html">Faq</a></li>
                                        <li><a href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="has-dropdown">
                                    <a href="blog-list.html">Blog</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="blog-grid.html">Blog Grid</a>
                                        </li>
                                        <li class="has-dropdown">
                                            <a href="blog-list.html">Blog List</a>
                                            <ul class="submenu">
                                                <li><a href="blog-list-no-sidebar.html">No Sidebar</a></li>
                                                <li><a href="blog-list.html">Right Sidebar</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Left Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div class="xc-header-two__btns d-none d-lg-flex">
                        <a href="#" class="xc-header-two__btn">
                            <i class="icon-shopping-cart"></i>
                            <span class="xc-cart-count">2</span>
                        </a>
                        <a href="#" class="xc-header-two__btn">
                            <i class="icon-love"></i>
                        </a>
                        <div class="user-menu">
                            <a href="/dashboard" class="xc-header-two__btn">
                                <i class="icon-user-1"></i>
                            </a>
                            <div class="user-dropdown">
                                <a href="/login" class="dropdown-item">Đăng nhập</a>
                                <a href="/register" class="dropdown-item">Đăng ký</a>
                            </div>
                        </div>
                        <!-- mobile drawer -->
                        <div class="xc-header-two__hamburger d-xl-none">
                            <button type="button" class="xc-offcanvas-btn xc-header-two__btn">
                                <i class="icon-menu"></i>Nav Bar
                            </button>
                        </div>
                    </div>

                </div>
                <!-- mobile drawer  -->
                <div class="xc-header-two__hamburger d-lg-none">
                    <button type="button" class="xc-offcanvas-btn xc-header-two__btn">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .user-menu {
        position: relative;
    }

    .user-dropdown {
        display: none;
        position: absolute;
        top: 30px;
        /* Điều chỉnh khoảng cách */
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        padding: 10px;
        z-index: 10;
    }

    .user-menu:hover .user-dropdown {
        display: block;
    }

    .dropdown-item {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
    }
</style>
