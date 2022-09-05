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
             
    
        <div class="card-body pt-9 pb-0" style="padding:0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img alt="image" src="{{Auth::user()->logo?asset('storage/'.Auth::user()->logo) : asset('assets/Metronic-Theme/media/svg/avatars/blank.svg')}}">
                        <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                    </div>
                </div><!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" href="#">{{Auth::user()->shopname??'Waiting...'}}</a>  
                            </div><!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2" href="#"><!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                 <span class="svg-icon svg-icon-4 me-1"><svg height="18" viewbox="0 0 18 18" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" opacity="0.3"></path>
                                <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor"></path>
                                <rect fill="currentColor" height="4" rx="2" width="4" x="7" y="6"></rect></svg></span> {{Auth::user()->phone??'Waiting...'}}</a> <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2" href="#"><!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                 <span class="svg-icon svg-icon-4 me-1"><svg height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" opacity="0.3"></path>
                                <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor"></path></svg></span> <!--end::Svg Icon-->{{Auth::user()->address??'Waiting...'}}</a> <a class="d-flex align-items-center text-gray-400 text-hover-primary mb-2" href="#"><!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                 <span class="svg-icon svg-icon-4 me-1"><svg height="24" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" opacity="0.3"></path>
                                <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path></svg></span> <!--end::Svg Icon-->{{Auth::user()->email??'Waiting...'}}</a>
                            </div><!--end::Info-->
                        </div><!--end::User-->
                        <!--begin::Actions-->
                     
                    </div><!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap"  >
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded col-sm-4 text-center">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">									 
                                        <div class="fs-2 fw-bold counted" style="width:100%;padding:12px">
                                            0
                                        </div>
                                    </div><!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">
                                        Active Orders
                                    </div><!--end::Label-->
                                </div><!--end::Stat-->
    
    
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded col-sm-4 text-center">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">									 
                                        <div class="fs-2 fw-bold counted" style="width:100%;padding:12px">
                                            0
                                        </div>
                                    </div><!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">
                                        Pending Orders
                                    </div><!--end::Label-->
                                </div><!--end::Stat-->
    
    
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded col-sm-4 text-center">
                                    <!--begin::Number-->
                                    <div class="d-flex align-items-center">									 
                                        <div class="fs-2 fw-bold counted" style="width:100%;padding:12px">
                                            {{Auth::user()->orders->count()}}
                                        </div>
                                    </div><!--end::Number-->
                                    <!--begin::Label-->
                                    <div class="fw-semibold fs-6 text-gray-400">
                                        Total
                                    </div><!--end::Label-->
                                </div><!--end::Stat-->
    
    
    
     
                         
                            </div><!--end::Stats-->
                        </div><!--end::Wrapper-->
                        <!--begin::Progress-->
             
                    </div><!--end::Stats-->
                </div><!--end::Info-->
            </div><!--end::Details-->
         
        </div>
     
    
    
    
    
    
    
        <div class="d-flex flex-column flex-lg-row mb-17" style="padding-top:50px">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-0 me-lg-20">
                <!--begin::Form-->
     
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Shop URL</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="city" placeholder="" type="text" value="{{'http://'.Auth::user()->subdomain.'.'.config('app.url')}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
    
    
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">First Name</label> <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control form-control-solid"  placeholder="" type="text" value="{{Auth::user()->firstname??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Last Name</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="last_name" placeholder="" type="text" value="{{Auth::user()->lastname??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Email</label> <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control form-control-solid" name="email" placeholder="" value="{{Auth::user()->email}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Mobile No</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="mobileno" placeholder="" type="text" value="{{Auth::user()->phone??'Waiting'}}" disabled> <!--end::Input-->
                        </div><!--end::Col-->
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Tax Number</label> <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control form-control-solid" name="email" placeholder="" value="{{Auth::user()->taxnumber??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Fax No</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="mobileno" placeholder="" type="text" value="{{Auth::user()->fax??'Waiting'}}" disabled> <!--end::Input-->
                        </div><!--end::Col-->
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-semibold mb-2">Postal Code</label> <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control form-control-solid" name="email" placeholder="" value="{{Auth::user()->postalcode??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Country</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="mobileno" placeholder="" type="text" value="{{Auth::user()->country_id?(Auth::user()->getCountryName(Auth::user()->country_id)) : 'Waiting'}}" disabled> <!--end::Input-->
                        </div><!--end::Col-->
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                         
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Address</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="city" placeholder="" type="text" value="{{Auth::user()->address??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Company Website</label> <!--end::Label-->
                             <!--end::Input-->
                             <input class="form-control form-control-solid" name="city" placeholder="" type="text" value="{{Auth::user()->companysite??'Waiting'}}" disabled> <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
                    </div><!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <a class="btn btn-primary" id="kt_account_profile_details_submit" type="submit" href="{{route('shop.profile.create')}}">Update Profile</a>
                    </div>
                     
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
    </div>



    

    <!--end::Container-->
</div>
@endsection