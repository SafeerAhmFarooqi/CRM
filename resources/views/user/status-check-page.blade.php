
{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

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
<header class="cm-header">
    <div class="header-top bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-xl-10">
                    <div class="d-block d-md-flex justify-content-center justify-content-xl-start">
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
                    </div>
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="block d-flex justify-content-end">
                        <a href="#!" class="text-primary"><span class="icon fab fa-facebook-f border-right-0"></span></a>
                        <a href="#!" class="text-primary"><span class="icon fab fa-twitter border-right-0"></span></a>
                        <a href="#!" class="text-primary"><span class="icon fab fa-linkedin-in"></span></a>
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


<!-- login-Area Start-->
<div class="login-area section">
<div class="container">
    <div class="row">
      <div class="col-lg-4" style="background:#f9f9f9">
        <div class="d-flex justify-content-center">
          <div class="py-4">
            <div class="avatar avatar-xl" style="text-align:center"><img class="avatar-img" src="https://www.seekpng.com/png/detail/259-2597937_mobile-icon-auqablue-mobile-icon-png.png" style="width:50%"></div>
            <div class="text-center mt-3">
              <h2 class="h5">{{$order->customer->category=='Private'?$order->customer->firstname.' '.$order->customer->surname : $order->customer->company}}</h2>
             </div>
          </div>
        </div>
        <div class="d-flex justify-content-center flex-wrap">
          <div class="text-center px-3 py-2" style="width: 50%;text-align: left !important;">
            <p class="small text-muted mb-0">Brand</p>
            <p class="font-weight-bold mb-0">{{$order->manufacturer}}</p>
          </div>
          <div class="text-center px-3 py-2" style="width: 50%;text-align: left !important;">
            <p class="small text-muted mb-0">Model</p>
            <p class="font-weight-bold mb-0">{{$order->model}}</p>
          </div> 
        </div>
     
          <div class="text-center px-3 py-2" style="width: 100%;text-align: left !important;">
             <p class="small text-muted mb-0">IMEI</p>
            <p class="font-weight-bold mb-0">{{$order->imei}}</p>
          </div>
       
      </div>

 <div class="clearfix"></div>

      <div class="col-lg-8">
     
        <livewire:order-status-chat :orderId="$order->id" :isUser="1"/> 


      </div>



    </div>
</div>








</div>
<!-- login-Area end-->

<!-- start footer -->
@include('user.include.footer')
<!-- end footer -->

<a href="#top" class="scroll-to-top">
    <span class="fas fa-chevron-up"></span>
</a>
<!-- scroll to top -->
@endsection

@section('pageStyles')
<style type="text/css">
    .chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>
@endsection
