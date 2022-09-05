@extends('layouts.cms-theme')
@section('body-content')
{{-- <div class="preloader-wrapper">
    <div class="preloader-inner">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
</div> --}}
<!-- end preloader -->

<!-- START search-wrapper -->
<div class="search-wrapper position-fixed d-flex align-items-center justify-content-center z-index-1">
    <div class="search-close-wrap">
        <p class="search-close-btn text-center rounded-circle" role="button"><span class="fas fa-times"></span></p>
    </div>
    <form action="#">
        <div class="form-group d-flex m-0">
            <input class="form-control shadow-none border-0 bg-transparent" type="search" placeholder="Type here">
            <button type="submit" class="btn btn-primary p-0 border-0 text-white"><span class="fas fa-search"></span></button>
        </div>
    </form>
</div>
<!-- END search-wrapper -->

<!-- start header -->
<header class="cm-header header-1024">
    <div class="header-top bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    {{-- <div class="d-block d-md-flex justify-content-center justify-content-xl-start">
                        <div class="block text-gray mr-35">
                            <span class="icon text-primary fas fa-phone-alt mr-15"></span>
                            0 (143) 456 7897
                        </div>
                        <div class="block text-gray mr-35">
                            <span class="icon text-primary fas fa-envelope mr-15"></span>
                            info@example.com
                        </div>
                        <div class="block text-gray">
                            <span class="icon text-primary fas fa-home mr-15"></span>
                             11 Deneside, Seghill, NE23 7ER 
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="block d-flex justify-content-end">
                        <a href="#" class="text-primary"><span class="icon fab fa-facebook-f border-right-0"></span></a>
                        <a href="#" class="text-primary"><span class="icon fab fa-twitter border-right-0"></span></a>
                        <a href="#" class="text-primary"><span class="icon fab fa-linkedin-in"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header">
        <div class="container h-100">
            <div class="row h-100 align-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light px-0">
                        <a class="navbar-brand" href="/">
                            <img src="{{asset('assets/cms-theme/assets/images/logo.png')}}" alt="logo">
                            <!-- logo -->
                        </a>
                        <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navLinks">
                            <ul class="navbar-nav ml-auto align-items-center">
                               @include('user.include.topbar')
                                <div class="block d-flex mt-3 mt-lg-0">
                                    <span class="icon fas fa-share-alt text-dark" role="button"></span>
                                    <span class="icon fas fa-search text-dark search-toggle" role="button"></span>
                                    <a class="icon pr-0 pt-0 pb-0 text-dark" href="cart.html">
                                        <span class="fas fa-shopping-bag"></span>
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- start header -->
<header class="cm-header header-four">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 offset-lg-3">
                    {{-- <div class="d-block d-md-flex justify-content-center justify-content-xl-start">
                        <div class="block text-gray">
                            <span class="icon text-primary fas fa-phone-alt mr-15"></span>
                            0 (143) 456 7897
                        </div>
                        <div class="block text-gray border-0 p-0 m-0">
                            <span class="icon text-primary fas fa-map-marker-alt mr-15"></span>
                             11 Deneside, Seghill, NE23 7ER 
                        </div>
                    </div> --}}
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    {{-- <div class="social-area d-flex justify-content-end">
                        <a class="ml-0 social-links-four social-links-four-active" href="#"><span class="icon fab fa-facebook-f border-right-0"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-twitter"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-linkedin-in"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-instagram"></span></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
    <div class="header">
        <div class="container h-100">
            <a class="navbar-brand" href="/">
                <img src="{{asset('assets/cms-theme/assets/images/logo.png')}}" alt="logo">
                <!-- logo -->
            </a>
            <div class="row h-100 align-content-center">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg px-0">
                        <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#navLinks" aria-controls="navLinks" aria-expanded="false">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navLinks">
                            <ul class="navbar-nav ml-auto align-items-center">
                                @include('user.include.topbar')
                                {{-- <div class="navbar-right-part d-flex mt-3 mt-lg-0">
                                    <span class="icon fas fa-search search-toggle" role="button"></span>
                                    <a class="icon border-0 p-0 m-0" href="cart.html">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span class="notification">0</span>
                                    </a>
                                    
                                </div> --}}
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

<!-- start of banner -->
<div class="cm-banner-04 bg-cover" style="background-image: url(assets/cms-theme/assets/images/home-4/banner-bg.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-7">
                <div class="banner-inner">
                    <h4>Mobile & Computer</h4>
                    <h1>Repair Service</h1>
                    <p>Instrument cultivated alteration any favourable expression law far nor. Both new like tore but year.  </p>
                    <div class="btn-area">
                        <a class="btn btn-primary" href="services.html">Book a Services</a>
                        <a class="btn btn-light mr-0" href="cart.html">Get a Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of banner -->

<!-- start of features -->
<div class="cm-features-area">
    <div class="container">
        <div class="row no-gutters justify-content-center">
            <div class="col-xl-4 col-md-6">
                <div class="single-features-wrap">
                    <span class="icon">
                        <img src="{{asset('assets/cms-theme/assets/images/home-4/features/1.png')}}" alt="img">
                    </span>
                    <div>
                        <h4>Low Price Guarantee</h4>
                        <p>John draw real poor</p>
                    </div>
                </div>
                <!-- features item -->
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="single-features-wrap single-features-wrap-active">
                    <span class="icon">
                        <img src="{{asset('assets/cms-theme/assets/images/home-4/features/2.png')}}" alt="img">
                    </span>
                    <div>
                        <h4>Trust Our Experience</h4>
                        <p>John draw real poor</p>
                    </div>
                </div>
                <!-- features item -->
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="single-features-wrap">
                    <span class="icon">
                        <img src="{{asset('assets/cms-theme/assets/images/home-4/features/3.png')}}" alt="img">
                    </span>
                    <div>
                        <h4>1 Year Warranty</h4>
                        <p>John draw real poor</p>
                    </div>
                </div>
                <!-- features item -->
            </div>
        </div>
    </div>
</div>
<!-- end of features -->

<!-- start of about-us -->
<section class="section cm-about-us">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="pr-0 pr-lg-5">
                    <img class="img-fluid" src="{{asset('assets/cms-theme/assets/images/home-4/about.jpg')}}" alt="about-image">
                </div>
            </div>
            <div class="col-lg-6 col-md-10">
                <div class="block mt-5 mt-lg-0">
                    <h4 class="section-subtitle">About Us <span></span></h4>
                    <h2 class="text-dark-2">Successfully Providing the Best Computer and Mobile Services from 20 years</h2>
                    <p class="text-dark-2 mt-25">Do commanded an shameless we disposing do. Indulgence ten remarkably nor are impression out.</p>
                    <p class="text-dark-2 mt-25">Power is lived means oh every in we quiet. Remainder provision an in intention. Saw supported too joy promotion engrosse. Want eyes by neat so just must. Past draw tall up face show rent oh mr.</p>
                    <div class="about-media media align-items-center">
                        <div class="thumb">
                            <img src="{{asset('assets/cms-theme/assets/images/home-4/user.jpg')}}" alt="img">
                        </div>
                        <div class="media-body">
                            <h6 class="text-dark-2">Jonson Adalson</h6>
                            <span class="text-dark-2">CEO, of CM-repair Company</span>
                        </div>
                        <div class="thumb m-0">
                            <img src="{{asset('assets/cms-theme/assets/images/home-4/signature.jpg')}}" alt="img">
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary mt-30">learn more</a>
                </div>
            </div>
        </div>
        <div class="cm-fact-area">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <div class="wrap-details">
                            <h2><span class="counter">40</span>+</h2>
                            <p>Professionals</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <div class="wrap-details">
                            <h2><span class="counter">6.8</span>k+</h2>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <div class="wrap-details">
                            <h2><span class="counter">90</span>%</h2>
                            <p>Devices Fixed</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-fact-wrap">
                        <div class="wrap-details">
                            <h2><span class="counter">1.2</span>k+</h2>
                            <p>Win Awards</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of about-us -->

<!-- start of services -->
<section class="section cm-services bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h4 class="section-subtitle">Our Services <span></span></h4>
                <h2 class="section-heading text-dark-2 mb-30">Explore Our Services</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="service-slider owl-carousel">
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/1.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/1.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>PC Computer Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/2.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/2.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Laptop Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/3.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/3.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Mobile Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/4.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/4.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Data Recovery</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/1.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/1.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>PC Computer Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/2.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/2.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Laptop Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/3.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/3.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Mobile Repair</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="single-service-wrap text-center">
                            <div class="context">
                                <div class="thumb">
                                    <img src="{{asset('assets/cms-theme/assets/images/home-4/service/4.jpg')}}" alt="img">
                                    <span><img src="{{asset('assets/cms-theme/assets/images/home-4/service/icon/4.jpg')}}" alt=""></span>
                                </div>
                                <div class="details">
                                    <h4>Data Recovery</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                                    <a class="more-btn" href="service-details.html"><i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of services -->

<!-- start of wcu-area -->
<section class="section cm-wcu-area" style="background-image: url(assets/cms-theme/assets/images/home-4/why-choose-us.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-5 col-md-10">
                <div class="block mt-5 mt-lg-0">
                    <h4 class="section-subtitle">Why Choosee Us <span></span></h4>
                    <h2 class="text-white">When You Need Us, We
                        Are Here.</h2>
                    <p class="text-white mt-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                    <div class="wcu-single-wrap">
                        <div class="thumb">
                            <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-1.jpg')}}" alt="img">
                        </div>
                        <h6 class="text-white">After Sales Support</h6>
                    </div>
                    <div class="wcu-single-wrap">
                        <div class="thumb">
                            <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-2.jpg')}}" alt="img">
                        </div>
                        <h6 class="text-white">Client Satisfaction</h6>
                    </div>
                    <a href="services.html" class="btn btn-primary mt-30">Get A Quote</a>
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 col-md-8">
                <div class="row no-gutters">
                    <div class="col-lg-6 mt-4">
                        <div class="single-wcu-wrap">
                            <div class="thumb">
                                <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-3.jpg')}}" alt="icon">
                            </div>
                            <h4>Skilled Personal</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                        </div>
                        <div class="single-wcu-wrap bg-white">
                            <div class="thumb">
                                <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-5.jpg')}}" alt="icon">
                            </div>
                            <h4 class="text-dark-2">Quality</h4>
                            <p class="text-dark-2">Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-wcu-wrap bg-white">
                            <div class="thumb">
                                <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-4.jpg')}}" alt="icon">
                            </div>
                            <h4 class="text-dark-2">Experience</h4>
                            <p class="text-dark-2">Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                        </div>
                        <div class="single-wcu-wrap">
                            <div class="thumb">
                                <img src="{{asset('assets/cms-theme/assets/images/home-4/icon/wcu-6.jpg')}}" alt="icon">
                            </div>
                            <h4>
                                Genuine Part</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of wcu-area -->

<!-- start of products -->
<section class="section bg-light-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 text-center">
                <div class="col-lg-12 text-center">
                    <h4 class="section-subtitle">Products <span></span></h4>
                    <h2 class="section-heading text-dark-2 mb-30">Our Recent Products</h2>
                </div>
            </div>
        </div>
        <div class="row no-gutters justify-content-center">
            <div class="col-xl-9 text-center mb-40">
                <div class="btn-group product-filter-buttons">
                    <button type="button" class="btn active" data-owl-filter="*">All</button>
                    <button type="button" class="btn" data-owl-filter=".computer">Desktop</button>
                    <button type="button" class="btn" data-owl-filter=".laptop">Laptop</button>
                    <button type="button" class="btn" data-owl-filter=".mobile">Mobile</button>
                    <button type="button" class="btn" data-owl-filter=".screen-pro">Screen protector</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="owl-carousel fluid-carousel">
                    <div class="card computer border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/1.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Apple iMac Retina 5K</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card laptop border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/2.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Macbook-pro-air-mini</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card mobile border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/3.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">iPhone X IPhone 8</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card screen-pro border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/4.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Intel Core i7 Gaming PC</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card computer border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/1.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Apple iMac Retina 5K</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card laptop border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/2.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Macbook-pro-air-mini</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card mobile border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/3.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">iPhone X IPhone 8</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                    <div class="card screen-pro border-0 product-item">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                        <img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/product/4.jpg')}}" alt="img">
                        <div class="card-body">
                            <h5 class="text-dark-2 mb-10">Intel Core i7 Gaming PC</h5>
                            <div class="rating small text-primary d-inline-flex">
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                                <span class="far fa-star"></span>
                            </div>
                            <h5 class="text-dark-2">$245.00</h5>
                            <a href="#" class="btn btn-primary"><span class="fas fa-cart-plus mr-2"></span>Add to Cart </a>
                        </div>
                    </div>
                    <!-- product-item -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of products -->

<!-- start of cta -->
<section class="section cm-cta bg-cover overlay-dark" style="background-image: url(assets/cms-theme/assets/images/home-4/cta.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-8">
                <div class="text-white text-center">
                    <h2 class="mb-30">Do You Want Custom Service? Contact Us Now</h2>
                    <p class="px-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                    <h4 class="mt-20 mb-40"><span class="text-primary">0123-456-789</span> for Immediate Tech Support</h4>
                    <a href="services.html" class="btn btn-primary">Book Services</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of cta -->

<!-- start of team -->
<section class="section cm-team pt-95">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 text-center">
                <div class="col-lg-12 text-center">
                    <h4 class="section-subtitle">Team <span></span></h4>
                    <h2 class="section-heading text-dark-2 mb-30">Our Professional Expert Team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team-item text-center mt-40">
                    <div class="thumb">
                        <img class="team-img img-fluid" src="{{asset('assets/cms-theme/assets/images/home-4/team/1.jpg')}}" alt="img">
                        <ul class="social-links">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                    </div>
                    <h4 class="text-dark-2">Imon Hossain</h4>
                    <span class="text-primary">Repair Technician</span>
                </div>
                <!-- team item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item text-center mt-40">
                    <div class="thumb">
                        <img class="team-img img-fluid" src="{{asset('assets/cms-theme/assets/images/home-4/team/2.jpg')}}" alt="img">
                        <ul class="social-links">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                    </div>
                    <h4 class="text-dark-2">Alex Frunklin</h4>
                    <span class="text-primary">Repair Technician</span>
                </div>
                <!-- team item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item text-center mt-40">
                    <div class="thumb">
                        <img class="team-img img-fluid" src="{{asset('assets/cms-theme/assets/images/home-4/team/3.jpg')}}" alt="img">
                        <ul class="social-links mt-25">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                    </div>
                    <h4 class="text-dark-2">Henry Joseph</h4>
                    <span class="text-primary">Repair Technician</span>
                </div>
                <!-- team item -->
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team-item text-center mt-40">
                    <div class="thumb">
                        <img class="team-img img-fluid" src="{{asset('assets/cms-theme/assets/images/home-4/team/4.jpg')}}" alt="img">
                        <ul class="social-links">
                            <li><a href="#"><span class="fa fa-heart"></span></a></li>
                            <li><a href="#"><span class="fa fa-share-alt"></span></a></li>
                            <li><a href="#"><span class="fa fa-eye"></span></a></li>
                            <li><a href="#"><span class="fa fa-search"></span></a></li>
                        </ul>
                    </div>
                    <h4 class="text-dark-2">Aaron Finch</h4>
                    <span class="text-primary">Repair Technician</span>
                </div>
                <!-- team item -->
            </div>
        </div>
    </div>
</section>
<!-- end of team -->

<!-- start of testimonials -->
<section class="section cm-testimonials" style="background-image: url(assets/cms-theme/assets/images/home-4/testimonial.jpg);"> 
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8">
                <div class="block mt-5 mt-lg-0">
                    <h4 class="section-subtitle">Testimonials <span></span></h4>
                    <h2 class="text-white">Happy Client Quote After
                        Servicing</h2>
                    <div class="owl-carousel testimonial-slider">
                        <div class="cm-testimonial-wrap">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                            <div class="media">
                                <div class="media-body">
                                    <h4>Micheal Smith</h4>
                                    <span>Manager</span>
                                </div>
                                <div>
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                        <div class="cm-testimonial-wrap">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
                            <div class="media">
                                <div class="media-body">
                                    <h4>Micheal Smith</h4>
                                    <span>Manager</span>
                                </div>
                                <div>
                                    <i class="fas fa-quote-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of testimonials -->

<!-- start of blogs -->
<section class="section cm-blogs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8 text-center">
                <div class="col-lg-12 text-center">
                    <h4 class="section-subtitle">Blog <span></span></h4>
                    <h2 class="section-heading h1 text-dark-2 mb-30">Our Recent Blog & News</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item card border-0 mt-30">
                    <div class="thumb">
                        <a href="blog-details.html"><img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/blog/1.jpg')}}" alt=""></a>
                        <div class="blog-meta-overlap"><i class="fa fa-clock"></i>03 Dec, 2021</div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="h4 font-w-400 text-dark line-h-1-5">Resources Exquisite Set Arranging Moonlight Him</a>
                        <p class="mt-20">Lorem ipsum dolor sit amet, consecte
                            tur adipiscing elit</p>
                        <div class="mt-20 d-flex">
                            <a href="blog-details.html" class="text-dark font-w-600">Read More <span class="fas fa-long-arrow-alt-right text-primary"></span></a>
                            <a href="#" class="comment"><i class="far fa-comment-dots"></i> Comment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item card border-0 mt-30">
                    <div class="thumb">
                        <a href="blog-details.html"><img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/blog/2.jpg')}}" alt=""></a>
                        <div class="blog-meta-overlap"><i class="fa fa-clock"></i>03 Dec, 2021</div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="h4 font-w-400 text-dark line-h-1-5">Barton Did Feebly Change Man
                            She Afford Square</a>
                        <p class="mt-20">Lorem ipsum dolor sit amet, consecte
                            tur adipiscing elit</p>
                        <div class="mt-20 d-flex">
                            <a href="blog-details.html" class="text-dark font-w-600">Read More <span class="fas fa-long-arrow-alt-right text-primary"></span></a>
                            <a href="#" class="comment"><i class="far fa-comment-dots"></i> Comment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item card border-0 mt-30">
                    <div class="thumb">
                        <a href="blog-details.html"><img class="card-img-top" src="{{asset('assets/cms-theme/assets/images/home-4/blog/3.jpg')}}" alt=""></a>
                        <div class="blog-meta-overlap"><i class="fa fa-clock"></i>03 Dec, 2021</div>
                    </div>
                    <div class="card-body">
                        <a href="blog-details.html" class="h4 font-w-400 text-dark line-h-1-5">Village Did Removed Enjoyed
                            Explain Saw Calling Talking.</a>
                        <p class="mt-20">Lorem ipsum dolor sit amet, consecte
                            tur adipiscing elit</p>
                        <div class="mt-20 d-flex">
                            <a href="blog-details.html" class="text-dark font-w-600">Read More <span class="fas fa-long-arrow-alt-right text-primary"></span></a>
                            <a href="#" class="comment"><i class="far fa-comment-dots"></i> Comment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of blogs -->

<!-- start of brands -->
<section class="section bg-light-gray cm-brands-02">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel brand-carousel">
                    <img class="img-fluid mt-40" src="{{asset('assets/cms-theme/assets/images/home-4/brand/01.png')}}" alt="">
                    <img class="img-fluid mt-40" src="{{asset('assets/cms-theme/assets/images/home-4/brand/02.png')}}" alt="">
                    <img class="img-fluid mt-40" src="{{asset('assets/cms-theme/assets/images/home-4/brand/03.png')}}" alt="">
                    <img class="img-fluid mt-40" src="{{asset('assets/cms-theme/assets/images/home-4/brand/04.png')}}" alt="">
                    <img class="img-fluid mt-40" src="{{asset('assets/cms-theme/assets/images/home-4/brand/05.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of brands -->

<!-- start footer -->
@include('user.include.footer')
<!-- end footer -->

<a href="#top" class="scroll-to-top">
    <span class="fas fa-chevron-up"></span>
</a>
@endsection

@section('theme-body-attributes')
    @parent
    class="home-4"
@endsection