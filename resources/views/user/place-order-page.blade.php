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
                    <div class="d-block d-md-flex justify-content-center justify-content-xl-start">
                        <div class="block text-gray">
                            <span class="icon text-primary fas fa-phone-alt mr-15"></span>
                            0 (143) 456 7897
                        </div>
                        <div class="block text-gray border-0 p-0 m-0">
                            <span class="icon text-primary fas fa-map-marker-alt mr-15"></span>
                             11 Deneside, Seghill, NE23 7ER 
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 d-none d-xl-block">
                    <div class="social-area d-flex justify-content-end">
                        <a class="ml-0 social-links-four social-links-four-active" href="#"><span class="icon fab fa-facebook-f border-right-0"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-twitter"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-linkedin-in"></span></a>
                        <a class="social-links-four" href="#"><span class="icon fab fa-instagram"></span></a>
                    </div>
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
                                <div class="navbar-right-part d-flex mt-3 mt-lg-0">
                                    <span class="icon fas fa-search search-toggle" role="button"></span>
                                    <a class="icon border-0 p-0 m-0" href="cart.html">
                                        <i class="fas fa-shopping-basket"></i>
                                        <span class="notification">0</span>
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

<!-- start of banner -->
<div class="cm-banner-04 bg-cover" style="background-image: url(assets/cms-theme/assets/images/home-4/banner-bg.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
           
        </div>
    </div>
</div>
<!-- end of banner -->

<!-- start of features -->
<div class="cm-features-area">
    <div class="container">
        <div class="row no-gutters justify-content-center">
           
           
        </div>
    </div>
