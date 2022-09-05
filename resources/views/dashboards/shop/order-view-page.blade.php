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
    <livewire:view-order :orderId="$id"/> 
   
    



    

    <!--end::Container-->
</div>
@endsection

@section('pageScripts')
 <script> 
$(document).ready(function(){
    $("#infopanel").slideToggle();
    $("#updatinfo").click(function(){
    $("#infopanel").slideToggle("slow");
  });
});
</script>

 <script> 
$(document).ready(function(){
    $("#devicepanel").slideToggle();
  $("#updatinfodevice").click(function(){
    $("#devicepanel").slideToggle("slow");
  });
});
</script>
 <script> 
$(document).ready(function(){
  $("#deviceerrorinfo").click(function(){
    $("#deviceerrorpanel").slideToggle("slow");
  });
});
</script>
 <script> 
$(document).ready(function(){
  $("#technican").click(function(){
    $("#techpanel").slideToggle("slow");
  });
});
</script>
@endsection

@section('pageStyles')
<style>
    .heading-box{
  background-color: #007bff;
}
</style>    
@endsection