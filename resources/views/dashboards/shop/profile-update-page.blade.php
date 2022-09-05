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
            <div aria-controls="kt_account_profile_details" aria-expanded="true" class="card-header border-0 cursor-pointer" data-bs-target="#kt_account_profile_details" data-bs-toggle="collapse" role="button">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Profile Details</h3>
                </div><!--end::Card title-->
            </div><!--begin::Card header-->
            <!--begin::Content-->
            <div class="collapse show" id="kt_account_settings_profile_details">
                <!--begin::Form-->
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="kt_account_profile_details_form"  novalidate="novalidate" method="POST" action="{{route('shop.profile.store')}}" enctype="multipart/form-data">
                   @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Logo</label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{asset('assets/Metronic-Theme/media/svg/avatars/blank.svg')}}')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-300px h-125px" style="background-image: url('{{Auth::user()->logo?asset('storage/'.Auth::user()->logo) : asset('assets/Metronic-Theme/media/svg/avatars/blank.svg')}}')"></div><!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                     <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" data-kt-image-input-action="change" data-kt-initialized="1"><i class="bi bi-pencil-fill fs-7"></i> <!--begin::Inputs-->
                                        <input type="file" name="logo" accept=".png, .jpg, .jpeg, .bmp, .gif, .svg" />
                                        <input type="hidden" name="logo_remove" /> <!--end::Inputs-->
                                        @error('profile_pic')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    
                                    </label> <!--end::Label-->
                                     <!--begin::Cancel-->
                                     <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" data-kt-image-input-action="cancel" data-kt-initialized="1"><i class="bi bi-x fs-2"></i></span> <!--end::Cancel-->
                                     <!--begin::Remove-->
                                     <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-bs-toggle="tooltip" data-kt-image-input-action="remove" data-kt-initialized="1"><i class="bi bi-x fs-2"></i></span> <!--end::Remove-->
                                </div><!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">
                                    Allowed file types: png, jpg, jpeg.
                                </div><!--end::Hint-->
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">First and Last Name</label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="firstname" placeholder="First name" type="text" value="{{old('firstname')??Auth::user()->firstname}}">
                                        @error('firstname')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div><!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <input class="form-control form-control-lg form-control-solid" name="lastname" placeholder="Last name" type="text" value="{{old('lastname')??Auth::user()->lastname}}">
                                        @error('lastname')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div><!--end::Col-->
                                </div><!--end::Row-->
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Subdomain</label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <span class="text-dark text-hover-primary fw-bolder fs-3">{{Auth::user()->subdomain??''}}</span>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Shop/Company Name</label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="company" placeholder="Company name" type="text" value="{{old('company')??Auth::user()->company}}">
                                @error('company')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Contact Phone</span> <i aria-label="Phone number must be active" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="phone" placeholder="Contact Number" type="tel" value="{{old('phone')??Auth::user()->phone}}">
                                @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
    
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Tax Number</span> <i aria-label="Phone number must be active" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="taxnumber" placeholder="Tax Number" type="text" value="{{old('taxnumber')??Auth::user()->taxnumber}}">
                                @error('taxnumber')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
    
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Fax</span> <i aria-label="Phone number must be active" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="fax" placeholder="Fax Number" type="text" value="{{old('fax')??Auth::user()->fax}}">
                                @error('fax')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Address</span> <i aria-label="Phone number must be active" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="address" id="address" placeholder="Shop Address" type="text" value="{{old('address')??Auth::user()->address}}">
                                @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Postal Code</span> <i aria-label="Phone number must be active" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input class="form-control form-control-lg form-control-solid" name="postalcode" placeholder="Postal Code" type="text" value="{{old('postalcode')??Auth::user()->postalcode}}">
                                @error('postalcode')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
    
                 
    
                    
    
    
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                             <label class="col-lg-4 col-form-label fw-semibold fs-6"><span class="required">Country</span> <i aria-label="Country of origination" class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" data-kt-initialized="1"></i></label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select aria-hidden="true" aria-label="Select a Country" class="form-select form-select-solid form-select-lg fw-semibold select2-hidden-accessible" data-control="select2" data-kt-initialized="1" data-placeholder="Select a country..." data-select2-id="select2-data-10-ewc6" name="country" tabindex="-1">
                                    <option data-select2-id="select2-data-12-u8ev" value="">
                                        Select a Country...
                                    </option>
                                  @foreach ($countries as $country)
                                  <option  value="{{$country->id}}" {{Auth::user()->country_id==$country->id? 'selected' : ''}}>
                                    {{$country->country}}
                                </option>
                                  @endforeach
                                </select> 
                                @error('country')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
                 
                     <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Site</label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" name="companysite" placeholder="Company website" type="text" value="{{old('companysite')??Auth::user()->companysite}}">
                                @error('companysite')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
    
                          
    
                         
    
                            <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Slider images </label> <!--end::Label-->
                             <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input class="form-control form-control-lg form-control-solid" name="images[]" placeholder="Company website" type="file" value="keenthemes.com"  multiple>
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                    @if (str_contains($error, 'images'))
                                    <div class="alert alert-danger">
                                        {{$error}}
                                    </div>
                                    @endif   
                                    @endforeach
                                @endif
                            </div><!--end::Col-->
                        </div><!--end::Input group-->
    
    
    
                     
                    </div><!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button class="btn btn-light btn-active-light-primary me-2" type="reset" onclick="history.back()">Back</button> <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">Save Changes</button>
                    </div><!--end::Actions-->
                    <input type="hidden">
                    <div></div>
                </form><!--end::Form-->
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
@section('pageScripts')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAIeDyz_v1KkoU3ZTRqK5e-9Ax1lNjSIEI"></script>
<script type="text/javascript">
    var searchInput = 'address';
    
        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode']
               
            });
        
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var near_place = autocomplete.getPlace();
            });
        });
</script>
@endsection