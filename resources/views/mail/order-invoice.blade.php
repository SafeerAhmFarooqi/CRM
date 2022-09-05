@extends('layouts.metronic-theme')
@section('body-content')
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
         

 {{-- <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
   <div class="container">
      <div class="row">
        <div class="col text-center">
            <button class="btn btn-primary" onclick="printDiv()" >Invoice Print</button>
            <button class="btn btn-warning">Invoice Send</button>
          </div>
      </div>
    </div>
                
             
    </div> --}}




  
   
    <table cellspacing="15" style="font-family: Helvetica,Arial, Sans-serif;" id="printableArea">
        <tr>
            <td colspan="2" style="vertical-align: text-top;">
                {{-- <fieldset style="min-height:250px;width:850px;border-radius:5px"> --}}
                    <fieldset >
                     <span style="vertical-align: top;font-size: 33px;float: right;">Invoice</span><br>
                    <br>
                    <table>
                        <tr>
                            <td>
                                {{-- <div style="width:100%;height:145px; font-size: 15px; font-style: italic;"> --}}
                                    <div>
                                    {{$order->customer->address}}<br>
                                    Tel. {{$order->customer->landlinenumber}}<br>
                                    Fax. <br>
                                    {{$order->customer->email}}<br>
                                    <br>
                                </div>
                            </td>
                            <td style="vertical-align: text-top;">
                                <div style="padding: 10px;">
                                    <p>template text</p>
                                </div>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: text-top;">
                {{-- <fieldset style="width:400px;min-height:300px;border-radius:5px;"> --}}
                    <fieldset>
                    <legend>Customer Information</legend>
                    <table cellspacing="12">
                        <tr>
                            <td>Name:</td>
                            <td>
                                {{$order->customer->firstname??$order->customer->company}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td>
                                {{$order->customer->address.' '.$order->customer->city}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Post Code:</td>
                            <td>
                                {{$order->customer->postalcode}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>
                                {{$order->customer->address}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Land Line:</td>
                            <td>
                                {{$order->customer->landlinenumber}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile/Handy Number:</td>
                            <td>
                                {{$order->customer->mobilenumber}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>E-Mail:</td>
                            <td>
                                {{$order->customer->email}}
                                <hr>
                            </td>
                        </tr>
                    </table>
                </fieldset>

                <fieldset style="width:400px;min-height:80px;border-radius:5px;margin-top: 15px;">
                    <legend>
                        Costs</legend>
                    <div>
                        <div style="padding: 20px 50px;">
                            <span style="margin-right: 50px;">
                                Subtotal:</span> <span style="float: right;"> &euro;</span>
                        </div>
                        <hr>
                        <div style="padding: 20px 50px;">
                            <span style="margin-right: 50px;">Shipping</span> <span style="float: right;"> &euro;</span>
                        </div>
                        <hr>
                        <div style="padding: 20px 50px;">
                            <span style="margin-right: 50px;">
                                VAT:</span><span style="float: right;"> &euro;</span>
                        </div>
                        <hr>
                        <div style="padding: 20px 50px;">
                            <span style="margin-right: 50px;">
                                Total Price:</span> <span style="float: right;"> &euro;</span>
                        </div>
                    </div>
                </fieldset>
            </td>
            <td style="vertical-align: text-top;">
                <fieldset style="width:400px;border-radius:5px;min-height: 300px;">
                    <legend>Device data and error description</legend>
                    <table>
                        <tr>
                            <td>IMEI:</td>
                            <td>
                                {{$order->imei}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Manufacturer:</td>
                            <td>
                                {{$order->manufacturer}}
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>Model:</td>
                            <td>
                                {{$order->model}}
                                <hr>
                            </td>
                        </tr>
                    </table><br>
                    <u>Error Description
                    </u><br>
                    <div style="padding: 5px;">
                        1. Display Schaden 
                    </div><br>
                    33 [Discount33%] / 33 [Discount33%] / 
                    housing change [Discount4%] / <br>
                    <u>remark</u><br>
                    <p>this is not valid situation</p>
                </fieldset>
                <fieldset style="width:400px;border-radius:5px;margin-top: 15px;">
                    <legend>Payment Method
                    </legend>
                </fieldset>
                <fieldset style="width:400px;min-height:333px;border-radius:5px;margin-top: 15px;">
                    <p>{{$order->invoice->paymentmethod}}</p>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td style="padding: 7px;">
                <p>Bill number
                    : 8</p>
            </td>
            <td>date : 10.08.2022</td>
        </tr>
        <tr>
            <td colspan="2">
                <fieldset style="width:850px;border-radius:5px;">
                    <p>tttttttttttttttttttt</p>
                </fieldset>
            </td>
        </tr>
    </table> 



 


 









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