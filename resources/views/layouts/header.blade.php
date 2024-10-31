<!--==============================
    Mobile Menu
    ============================== -->
<div class="vs-menu-wrapper">
    <div class="vs-menu-area text-center">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt="Marino"></a>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="index.html">Beranda</a>
                </li>
                <li><a href="about.html">Tentang</a></li>
                <li><a href="about.html">Beli Ikan</a></li>
                <li><a href="about.html">Keranjang Pembelian</a></li>
                <li><a href="about.html">Layanan</a></li>
                <li>
                    <a href="contact.html">Hubungi DK Mandiri</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--==============================
     Preloader
    ==============================-->
<div class="preloader">
    <button class="vs-btn preloaderCls">Cancel Preloader </button>
    <div class="preloader-inner text-center">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Marino">
        <span class="loader"></span>
    </div>
</div>
<!--==============================
    Cart Side bar
    ============================== -->
<div class="sideCart-wrapper offcanvas-wrapper d-none d-lg-block">
    <div class="sidemenu-content">
        <button class="closeButton border-theme bg-theme-hover sideMenuCls2"><i class="far fa-times"></i></button>
        <div class="widget widget_shopping_cart">
            <h3 class="widget_title">Keranjang Belanja Kamu</h3>
            <div class="widget_shopping_cart_content">
                <ul class="cart_list">
                    <li class="mini_cart_item">
                        <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a href="shop.html"><img
                                src="assets/img/cart/cart-img-1.png" alt="Cart Image" />Fishing Reels Spin</a>
                        <span class="quantity">
                            1 × <span class="amount"><span>$</span>100.00</span>
                        </span>
                    </li>
                    <li class="mini_cart_item">
                        <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a href="shop.html"><img
                                src="assets/img/cart/cart-img-2.png" alt="Cart Image" />Spoon lure tackle Baits</a>
                        <span class="quantity">
                            1 × <span class="amount"><span>$</span>19.00</span>
                        </span>
                    </li>
                    <li class="mini_cart_item">
                        <a href="shop.html" class="remove"><i class="fal fa-trash-alt"></i></a> <a href="shop.html"><img
                                src="assets/img/cart/cart-img-3.png" alt="Cart Image" />Fishing Reels Globeride</a>
                        <span class="quantity">
                            1 × <span class="amount"><span>$</span>10.00</span>
                        </span>
                    </li>
                </ul>
                <div class="total">
                    <strong>Subtotal:</strong> <span class="amount"><span>$</span>129.00</span>
                </div>
                <div class="buttons">
                    <a href="cart.html" class="vs-btn style4">Lihat Keranjang</a>
                    <a href="checkout.html" class="vs-btn style4">Bayar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
    Header Area
    ==============================-->
<header class="vs-header header-layout2">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-xl-between justify-content-md-center align-items-center gx-50">
                <div class="col d-none d-xl-block">
                    <div class="header-links">
                        <ul>
                            <li>
                                <a href="#"><i class="fas fa-map-marker-alt"></i>Desa Jetis, Kec. Nusawungu, Kabupaten Cilacap, Jawa Tengah 53283 </a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-envelope"></i> dkmandiri@gmail.com </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-auto d-flex align-items-center text-center">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe"></i> Indonesia
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="margin: 0px;">
                            <li><a class="dropdown-item" href="#">Indonesia</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="sticky-active">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto align-self-stretch">
                        <div class="vs-logo style2">
                            <a href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                            <a href="index.html" class="sticky-logo"><img src="{{ asset('assets/img/logo.png') }}"
                                    alt="logo"></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row gx-50 align-items-center ">
                            <div class="col">
                                <nav class="main-menu d-none d-lg-block">
                                    <ul>
                                        <li>
                                            <a href="contact.html">Home</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Tentang</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="shop.html">Menu Toko</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">Beli Ikan</a></li>
                                                <li><a href="shop-details.html">Keranjang Pembelian</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Layanan</a>
                                        </li>
                                        <li>
                                            <a href="contact.html">Hubungi DK Mandiri</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-auto d-lg-none">
                                <button class="vs-menu-toggle d-inline-block">
                                    <i class="fal fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto d-none d-xl-block">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="header-info">
                                    <div class="icon-btn">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="header-info_label">Call Now</span>
                                        <div class="header-info_link">
                                            <a href="tel:+6281226795993">(+62) 812-2679-5993</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="icon-btn sideCartToggler sideCartToggler has-badge" type="button">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span class="badge">0</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