</div>
<!-- end of features -->
<div class="container">
    @include('common.validation')
    <form id="regForm" action="{{route('order.store',['username'=>$shop->subdomain])}}" method="POST">
        @csrf
        <!-- One "tab" for each step in the form: -->
        <div class="tab"> 
       <h1>Customer Informationen
      </h1>
          <div class="col-sm-12">
              <div class="form-group col-sm-4" style="width:100%">
                <label for="sel1">CATEGORY</label><br>
                <p id="demo"></p>
                <select class="form-control" style="width:100%" name="category" id="mySelect" onchange="myFunction()">
                  <option>Private</option>
                  <option>Company</option> 
                </select>
                <input type="hidden" name="categorystatus" id="categorystatus" value="Private" >
              </div>
          </div>
          <br><br>
      
          <div class="clearfix"></div>
      
          <div class="col-sm-12">
              <div class="form-group col-sm-4" style="float:left">
                <label id="label1">TITLE *</label>
                <input type="text" class="form-control" name="title">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label id="label2">FIRST NAME *</label>
                <input type="text" class="form-control" name="firstname">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label id="label3">SURNAME *</label>
                <input type="text" class="form-control" name="surname">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>Address</label>
                <input type="text" class="form-control" name="address">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>POSTAL CODE</label>
                <input type="text" class="form-control" name="postalcode">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>CITY</label>
                <input type="text" class="form-control" name="city">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>LANDLINE NUMBER</label>
                <input type="text" class="form-control" name="landlinenumber">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>MOBILE NUMBER</label>
                <input type="text" class="form-control" name="mobilenumber">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>EMAIL *</label>
                <input type="text" class="form-control" name="email">
              </div>
      
          </div>
          <div class="clearfix"></div>
      
      
      
      
      
      
      
        </div>
        <div class="tab"> 
      <h1>Device Informationen
      </h1>
      <div class="container">
      
       <div class="form-group col-sm-6" style="float:left">
                <label for="sel1">MANUFACTURER </label><br>
                <select class="form-control" id="sel1" name="manufacturer">
                    <option value="" disabled selected>Select Manufacturer</option>
                    @foreach ($shop->getCrmSetting('Manufacture',$shop->id) as $item)
                    <option>{{$item->manufacture}}</option>      
                    @endforeach
                </select>
              </div>
      
               <div class="form-group col-sm-6" style="float:left">
                <label for="sel1">MODEL </label><br>
                <select class="form-control" id="sel1" name="modal">
                    <option value="" disabled selected>Select Model</option>
                    @foreach ($shop->getCrmSetting('Modal',$shop->id) as $item)
                    <option>{{$item->modal}}</option>      
                    @endforeach
                </select>
              </div>
      
               <div class="form-group col-sm-4" style="float:left">
                <label>IMEI *</label>
                <input type="text" class="form-control" name="imei">
              </div>
      
               <div class="form-group col-sm-4" style="float:left">
                <label>SERIAL NO. *</label>
                <input type="text" class="form-control" name="serialnumber">
              </div>
      
               <div class="form-group col-sm-4" style="float:left">
                <label>DEVICE PASSWORD / ICLOUD ? </label>
                <input type="text" class="form-control" name="devicepassword">
              </div>
      
          <div class="form-group col-sm-3" style="float:left">
                <label for="sel1">STORAGE</label><br>
                <select class="form-control" id="sel1" name="storage">
                    <option value="" disabled selected>Select Storage</option>
                    @foreach ($shop->getCrmSetting('Storage',$shop->id) as $item)
                    <option>{{$item->storage}}</option>      
                    @endforeach
                </select>
              </div>
      
      
          <div class="form-group col-sm-3" style="float:left">
                <label for="sel1">COLOUR</label><br>
                <select class="form-control" id="sel1" name="color">
                    <option value="" disabled selected>Select Color</option>
                    @foreach ($shop->getCrmSetting('Color',$shop->id) as $item)
                    <option>{{$item->color}}</option>      
                    @endforeach
                </select>
              </div>
      
      
          <div class="form-group col-sm-3" style="float:left">
                <label for="sel1">OFFERER</label><br>
                <select class="form-control" id="sel1" name="offer">
                    <option value="" disabled selected>Select Offerer</option>
                    @foreach ($shop->getCrmSetting('Offers',$shop->id) as $item)
                    <option>{{$item->offer}}</option>      
                    @endforeach
                </select>
              </div>
          <div class="form-group col-sm-3" style="float:left">
                <label for="sel1">CONDITION</label><br>
                <select class="form-control" id="sel1" name="condition">
                    <option value="" disabled selected>Select Condition</option>
                    @foreach ($shop->getCrmSetting('Condition',$shop->id) as $item)
                    <option>{{$item->condition}}</option>      
                    @endforeach
                </select>
              </div>
      
      <div class="clearfix"></div>
      </div>
      
        </div>
         <div class="tab"> 
      <h1>Device Error
      </h1>
          <div class="col-sm-12">
              <div class="form-group col-sm-4" style="width:100%;float:left">
                <label for="sel1">Problems</label><br>
                <select class="form-control" style="width:100%" name="problem">
                    <option value="" disabled selected>Select Problem</option>
                    @foreach ($shop->getCrmSetting('Problem',$shop->id) as $item)
                    <option>{{$item->problem}}</option>      
                    @endforeach
                </select>
              </div>
              {{-- <div class="form-group col-sm-4" style="width:100%;float:left">
                <label for="sel1">Add</label><br>
                <button> + </button>
              </div> --}}
      <div class="clearfix"></div>
          </div>
          <br><br>
      
          <div class="clearfix"></div>
      
          <div class="col-sm-12">
              <div class="form-group col-sm-6" style="float:left">
                <label for="comment">Comment:</label>
                <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
              </div>
      
      
              <div class="form-group col-sm-4" style="float:left">
                <label>DEADLINE / DURATION *</label>
                <input type="text" class="form-control" name="duration">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>TIME *</label>
                <input type="text" class="form-control" name="time">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label style="width:100%;float:left">PRICE DEFAULT €</label>
                <input type="text" class="form-control" placeholder="min" style="width: 30%;float:left" name="pricedefaultmin">  
                <input type="text" class="form-control" placeholder="max" style="width: 30%;float:left" name="pricedefaultmax">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>WAREHOUSE NUMBER</label>
                <input type="text" class="form-control" name="warehousenumber">
              </div>
              <div class="form-group col-sm-4" style="float:left">
                <label>APPROVAL TO CARRY OUT </label>
                <input type="text" class="form-control" name="approval">
              </div>
               <div class="form-group col-sm-4" style="width:100%;float:left">
                <label for="sel1">PAYMENT METHOD</label><br>
                <select class="form-control" style="width:100%" name="paymentmethod">
                    <option value="" disabled selected>Select Method</option>
                    @foreach ($shop->getCrmSetting('PaymentTerms',$shop->id) as $item)
                    <option>{{$item->term}}</option>      
                    @endforeach
                </select>
              </div>
               
               
      
          </div>
          <div class="clearfix"></div>
      
      
      
      
      
      
      
        </div>
       
        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
      </form>
</div>


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

@section('pageStyles')
<style type="text/css">
 

    body {
      background-color: #f1f1f1;
    }
    
    #regForm {
      background-color: #ffffff;
      margin:  auto;
      font-family: Raleway;
      padding: 40px; 
      min-width: 300px;
    }
    
    h1 {
      text-align: center;  
    }
    
    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    
    button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }
    
    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      background-color: #bbbbbb;
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    
    </style>
@endsection

@section('pageScripts')
<script>
  function myFunction() {
    var x = document.getElementById("mySelect").value;
    //document.getElementById("demo").innerHTML = "You selected: " + x;
    //alert(x);
    if (x=='Company') {
      document.getElementById("categorystatus").value = 'Company';
      document.getElementById("label1").innerHTML = 'Company *';
      document.getElementById("label2").innerHTML = 'Contact Person 1 *';
      document.getElementById("label3").innerHTML = 'Contact Person 2 *';
      //alert(document.getElementById("categorystatus").value);
    }
    if (x=='Private') {
      document.getElementById("categorystatus").value = 'Private';
      document.getElementById("label1").innerHTML = 'TITLE *';
      document.getElementById("label2").innerHTML = 'FIRST NAME *';
      document.getElementById("label3").innerHTML = 'SURNAME *';
      //alert(document.getElementById("categorystatus").value);
    }
    
  }
  </script>
<script type="text/javascript"> 
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
    
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>
@endsection