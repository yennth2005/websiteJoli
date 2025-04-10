<style>
    .xc-header-one__btns {
        display: flex;
        align-items: center;
        gap: 15px;
        /* Giảm khoảng cách nếu cần */
    }

    .xc-header-one__btn {
        position: relative;
        /* Chỉ cần đặt relative cho các phần tử giỏ hàng */
        display: inline-flex;
        align-items: center;
        font-size: 16px;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        padding: 10px 15px;
        border-radius: 30px;
        background-color: #f4f4f4;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .xc-header-one__btn:hover {
        background-color: #e0e0e0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .icon-grocery-store {
        font-size: 20px;
        margin-right: 8px;
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -8px;
        background-color: #ff4d4f;
        color: white;
        font-size: 14px;
        font-weight: bold;
        padding: 4px 8px;
        border-radius: 50%;
        min-width: 18px;
        text-align: center;
        line-height: 1.1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .xc-header-one__btn:hover .cart-count {
        background-color: #e43f3b;
    }

    /* Đảm bảo rằng các nút khác không bị ảnh hưởng */
    .xc-header-one__btn i {
        margin-right: 8px;
    }

    /* Điều chỉnh cho menu mobile */
    .xc-header-one__hamburger {
        display: none;
    }
</style>
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
                        <form method="GET" action="{{ route('products.search') }}">
                            <!-- Trường tìm kiếm -->
                            <input type="search" name="search" placeholder="Tìm kiếm sản phẩm">

                            <!-- Danh mục -->
                            <select name="category" id="category">
                                <option value="" selected disabled>Chọn danh mục</option>
                                <option value="1">Health & Beauty</option>
                                <option value="2">Digital & Electronics</option>
                                <option value="3">Tools, Equipments</option>
                                <option value="4">Other</option>
                            </select>

                            <!-- Nút tìm kiếm -->
                            <button type="submit">Tìm kiếm</button>
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
                        <a href="/cart" class="xc-header-one__btn">
                            <i class="icon-grocery-store"></i>My cart
                            <span class="cart-count">{{ $count_cart }}</span>
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
                                <li class="has-dropdown"><a href="/products/search">Shop</a>
                                    <ul class="submenu">
                                        <li><a href="/products/search">Shop</a>
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
                        <a href="/cart" class="xc-header-two__btn">
                            <i class="icon-shopping-cart"></i>
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
