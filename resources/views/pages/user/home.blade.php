@extends('layouts.base')

@section('title', 'Home')

@section('content')

    <!--==============================
     Hero Area
     ==============================-->
    <div class="hero-layout1 style2 position-relative">
        <div class="row vs-carousel" data-arrows="true" data-dots="false" data-fade="true">
            <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="{{ ('assets/img/bg/banner-1.webp') }}">
                </div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">Let’s Go..! <br> Beli Ikan Di DK Mandiri</h1>
                        <p class="hero-text">DK Mandiri Seafood menawarkan untuk pembelian ikan mentah dan fresh langsung di ambil dari laut
                            oleh para nelayan sekita desa dan nelayan di cilacap.</p>
                        <div class="hero-btns">
                            <a href="about.html" class="vs-btn me-3">Tentang Kami<i class="far fa-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="{{ ('assets/img/bg/banner-2.png') }}">
                </div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">Let’s Go..! <br> Beli Ikan Di DK Mandiri</h1>
                        <p class="hero-text">DK Mandiri Seafood menawarkan untuk pembelian ikan mentah dan fresh langsung di ambil dari laut
                            oleh para nelayan sekita desa dan nelayan di cilacap.</p>
                        <div class="hero-btns">
                            <a href="about.html" class="vs-btn me-3">Tentang Kami<i class="far fa-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-inner">
                <div class="hero-bg background-image" data-bg-src="{{ ('assets/img/bg/banner-3.png') }}">
                </div>
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">Let’s Go..! <br> Beli Ikan Di DK Mandiri</h1>
                        <p class="hero-text">DK Mandiri Seafood menawarkan untuk pembelian ikan mentah dan fresh langsung di ambil dari laut
                            oleh para nelayan sekita desa dan nelayan di cilacap.</p>
                        <div class="hero-btns">
                            <a href="about.html" class="vs-btn me-3">Tentang Kami<i class="far fa-arrow-right"></i></a>
                            <a href="https://www.youtube.com/watch?v=EGW2HS2tqAQ" class="play-btn1 popup-video"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
        About Area
     ==============================-->
    <section class="bg-white space position-relative overflow-hidden">
        <div class="container">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-6">
                    <div class="picture-box1">
                        <div class="img-1">
                            <img src="{{ asset('assets/img/about/about-1.png') }}" alt="about Img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="title-area mb-30 text-start wow fadeInUp wow-animated" data-wow-delay="0.3s">
                        <span class="sec-subtitle">Eksplore Di jetis DK Mandiri</span>
                        <h2 class="sec-title">Selamat Datang Di DK Mandiri</h2>
                        <div class="sec-line sec-line-left"></div>
                    </div>
                    <p class="explore-text">
                        Halo para pecinta seafood. Dk Mandiri menjual banyak ikan mentah yang bisa kalian olah lagi,
                        Selain itu kami juga menjual ikan ini dengan keadaan fresh langsung dari laut. Jadi kalian tidak
                        perlu khawatir dengan kualitas ikan yang kami jual.
                    </p>
                    <div class="explore-list">
                        <ul class="list-unstyled">
                            <li>Ikan fresh langsung dari laut yang di tangkap oleh nelayan sekitar</li>
                            <li>Harga ikan terjangkau dan murah bisa untuk ide jualan seafood.</li>
                            <li>Pelayanan gercep dan bisa untuk daerah cilacap - nusawungu - gombong - dan sekitarnya.</li>
                            <li>Bisa beli dan bayar lewat online dan akan di antarkan oleh karyawan kami.</li>
                        </ul>
                    </div>
                    <a href="about.html" class="vs-btn">About Us <i class="far fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Shop Area
     ==============================-->
     <section class="bg-title space">
        <div class="container space-bottom">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Toko Ikan</span>
                <h2 class="sec-title text-white">Jenis Jenis Ikan Yang Terlaris</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel mb-4" data-arrows="true" data-wow-delay="0.4s" data-slide-show="4"
                data-lg-slide-show="3" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-sm-center-mode="true">
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-2.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Crossfire Spinning
                                    Reel</a></h3>
                            <span class="product-price"><span class="currency">$</span>129</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-3.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Crossfire Spinning
                                    Reel</a></h3>
                            <span class="product-price"><span class="currency">$</span>150</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-4.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Fishing Reels
                                    Globeride</a></h3>
                            <span class="product-price"><span class="currency">$</span>200</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-5.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Fishing tackle
                                    Bag</a></h3>
                            <span class="product-price"><span class="currency">$</span>80</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-6.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Recreational
                                    fishing Rod</a></h3>
                            <span class="product-price"><span class="currency">$</span>180</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-7.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Fishing Reels
                                    Spin</a></h3>
                            <span class="product-price"><span class="currency">$</span>170</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-8.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Fishing Baits &
                                    Lures</a></h3>
                            <span class="product-price"><span class="currency">$</span>90</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="product-style1">
                        <div class="product-img">
                            <div class="shape-style1"></div>
                            <div class="clipped">
                                <img src="assets/img/product/p-1-9.png" alt="shop">
                            </div>
                            <div class="actions-style1">
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="shop-details.html" class="icon-btn2">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="cart.html" class="icon-btn2">
                                    <i class="far fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="product-title"><a class="text-inherit" href="shop-details.html">Fishing Hand
                                    Net</a></h3>
                            <span class="product-price"><span class="currency">$</span>100</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Service Area
     ==============================-->
     <section class="space service bg-smoke overflow-hidden position-relative">
        <div class="shape-mockup works-shape jump-img d-none d-xxl-block">
            <img src="assets/img/bg/service-shape1.png" alt="works shape">
        </div>
        <div class="container e-pb">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Keunggulan Dk Mandiri</span>
                <h2 class="sec-title">Keunggulan Terbaik Di Sini</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
                data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true"
                data-md-center-mode="true" data-sm-center-mode="true" data-xs-center-mode="true" data-arrows="true"
                data-dots="false">
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="assets/img/service/sr-1-1.png" alt="service thumbnail"></div>
                        <div class="service-icon"><img src="assets/img/icon/sr-1-1.svg" alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Ikan Kualitas Premium</a>
                        </h3>
                        <p class="service-text">Ikan dengan kualitas premium dan terbaik langsung fresh dari nelayan di laut.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="assets/img/service/sr-1-2.png" alt="service thumbnail"></div>
                        <div class="service-icon"><img src="assets/img/icon/sr-1-2.svg" alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Harga Ikan Murah</a></h3>
                        <p class="service-text">Harga ikan terjangkau karena distributor langsung di nelayan ikan daerah kami.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="service-style1">
                        <div class="service-img"><img src="assets/img/service/sr-1-3.png" alt="service thumbnail"></div>
                        <div class="service-icon"><img src="assets/img/icon/sr-1-3.svg" alt="icon"></div>
                        <h3 class="service-title h6"><a class="text-inherit" href="service-details.html">Ikan Dengan Jenis yang beranekaragam</a></h3>
                        <p class="service-text">Berbagai jenis ikan tersedia dari ikan air asin dan ikan air tawar.</p>
                        <div class="link-btn">
                            <a href="service-details.html">Read More <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Counter Area
     ==============================-->
    <div class="position-relative counter">
        <div class="vs-container1">
            <div class="counter-shep1" data-bg-src="assets/img/bg/counter-bg.png"></div>
            <div class="counter-style1">
                <div class="container">
                    <div class="row g-5 justify-content-lg-between justify-content-center">
                        <div class="col-lg-auto col-md-6">
                            <div class="media-style1">
                                <div class="media-icon">
                                    <img src="assets/img/icon/counter-bg.png" alt="counter icon">
                                    <div class="icon">
                                        <img src="assets/img/icon/ci-1-1.svg" alt="">
                                    </div>
                                </div>
                                <div class="media-counter">
                                    <h2 class="media-title counter-number" data-count="85">00</h2>
                                    <span class="media-count_icon"><i class="far fa-plus"></i></span>
                                </div>
                                <p class="media-text">Pelanggan Tetap</p>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-6">
                            <div class="media-style1">
                                <div class="media-icon">
                                    <img src="assets/img/icon/counter-bg.png" alt="counter image">
                                    <div class="icon">
                                        <img src="assets/img/icon/ci-1-2.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="media-counter">
                                    <h2 class="media-title counter-number" data-count="995">00</h2>
                                    <span class="media-count_icon"><i class="far fa-plus"></i></span>
                                </div>
                                <p class="media-text">Kepuasan Seluruh Pembeli</p>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-6">
                            <div class="media-style1">
                                <div class="media-icon">
                                    <img src="assets/img/icon/counter-bg.png" alt="counter image">
                                    <div class="icon">
                                        <img src="assets/img/icon/ci-1-3.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="media-counter">
                                    <h2 class="media-title counter-number" data-count="5">00</h2>
                                    <span class="media-count_icon"><i class="far fa-plus"></i></span>
                                </div>
                                <p class="media-text">Distributor Ikan</p>
                            </div>
                        </div>
                        <div class="col-lg-auto col-md-6">
                            <div class="media-style1">
                                <div class="media-icon">
                                    <img src="assets/img/icon/counter-bg.png" alt="counter image">
                                    <div class="icon">
                                        <img src="assets/img/icon/ci-1-4.svg" alt="icon">
                                    </div>
                                </div>
                                <div class="media-counter">
                                    <h2 class="media-title counter-number" data-count="8590">00</h2>
                                    <span class="media-count_icon"><i class="far fa-plus"></i></span>
                                </div>
                                <p class="media-text">Pembelian Ikan Mencapai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
     Testimonials Area
     ==============================-->
    <section class="space">
        <div class="vs-container1">
            <div class="testi_wrap2">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-6">
                        <div class="testi-img1" id="testis_4_3">
                            <div class="testi-item2"><img src="assets/img/testimonial/testi-img-3-1.jpg"
                                    alt="testimonial"></div>
                            <div class="testi-item2"><img src="assets/img/testimonial/testi-img-3-2.jpg"
                                    alt="testimonial"></div>
                            <div class="testi-item2"><img src="assets/img/testimonial/testi-img-3-3.jpg"
                                    alt="testimonial"></div>
                            <div class="testi-item2"><img src="assets/img/testimonial/testi-img-3-4.jpg"
                                    alt="testimonial"></div>
                            <div class="testi-item2"><img src="assets/img/testimonial/testi-img-3-2.jpg"
                                    alt="testimonial"></div>
                        </div>
                    </div>
                    <div class="col-lg-auto position-relative">
                        <div class="testi_avater1 style2">
                            <div id="testis_4_2">
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-1.png" alt="author">
                                </div>
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-2.png" alt="author">
                                </div>
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-3.png" alt="author">
                                </div>
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-4.png" alt="author">
                                </div>
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-5.png" alt="author">
                                </div>
                                <div class="avater">
                                    <img src="assets/img/testimonial/testi-1-6.png" alt="author">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testi_style1 style2">
                            <div class="title-area">
                                <span class="sec-subtitle">Testimonials</span>
                                <h2 class="sec_title h3">What Clients Say?</h2>
                            </div>
                            <div id="testis_4_1">
                                <div class="testi_inner">
                                    <div class="testi_quote no-width">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">
                                        “Lorem ipsum dolor sit amet is the good ectur adipiscing elit
                                        eiusmod ex tempor incididunt labore dolore exercitation laboris.”
                                    </p>
                                    <h3 class="testi_author">Jerzzy Lamot</h3>
                                    <span class="testi_degi">Tiger Hunter</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote no-width">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">“Latin derived from Cicero's 1st-century BC text De Finibus
                                        Bonorum et Malorum lorem ipsum was born as a nonsense text Latin looks”</p>
                                    <h3 class="testi_author">Peter Parker</h3>
                                    <span class="testi_degi">Lion Hunter</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote no-width"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Richard McClintock, a Latin scholar from Hampden-Sydney
                                        College, is credited with discovering source behind the ubiquitous filler text”
                                    </p>
                                    <h3 class="testi_author">Vivi Marian</h3>
                                    <span class="testi_degi">Club Member</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote no-width"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Nor is there anyone who loves or pursues or desires to obtain
                                        pain of itself, because is pain but occasionally circumstances”</p>
                                    <h3 class="testi_author">John Donal</h3>
                                    <span class="testi_degi">Hunting Lover</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote no-width">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                    <p class="testi_text">“Creation timelines for the standard lorem ipsum passage vary,
                                        with some citing the 15th century and others the 20th According”</p>
                                    <h3 class="testi_author">Harry Poter</h3>
                                    <span class="testi_degi">Young member</span>
                                </div>
                                <div class="testi_inner">
                                    <div class="testi_quote no-width"><i class="fas fa-quote-right"></i></div>
                                    <p class="testi_text">“Rrow itself, let it be sorrow; let him love it; let him
                                        pursue it, ishing for its acquisitiendum. Because he will ab hold but concer”
                                    </p>
                                    <h3 class="testi_author">Marry Jain</h3>
                                    <span class="testi_degi">Sniper Hunter</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Team Area
     ==============================-->
    <section class="space bg-smoke overflow-hidden position-relative">
        <div class="shape-mockup explore-shape jump-img d-none d-xxl-block">
            <img src="assets/img/bg/team-shep1.png" alt="explore shape">
        </div>
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Our Team</span>
                <h2 class="sec-title">Our Fishing Expert Team </h2>
                <div class="sec-line"></div>
            </div>
            <div class="row vs-carousel arrow-style2" data-arrows="true" data-slide-show="2" data-lg-slide-show="2"
                data-md-slide-show="2">
                <div class="col-xl-6">
                    <div class="team_style2">
                        <div class="team_img"><a href="team-details.html"><img src="assets/img/team/team-2-1.jpg"
                                    alt="member"></a></div>
                        <div class="team_content">
                            <div class="team_info">
                                <h3 class="team_name h4">
                                    <a href="team-details.html">Andrew John</a>
                                </h3>
                                <p class="team_degi">Club Member</p>
                                <a href="mailto:info@example.com" class="team_mail">
                                    <i class="fas fa-envelope"></i>info@example.com</a>
                            </div>
                            <div class="team_social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="team_style2">
                        <div class="team_img"><a href="team-details.html"><img src="assets/img/team/team-2-2.jpg"
                                    alt="member"></a></div>
                        <div class="team_content">
                            <div class="team_info">
                                <h3 class="team_name"><a href="team-details.html">Jerzzy Lamot</a></h3>
                                <p class="team_degi">Plan Manager</p>
                                <a href="mailto:info@example.com" class="team_mail">
                                    <i class="fas fa-envelope"></i>info@example.com</a>
                            </div>
                            <div class="team_social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="team_style2">
                        <div class="team_img"><a href="team-details.html"><img src="assets/img/team/team-2-3-.jpg"
                                    alt="member"></a></div>
                        <div class="team_content">
                            <div class="team_info">
                                <h3 class="team_name"><a href="team-details.html">Jerzzy Lamot</a></h3>
                                <p class="team_degi">tour Guide</p>
                                <a href="mailto:info@example.com" class="team_mail">
                                    <i class="fas fa-envelope"></i>info@example.com</a>
                            </div>
                            <div class="team_social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Gallery Area
     ==============================-->
    <section class=" space">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Featured Spot</span>
                <h2 class="sec-title">Find your next Hunting Spot</h2>
                <div class="sec-line"></div>
            </div>
            <div class="service_style3">
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="assets/img/service/service-2-1.jpg"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Tuba Island Hunting Spot</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="assets/img/service/service-2-2.jpg"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Magic Gun Powder Short</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="assets/img/service/service-2-3.jpg"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Turkey Season hunting</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="assets/img/service/service-2-4.jpg"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Small Island short Area</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service_inner">
                    <a href="service-details.html" class="service_img"
                        data-bg-src="assets/img/service/service-2-1.jpg"></a>
                    <div class="service_content">
                        <h3 class="service_title"><a href="service-details.html">Medium Animals Catch</a></h3>
                        <p class="service_text">Lorem ipsum dolor sit amet is the good ectur adipiscing elit eiusmod ex
                            tempor incididunt labore dolore exercitagtion laboris.</p>
                        <a href="service-details.html" class="vs-btn style3">View More<i
                                class="fal fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     Brand Area
     ==============================-->
    <div>
        <div class="vs-container1">
            <div class="brands">
                <div class="row gx-5 vs-carousel z-index-common" data-arrows="false" data-wow-delay="0.4s"
                    data-slide-show="5" data-lg-slide-show="5" data-md-slide-show="3" data-xs-slide-show="1"
                    data-center-mode="true" data-xl-center-mode="true" data-ml-center-mode="true"
                    data-lg-center-mode="true" data-md-center-mode="true" data-sm-center-mode="true"
                    data-xs-center-mode="true">
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-1.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-2.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-3.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-4.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-1.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-2.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-3.png" alt="brand">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="bran-img">
                            <img src="./assets/img/brand/b-1-4.png" alt="brand">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
     Featured Area
     ==============================-->
    <section class="space-bottom bg-white">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Featured Spot</span>
                <h2 class="sec-title">Find your next fishing Spot</h2>
                <div class="sec-line"></div>
            </div>
            <div class="row  g-4">
                <div class="col-lg-6 col-md-6">
                    <div class="feature-style2">
                        <div class="feature-body">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="feature-img mega-hover">
                                        <a href="shop-details.html">
                                            <img src="./assets/img/feature/feature-2-1.jpg" alt="product">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-content text-center">
                                        <h4 class="feature-title">Fishing Reels</h4>
                                        <p class="feature-text">
                                            Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil best of our
                                            ins mgei.
                                        </p>
                                        <a href="shop.html" class="vs-btn style3">Shop Now <i
                                                class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="feature-style2">
                        <div class="feature-body">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="feature-img mega-hover">
                                        <a href="shop-details.html">
                                            <img src="./assets/img/feature/feature-2-2.jpg" alt="product">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-content text-center">
                                        <h4 class="feature-title">Fishing Hand Net</h4>
                                        <p class="feature-text">
                                            Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil best of our
                                            ins mgei.
                                        </p>
                                        <a href="shop.html" class="vs-btn style3">Shop Now <i
                                                class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="feature-style2">
                        <div class="feature-body reverse-style">
                            <div class="row flex-row-reverse align-items-center">
                                <div class="col-lg-6">
                                    <div class="feature-img mega-hover">
                                        <a href="shop-details.html">
                                            <img src="./assets/img/feature/feature-2-3.jpg" alt="product">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-content text-center">
                                        <h4 class="feature-title">Spoon lure Baits</h4>
                                        <p class="feature-text">
                                            Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil best of our
                                            ins mgei.
                                        </p>
                                        <a href="shop.html" class="vs-btn style3">Shop Now <i
                                                class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="feature-style2">
                        <div class="feature-body reverse-style">
                            <div class="row flex-row-reverse align-items-center">
                                <div class="col-lg-6">
                                    <div class="feature-img mega-hover">
                                        <a href="shop-details.html">
                                            <img src="./assets/img/feature/feature-2-4.jpg" alt="product">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="feature-content text-center">
                                        <h4 class="feature-title">Spinning Reel</h4>
                                        <p class="feature-text">
                                            Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil best of our
                                            ins mgei.
                                        </p>
                                        <a href="shop.html" class="vs-btn style3">Shop Now <i
                                                class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
     BLog Area
     ==============================-->
    <section class="space-top bg-smoke">
        <div class="container">
            <div class="title-area text-center wow fadeInUp wow-animated" data-wow-delay="0.3s">
                <span class="sec-subtitle">Our Blog</span>
                <h2 class="sec-title">Our Latest News & Update</h2>
                <div class="sec-line sec-line-center"></div>
            </div>
            <div class="row slick-arrow2 vs-carousel" data-arrows="true" data-wow-delay="0.4s" data-slide-show="3"
                data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true" data-xl-center-mode="true"
                data-ml-center-mode="true" data-lg-center-mode="true" data-md-center-mode="true"
                data-sm-center-mode="true">
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-1.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">07</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">Mastering the Art of Fly Fishing Tips for torquatos</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-2.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">08</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">The Ultimate Bass Fishing Guide. Techniques and Lures</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-3.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">09</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">Top 10 Fishing Destinations for is Anglers in 2023</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-4.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">11</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">Deep-Sea Fishing Adventure. A Beginner's Checklist</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-5.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">10</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">Kayak Fishing A Beginner's Manual for Paddling Anglers</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="vs-blog blog-style2">
                        <div class="blog-img">
                            <img class="w-100" src="assets/img/blog/blog-1-6.jpg" alt="Blog Img">
                            <div class="blog-meta2">
                                <span class="day">12</span>
                                <span class="month">January</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title">
                                <a href="blog-details.html">The Thrill of Ice Fishing Essential Gear & Safety Tips</a>
                            </h4>
                            <p class="blog-text">
                                Blienum nhaedrum torquatos nec eul, vis detraxit periculis ex, nihil is in mei.
                            </p>
                            <div class="blog-bottom">
                                <div class="blog-author">
                                    <a href="blog.html"><i class="fas fa-user"></i>Rodja Heartmman</a>
                                </div>
                                <a href="blog-details.html" class="vs-btn style3">Read More <i
                                        class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
        Subscribe Area
        ==============================-->
    <section class="bg-smoke">
        <div class="vs-container1">
            <div class="subscribe style1 mt-0">
                <div class="container">
                    <div
                        class="row gx-0 align-items-center justify-content-center justify-content-xl-between z-index-common ">
                        <div class="col-xl-auto">
                            <p class="sec-subtitle mb-0">Newsletter</p>
                            <h2 class="sec-title h1 text-white">Get Regular Update</h2>
                        </div>
                        <div class="col-xl-auto">
                            <form action="#" class="form-style">
                                <div class="row align-items-center">
                                    <div class="form-group mb-0 col">
                                        <input type="text" placeholder="Enter your email address....">
                                    </div>
                                    <div class="col-md-auto col-12">
                                        <button class="vs-btn w-100">Subscribe <i
                                                class="fab fa-telegram-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
