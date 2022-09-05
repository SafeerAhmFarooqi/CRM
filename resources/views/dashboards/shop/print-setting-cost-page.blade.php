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
                
                    <input type="hidden" name="_token" value="yQvLHdoQsUNcHydsrcky4KrIaip1EUrsOg7Ni8lm">    
     
     
    
    
     <div class="card-footer d-flex justify-content-end py-6 px-9">
                  <input type="text" placeholder="Order Number">
                         <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">View Order Invoice </button> &nbsp;&nbsp;&nbsp;
                         <button class="btn btn-warning" id="kt_accoprintsettingrepairunt_profile_details_submit" type="submit">Invoice View</button>
                        </div>
    
    
    
        <div class="d-flex flex-column flex-lg-row mb-17" style="padding-top:50px">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid me-0 me-lg-20">
                <!--begin::Form-->
     
                         
    
    
                     
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                         
                     <form action="{{route('shop.printsettingcost.store')}}" method="post">
                        @csrf
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Cost Receipt Header</label> <!--end::Label-->
                             <!--end::Input-->
                             <textarea class="form-control form-control-solid" rows="10" id="tinymce1" name="header">{{old('header')??(Auth::user()->invoiceSetting(2)->header??'')}} </textarea>  
                            <input type="hidden" name="field" value="1">
                             <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
    
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">Save Changes</button>
                        </div>
                     </form>
                        <!--begin::Col-->
                        
    
    
                    </div><!--end::Input group-->
    
    
    
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                         
                     <form action="{{route('shop.printsettingcost.store')}}" method="post">
                        @csrf
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Cost receipt Text General</label> <!--end::Label-->
                             <!--end::Input-->
                             <textarea class="form-control form-control-solid" rows="10" id="tinymce2" name="general"> {{old('general')??(Auth::user()->invoiceSetting(2)->general??'')}}</textarea>  
                             <input type="hidden" name="field" value="2">
                             <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
    
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">Save Changes</button>
                        </div>
                    </form>
                        <!--begin::Col-->
                       
    
    
                    </div><!--end::Input group-->
    
    
    
    
                    <!--begin::Input group-->
                    <div class="row mb-5">
                        <!--begin::Col-->
                         
                     <form action="{{route('shop.printsettingcost.store')}}" method="post">
                        @csrf
                        <div class="col-md-12 fv-row fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="fs-5 fw-semibold mb-2">Cost receipt footer</label> <!--end::Label-->
                             <!--end::Input-->
                             <textarea class="form-control form-control-solid" rows="10" id="tinymce3" name="footer">{{old('footer')??(Auth::user()->invoiceSetting(2)->footer??'')}} </textarea>  
                             <input type="hidden" name="field" value="3">
                             <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div><!--end::Col-->
    
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <button class="btn btn-primary" id="kt_account_profile_details_submit" type="submit">Save Changes</button>
                        </div>
                    </form>
                        <!--begin::Col-->
                       
    
    
                    </div><!--end::Input group-->
                   
     
     
    
    
    
    
    
    
    
    
    
            </div><!--end::Content-->
        </div><!--end::Table-->
        <!--end::Card body-->
        <!--end::Products-->
     
        <!--end::Container-->
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
@endsection

@section('pageScripts')
<script src="{{asset('assets/Metronic-Theme/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<script>
    
    var options1 = {selector: "#tinymce1",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };

                        var options2 = {selector: "#tinymce2",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };

                        var options3 = {selector: "#tinymce3",
//     width: 600,
//   height: 300,
  plugins: [
    'advlist autolink link image lists charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks code fullscreen insertdatetime media nonbreaking',
    'table emoticons template paste help'
  ],
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons | help',
  
  menubar: 'favs file edit view insert format tools table help',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        };
                        
    if (KTApp.isDarkMode()) {
        options1["skin"] = "oxide-dark";
        options1["content_css"] = "dark";
        options2["skin"] = "oxide-dark";
        options2["content_css"] = "dark";
        options3["skin"] = "oxide-dark";
        options3["content_css"] = "dark";
    }
    tinymce.init(options1);
    tinymce.init(options2);
    tinymce.init(options3);
    
    </script>
@endsection