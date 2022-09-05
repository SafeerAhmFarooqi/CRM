@extends('dashboards.shop.dashboard-layout')
@section('page-content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <b>
                
               
                        Shop Dashboard
              
       
                </b>
                <!--end::Title-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->

    {{-- <div class="container mb-4">
        <div class="alert alert-warning" role="alert">
            Please complete your profile by clicking
            <a href="#" class="alert-link"> here</a>.
        </div>
    </div> --}}
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            @include('common.validation')
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
             
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                 
    
     
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
     
            <!--begin::Content-->
            <div class="collapse show" id="kt_account_settings_profile_details">
                <!--begin::Form-->
                <form method="POST" action="{{route('shop.valueaddtax.store')}}">
                    @csrf
    
     
     
    
    
    
    
    
    
        <div class="d-flex flex-column flex-lg-row mb-17" style="padding-top:50px">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-0 me-lg-20">
                <!--begin::Form-->
     
                         
    
    
                     
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                         
                     
                        <!--begin::Col-->
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="form-label">Apply sales tax:</label>
                            <select class="form-select" aria-label="Select example" name="apply">
                                 <option value="1" {{(Auth::user()->valueAddTax()->count()>0)? (Auth::user()->valueAddTax->apply? 'selected' : '') : ('') }}>Yes </option>
                                <option value="0" {{(Auth::user()->valueAddTax()->count()>0)? (Auth::user()->valueAddTax->apply==0? 'selected' : '') : ('') }}>No</option> 
                            </select>
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="form-label">Prices including or excluding:</label>
                            <select class="form-select" aria-label="Select example" name="price_status">
                                 <option value="1" {{(Auth::user()->valueAddTax()->count()>0)? (Auth::user()->valueAddTax->price_status? 'selected' : '') : ('') }}>incl </option>
                                <option value="0" {{(Auth::user()->valueAddTax()->count()>0)? (Auth::user()->valueAddTax->price_status==0? 'selected' : '') : ('') }}>excl</option> 
                            </select>
                        </div>  
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Designation (VAT, GST, BTW):</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="designation" placeholder="VAT" type="text" value="{{Auth::user()->valueAddTax->designation??''}}"> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Shock rate %:</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="shock_rate" placeholder="Shock Rate" type="number" value="{{Auth::user()->valueAddTax->shock_rate??''}}"> 
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
    
    
    
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button class="btn btn-light btn-active-light-primary me-2" type="reset">Discard</button> <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">Save Changes</button>
                    </div>
    
    
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                     
                                 <div></div>
                </form><!--end::Form-->
                <!--begin::Job-->
              
            </div><!--end::Content-->
            <!--begin::Sidebar-->
         
        </div>
     
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
    
            </div><!--end::Content-->
        </div><!--end::Table-->
        <!--end::Card body-->
        <!--end::Products-->
     
        <!--end::Container-->
    </div>
    </div>
    </div>
@endsection

@section('pageScripts')
<script src="{{asset('assets/Metronic-Theme/js/custom/apps/ecommerce/reports/views/views.js')}}"></script>
@endsection