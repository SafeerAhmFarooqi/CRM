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
                <div class="card-body pt-0" style="padding:0">
                    <!--begin::Table-->
                 
  
 
    
    
  
    <div class="container" style="padding:0">
             <div class="col-lg-4" style="background:#f9f9f9;float:left">
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


            <div class="col-lg-8" style="float:left;padding:20px">
     
                <livewire:order-status-chat :orderId="$order->id" :isUser="0"/> 
        
        
              </div>
        </div>
    </div> 
    
    
   
    
    
    
            </div><!--end::Content-->
        </div><!--end::Table-->
        <!--end::Card body-->
        <!--end::Products-->
     
        <!--end::Container-->
    </div>



    

    <!--end::Container-->
</div>
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