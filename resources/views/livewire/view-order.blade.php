<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
             @include('common.validation')
            <!--begin::Hero card-->
            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Customer Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0">
                        
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                
                            </div><!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <span class="text-primary">{{$isCompany?'Company' : 'Private'}}</span>                                       
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" href="#">{{$isCompany?$order->customer->company : $order->customer->firstname.' '.$order->customer->surname}}</a>
                                            
                                            <a href="#"><!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                             <span class="svg-icon svg-icon-1 svg-icon-primary" style="font-size:12px !important;">
                                                {{$order->status}}
                                             </span> <!--end::Svg Icon--></a>
                                             
                                        </div>
<!--end::Name-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2" href="#">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                                {{$order->customer->mobilenumber.','.$order->customer->landlinenumber}}
                                            </a>
                
                                                 <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2" href="#"><i class="fa fa-print" aria-hidden="true"></i>
                                                     {{$order->customer->address}}
                                                 </a> 
                                                 <a class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2" href="#"><i class="fa fa-print" aria-hidden="true"></i>
                                                    {{$order->customer->email}}
                                                 </a> 
                
                                                 
                                        </div><!--end::Info-->
                                    </div><!--end::User-->
                                    <!--begin::Actions-->
                
                
                                   
                    <div class="d-flex my-4">
                        <a class="btn btn-sm btn-primary me-2" href="javascript:;" id="updatinfo"> 
                         <span class="indicator-label">Update Customer Information</span> 
                        </a> 
                    </div>
                 
                
                
                
                                </div><!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                     Repairing
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                
                
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                     Repairing
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                
                
                
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                     Repairing
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                
                
                
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                     Repairing
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                
                
                 
                                        </div><!--end::Stats-->
                                    </div><!--end::Wrapper-->
                                 
                                </div><!--end::Stats-->
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                       
                    </div>
                
                
                <!-- update info -->
                <div class="card-body pb-0" id="infopanel"> 
                     
                   <form wire:submit.prevent="updateCustomerInfo" class="form">
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span class="required">{{$isCompany?'Company' : 'Title'}}</span>  </label> <!--end::Label-->
                                 <!--begin::Input-->
                                 <input class="form-control form-control-solid" wire:model.defer="{{$isCompany?'updateCustomer.company' : 'updateCustomer.title'}}" type="text"> 
                                @error($isCompany?'updateCustomer.company' : 'updateCustomer.title')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>{{$isCompany?'Contact Person 1' : 'First Name'}}</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="{{$isCompany?'updateCustomer.contact1' : 'updateCustomer.firstname'}}"> 
                                 @error($isCompany?'updateCustomer.contact1' : 'updateCustomer.firstname')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>{{$isCompany?'Contact Person 2' : 'Surname'}}</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="{{$isCompany?'updateCustomer.contact2' : 'updateCustomer.surname'}}"> 
                                 @error($isCompany?'updateCustomer.contact2' : 'updateCustomer.surname')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>Email</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.email"> 
                                 @error('updateCustomer.email')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>Mobile</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.mobilenumber"> 
                                 @error('updateCustomer.mobilenumber')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>Street</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.address"> 
                                 @error('updateCustomer.address')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>Land Line Number</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.landlinenumber"> 
                                 @error('updateCustomer.landlinenumber')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>City</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.city"> 
                                 @error('updateCustomer.city')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span>Postal Code</span>  </label>  
                                 <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateCustomer.postalcode"> 
                                 @error('updateCustomer.postalcode')
                                 <div class="alert alert-danger" role="alert">
                                     {{$message}}
                                 </div>
                                 @enderror
                                </div><!--end::Input group-->
                        </div><!--end::Col-->
                
                
                    <div class="clearfix"></div>
                    <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                  <button type="submit" class="btn btn-primary">Submit</button> 
                            </div><!--end::Input group-->
                    </div><!--end::Col-->
                
                
                    </div>
                   </form>
                </div> 
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>


            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Device Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                
                            </div><!--end::Pic-->
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" href="#">{{$order->manufacturer.' '.$order->model}} </a>  
                                        </div><!--end::Name-->
                                        <!--begin::Info-->
                                        
                                    </div><!--end::User-->
                                    <!--begin::Actions-->
                
                
                                   
                    <div class="d-flex my-4">
                        <a class="btn btn-sm btn-primary me-2" href="javascript:;" id="updatinfodevice"> 
                         <span class="indicator-label">Update : Device Information</span> 
                        </a> 
                    </div>
                 
                
                
                
                                </div><!--end::Title-->
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            <!--begin::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                      {{$order->status}}
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                           
                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">
                                                   <i class="fa fa-print" aria-hidden="true"></i>
                                                      IMEI : {{$order->imei}}
                                                </div><!--end::Label-->
                                            </div><!--end::Stat-->
                
                
                                       
                
                 
                 
                                        </div><!--end::Stats-->
                                    </div><!--end::Wrapper-->
                                 
                                </div><!--end::Stats-->
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                       
                    </div>
                
                
                <!-- update  deviceinfo -->
                <div class="card-body pb-0" id="devicepanel"> 
                     <form wire:submit.prevent="updateDeviceInfo" class="form">
                        <div class="row">
                
                            <!--begin::Col-->
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span>IMEI</span>  </label>  
                                  <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateDevice.imei"> 
                                  @error('updateDevice.imei')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                                  @enderror
                                </div><!--end::Input group-->
                         </div><!--end::Col-->
                 
                            <!--begin::Col-->
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span>Serial</span>  </label>  
                                  <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateDevice.serialno"> 
                                  @error('updateDevice.serialno')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                                  @enderror
                                </div><!--end::Input group-->
                         </div><!--end::Col-->
                 
                 
                         <!--begin::Col-->
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7 fv-plugins-icon-container">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Device Password</span>  </label> <!--end::Label-->
                                  <!--begin::Input-->
                                  <input class="form-control form-control-solid" name="phone" type="text" wire:model.defer="updateDevice.devicepassword"> 
                                  @error('updateDevice.devicepassword')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                                  @enderror
                                </div><!--end::Input group-->
                         </div><!--end::Col-->
                 
                 
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7 fv-plugins-icon-container">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Model</span>  </label> <!--end::Label-->
                                  <!--begin::Input--> 
                                  <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.model">
                                    <option value="" disabled selected>Select Model</option>
                                    @foreach ($order->shop->getCrmSetting('Modal',$order->shop->id) as $item)
                                    <option {{$order->model==$item->modal?'selected' : ''}}>{{$item->modal}}</option>      
                                    @endforeach
                                </select>
                                @error('updateDevice.model')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                             </div><!--end::Input group-->
                         </div><!--end::Col-->
                 
                 
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7 fv-plugins-icon-container">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Manufacturer</span>  </label> <!--end::Label-->
                                  <!--begin::Input-->
                                  <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.manufacturer">
                                    <option value="" disabled selected>Select Manufacturer</option>
                                    @foreach ($order->shop->getCrmSetting('Manufacture',$order->shop->id) as $item)
                                    <option {{$order->manufacturer==$item->manufacture?'selected' : ''}}>{{$item->manufacture}}</option>      
                                    @endforeach
                                </select>
                                @error('updateDevice.manufacturer')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                             </div><!--end::Input group-->
                         </div><!--end::Col-->
                 
                 
                         <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7 fv-plugins-icon-container">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Storage</span>  </label> <!--end::Label-->
                                  <!--begin::Input-->
                                  <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.storage">
                                    <option value="" disabled selected>Select Storage</option>
                                    @foreach ($order->shop->getCrmSetting('Storage',$order->shop->id) as $item)
                                    <option {{$order->storage==$item->storage?'selected' : ''}}>{{$item->storage}}</option>      
                                    @endforeach
                                </select>
                                @error('updateDevice.storage')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                             </div><!--end::Input group-->
                         </div><!--end::Col-->

                         <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Color</span>  </label> <!--end::Label-->
                                 <!--begin::Input-->
                                 <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.color">
                                   <option value="" disabled selected>Select Color</option>
                                   @foreach ($order->shop->getCrmSetting('Color',$order->shop->id) as $item)
                                   <option {{$order->color==$item->color?'selected' : ''}}>{{$item->color}}</option>      
                                   @endforeach
                               </select>
                               @error('updateDevice.color')
                               <div class="alert alert-danger" role="alert">
                                   {{$message}}
                               </div>
                               @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->

                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Offer</span>  </label> <!--end::Label-->
                                 <!--begin::Input-->
                                 <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.offer">
                                   <option value="" selected>Select Offer</option>
                                   @foreach ($order->shop->getCrmSetting('Offers',$order->shop->id) as $item)
                                   <option {{$order->offer==$item->offer?'selected' : ''}}>{{$item->offer}}</option>      
                                   @endforeach
                               </select>
                               @error('updateDevice.offer')
                               <div class="alert alert-danger" role="alert">
                                   {{$message}}
                               </div>
                               @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->

                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Condition</span>  </label> <!--end::Label-->
                                 <!--begin::Input-->
                                 <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.condition">
                                   <option value="" disabled selected>Select Condition</option>
                                   @foreach ($order->shop->getCrmSetting('Condition',$order->shop->id) as $item)
                                   <option {{$order->condition==$item->condition?'selected' : ''}}>{{$item->condition}}</option>      
                                   @endforeach
                               </select>
                               @error('updateDevice.condition')
                               <div class="alert alert-danger" role="alert">
                                   {{$message}}
                               </div>
                               @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->

                        <div class="col-sm-3">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                <!--begin::Label-->
                                 <label class="fs-6 fw-semibold form-label mt-3"><span class="required">Problem</span>  </label> <!--end::Label-->
                                 <!--begin::Input-->
                                 <select class="form-select form-select-lg form-select-solid" id="sel1" name="modal" wire:model.defer="updateDevice.problem">
                                   <option value="" disabled selected>Select Problem</option>
                                   @foreach ($order->shop->getCrmSetting('Problem',$order->shop->id) as $item)
                                   <option {{$order->problem==$item->problem?'selected' : ''}}>{{$item->problem}}</option>      
                                   @endforeach
                               </select>
                               @error('updateDevice.problem')
                               <div class="alert alert-danger" role="alert">
                                   {{$message}}
                               </div>
                               @enderror
                            </div><!--end::Input group-->
                        </div><!--end::Col-->
                 
                    
                   
                 
                  
                    
                 
                 
                     <div class="clearfix"></div>
                     <div class="col-sm-3">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                 <button type="submit" class="btn btn-primary">Submit</button> 
                             </div><!--end::Input group-->
                     </div><!--end::Col-->
                 
                 
                     </div>
                     </form>
                    
                </div> 
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>

            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Device and Order Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="deviceerrorpanel">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                        
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                             
                                <!--begin::Stats-->
                                 
                
                 
                    <div class="table-responsive">
                        <!--begin::Table-->
                         
                    <table class="table table-hover table-striped table-bordered devicetable">
                        <tbody>
                     
                         
                            <tr>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Order type :</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Customer reference:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Order Ref. No.:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Forward onto:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MODEL : </font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->model}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IMEI : </font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->imei}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Serial No.:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->serialno}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Device password:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->devicepassword}}</font></font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Storage:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->storage}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Color:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->color}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Offerer:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->offer}}</font></font>
                                </td>
                                <td>
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Condition:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->condition}}</font></font>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Accesories:</font></font></h4>
                                    <div>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                    </div>
                                </td>
                                <td colspan="2">
                                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Accessories Serial No.:</font></font></h4>
                                    <div>
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
                                    </div>
                                </td>
                            </tr>
                
                        </tbody>
                    </table>
             
                    </div> 
                
                
                
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                       
                    </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>

            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <!--begin::Hero content-->
                    <div class="alert alert-primary text-black heading-box"> <h3>Device Error Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="deviceerrorpanel">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                        
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                             
                                <!--begin::Stats-->
                                 
                
                 
                    <div class="table-responsive">
                        <!--begin::Table-->
                         
                        <table class="table table-hover table-striped table-bordered devicetable">
                            <tbody>
                    
                                              
                    
                                <tr>
                                    <td  >
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PROBLEM:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->problem}}</font></font>
                                    </td>
                                    <td  >
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Internal note:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->comment}}</font></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DEADLINE DURATION :</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->duration}}</font></font>
                                    </td>
                                    <td>
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Time:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->time}}</font></font>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Price specification:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">€ {{$order->pricedefault}}</font></font>
                                    </td>
                                    <td>
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Warehouse number:</font></font></h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->warehouseno}}</font></font>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Symptoms :</font></font></h4><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></b> <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font> <font style="vertical-align: inherit;">{{$order->problem}}</font></font> 
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
             
                    </div> 
                
                
                
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                       
                    </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>


            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Technician Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="techpanel">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                        
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                             
                                <!--begin::Stats-->
                                 
                
                 
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <div style="display: {{$order->starttime===NULL?'' : 'none'}};">

                            <button class="btn btn-primary" wire:click="technicianStartTime">Start Time</button>
                        </div>
                         <div style="display: {{$order->starttime===NULL||$order->starttime!==NULL&&$order->endtime!==NULL?'none' : ''}};">
                            
                            <div class="form-group" style="margin-top:20px">
                                <label for="comment"> <b> Note </b></label>
                                <textarea class="form-control form-control-solid mb-8" rows="5" id="comment" wire:model.defer="technicianNote"></textarea>
                              </div>
                              <button class="btn btn-primary" wire:click="technicianEndTime">End Time</button>
                         </div>
                    <div class="table table-hover table-striped table-bordered devicetable">
                      
                          
                
                
                         
                
                
                
                <div style="display: {{$order->endtime===NULL?'none' : ''}};">
                    <div class="content table-responsive table-full-width user_contant">
                        <div class="clearfix"></div>
                        <hr>
                        <table class="table table-hover table-striped table-bordered technican">
                            <thead>
                                <tr>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">start time</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">technician</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">end times</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">note</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">time (in minutes)</font></font></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{($order->starttime?$order->starttime->format('d-m-Y / H:i:s') : '')}}</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->technician}}</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{($order->endtime?$order->endtime->format('d-m-Y / H:i:s') : '')}}</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$order->techniciannote}}</font></font></td>
                                    <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{round(abs(strtotime(($order->starttime?$order->starttime->format('d-m-Y / H:i:s') : '')) - strtotime(($order->endtime?$order->endtime->format('d-m-Y / H:i:s') : ''))) / 60,2). " minute"}}</font></font></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
                  
                   
                
                  
                  
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                       
                      </div>
                    </div>
                </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>


            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <!--begin::Hero content-->
                    <div class="alert alert-primary text-black heading-box"> <h3>Service Information</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="techpanel">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                        
                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                             
                                <!--begin::Stats-->
                                 
                
                 
                    <div>
                        <!--begin::Table-->
                         
                    <div>
                      
   
                   
                    <div>
                        <div class="d-flex flex-column flex-lg-row">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid me-0 me-lg-20">
                                <!--begin::Form-->
                                <form wire:submit.prevent="submitService" class="form mb-15">
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Services</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.service" />
                                            @error('serviceInformation.service')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--end::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Price</label>
                                            <!--end::Label-->
                                            <!--end::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.serviceprice" />
                                            @error('serviceInformation.serviceprice')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Discount</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.servicediscount" type="text"/>
                                            @error('serviceInformation.servicediscount')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                       
                                        <!--end::Col-->
                                    </div>

                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2">
                                                <span>Discount Type</span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" wire:click="$set('serviceInformation.servicediscounttype', 1)" name="discounttype" id="allow_reviews_yes" />
                                                    <label class="form-check-label" for="allow_reviews_yes">%</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" wire:click="$set('serviceInformation.servicediscounttype', 0)" name="discounttype" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">€</label>
                                                </div>
                                              
                                                <!--end::Radio-->
                                            </div>
                                            @error('serviceInformation.servicediscounttype')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="separator mb-8"></div>
                                    <!--end::Separator-->
                                    <!--begin::Submit-->
                                    <button type="submit" class="btn btn-primary" >
                                        <!--begin::Indicator-->
                                        Submit
                                        <!--end::Indicator-->
                                    </button>
                                    <!--end::Submit-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Job-->
                                
                                <!--end::Job-->
                            </div>
                            <!--end::Content-->
                            <!--begin::Sidebar-->
                            <div class="flex-lg-row-fluid me-0 me-lg-20">
                                <!--begin::Form-->
                                <form wire:submit.prevent="submitSparePart" class="form mb-15" id="kt_careers_form">
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Spare Part</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.sparepart" />
                                            @error('serviceInformation.sparepart')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--end::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Price</label>
                                            <!--end::Label-->
                                            <!--end::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.sparepartprice" />
                                            @error('serviceInformation.sparepartprice')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-5 fw-bold mb-2">Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.sparepartnumber" />
                                            @error('serviceInformation.sparepartnumber')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <!--end::Label-->
                                            <label class="fs-5 fw-bold mb-2">Discount</label>
                                            <!--end::Label-->
                                            <!--end::Input-->
                                            <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="serviceInformation.sparepartdiscount" />
                                            @error('serviceInformation.sparepartdiscount')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Col-->
                                    </div>

                                    <div class="row fv-row mb-7">
                                        <div class="col-md-3 text-md-end">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold mb-2">
                                                <span>Discount Type</span>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex mt-3">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="radio" value="1" wire:click="$set('serviceInformation.sparepartdiscounttype', 1)" name="discounttype" id="allow_reviews_yes" />
                                                    <label class="form-check-label" for="allow_reviews_yes">%</label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" value="0" wire:click="$set('serviceInformation.sparepartdiscounttype', 0)" name="discounttype" id="allow_reviews_no" />
                                                    <label class="form-check-label" for="allow_reviews_no">€</label>
                                                </div>
                                              
                                                <!--end::Radio-->
                                            </div>
                                            @error('serviceInformation.sparepartdiscounttype')
                                            <div class="alert alert-danger" role="alert">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                    <div class="separator mb-8"></div>
                                    <!--end::Separator-->
                                    <!--begin::Submit-->
                                    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
                                        <!--begin::Indicator-->
                                        <span class="indicator-label">Apply Now</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator-->
                                    </button>
                                    <!--end::Submit-->
                                </form>
                                <!--end::Form-->
                                <!--begin::Job-->
                                
                                <!--end::Job-->
                            </div>


                            
                            <!--end::Sidebar-->
                            
                        </div>
                        <div class="separator"></div>
                       
                    </div>
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                        <!--begin::Navs-->
                        <div>
                            
                        </div>
                      </div>
                    </div>
                </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>
            <div class="card mb-5 mb-xl-8">
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Billing Details</span>
                        <span class="text-muted mt-1 fw-bold fs-7"></span>
                    </h3>
                    
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="ps-4 min-w-300px rounded-start">Date</th>
                                    <th class="min-w-125px">User</th>
                                    <th class="min-w-125px">Description</th>
                                    <th class="min-w-200px">Price</th>
                                    <th class="min-w-150px">Number</th>
                                    <th class="min-w-150px">Sub Total</th>
                                    <th class="min-w-150px">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody>
                                @foreach ($order->serviceInformations as $serviceInformation)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{$serviceInformation->created_at->format('d-m-Y H:i:s')}}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Admin</span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{'['.($serviceInformation->service!==NULL?'Service : ' : 'Spare Part : ').($serviceInformation->service??$serviceInformation->sparepart).']'.'[Discount : '.($serviceInformation->servicediscount??$serviceInformation->sparepartdiscount).($serviceInformation->servicediscounttype?($serviceInformation->servicediscounttype?' %' : ' €') : ($serviceInformation->sparepartdiscounttype?' %' : ' €')).']'}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">€ {{($serviceInformation->serviceprice??$serviceInformation->sparepartprice)}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{($serviceInformation->sparepartnumber??'')}}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">€ 
                                        @php
                                            echo ($serviceInformation->serviceprice?($serviceInformation->servicediscounttype?($serviceInformation->serviceprice-(($serviceInformation->servicediscount/100)*$serviceInformation->serviceprice)) : ($serviceInformation->serviceprice-$serviceInformation->servicediscount)) : ($serviceInformation->sparepartdiscounttype?($serviceInformation->sparepartprice-(($serviceInformation->sparepartdiscount/100)*$serviceInformation->sparepartprice)) : ($serviceInformation->sparepartprice-$serviceInformation->sparepartdiscount)));
                                            $subTotal+=($serviceInformation->serviceprice?($serviceInformation->servicediscounttype?($serviceInformation->serviceprice-(($serviceInformation->servicediscount/100)*$serviceInformation->serviceprice)) : ($serviceInformation->serviceprice-$serviceInformation->servicediscount)) : ($serviceInformation->sparepartdiscounttype?($serviceInformation->sparepartprice-(($serviceInformation->sparepartdiscount/100)*$serviceInformation->sparepartprice)) : ($serviceInformation->sparepartprice-$serviceInformation->sparepartdiscount)));
                                        @endphp
                                        </span>
                                    </td>
                                   
                                    <td>
                                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">View</a>
                                        <a href="#" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                               
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="d-flex justify-content-start flex-column">
                                                <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Sub Total</span>
                                        <span class="text-dark fw-bolder text-hover-primary mb-1 fs-6">€ {{$subTotal}}</span>
                                    </td>
                                   
                                    <td>
                                      
                                    </td>
                                </tr>
                             
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                </div>
                <!--begin::Body-->
            </div>

            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Invoice</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="invoicepanel">
                        <!--begin::Details-->
                        
                <form wire:submit.prevent="submitInvoice" class="form mb-15">
                    <div class="row">
                        <!--begin::Col-->
                         <div class="col-sm-4">
                             <!--begin::Input group-->
                             <div class="fv-row mb-7">
                                 <!--begin::Label-->
                                  <label class="fs-6 fw-semibold form-label mt-3"><span>Shipping costs €</span>  </label>  
                                  <input class="form-control" name="phone" type="text" wire:model.defer="orderInvoice.shippingcost"> 
                                  @error('orderInvoice.shippingcost')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                                  @enderror
                                </div><!--end::Input group-->
                         </div><!--end::Col--> 
             
                     <!--begin::Col-->
                     <div class="col-sm-4">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7 fv-plugins-icon-container">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span class="required">payment method *</span>  </label> <!--end::Label-->
                              <!--begin::Input-->
                                      <select class="form-select" aria-label="Select example" wire:model.defer="orderInvoice.paymentmethod">
                                        <option value="" disabled selected>Select Method</option>
                                        @foreach ($order->shop->getCrmSetting('PaymentTerms',$order->user_id) as $paymentMethod)
                                        <option>{{$paymentMethod->term}} </option>    
                                        @endforeach  
                                     </select>
                                     @error('orderInvoice.paymentmethod')
                                     <div class="alert alert-danger" role="alert">
                                         {{$message}}
                                     </div>
                                     @enderror
                         </div><!--end::Input group-->
                     </div><!--end::Col--> 
                        <!--begin::Col-->
                     <div class="col-sm-4">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span>payment reference</span>  </label>  
                              <input class="form-control" name="phone" type="text" wire:model.defer="orderInvoice.paymentreference"> 
                              @error('orderInvoice.paymentreference')
                              <div class="alert alert-danger" role="alert">
                                  {{$message}}
                              </div>
                              @enderror
                            </div><!--end::Input group-->
                     </div><!--end::Col-->
             
             
                        <!--begin::Col-->
                     <div class="col-sm-4">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span>Discount</span>  </label>  
                              <input class="form-control" name="phone" type="text" wire:model.defer="orderInvoice.discount"> 
                              @error('orderInvoice.discount')
                              <div class="alert alert-danger" role="alert">
                                  {{$message}}
                              </div>
                              @enderror
                         </div><!--end::Input group-->
                     </div><!--end::Col-->
             
                     <div class="col-sm-4">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7 fv-plugins-icon-container">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span class="required">discount type</span>  </label> <!--end::Label-->
                              <!--begin::Input-->
                                      <select class="form-select" aria-label="Select example" wire:model.defer="orderInvoice.discounttype">
                                        <option value="" disabled selected>Select Discount Type</option>
                                          <option value="1">Percentage (%) </option>
                                         <option value="0">Currency (€)</option> 
                                     </select>
                                     @error('orderInvoice.discounttype')
                                     <div class="alert alert-danger" role="alert">
                                         {{$message}}
                                     </div>
                                     @enderror
                         </div><!--end::Input group-->
                     </div><!--end::Col--> 
             
                     <div class="col-sm-4">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7 fv-plugins-icon-container">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span class="required">  tax from shipping
                                 </span>  </label> <!--end::Label-->
                              <!--begin::Input-->
                                      <select class="form-select" aria-label="Select example" wire:model.defer="orderInvoice.shippingtax">
                                        <option value="" disabled selected>Select Tax from Shipping</option>
                                          <option value="1">Yes </option>
                                         <option value="0" selected>No</option> 
                                     </select>
                                     @error('orderInvoice.shippingtax')
                                     <div class="alert alert-danger" role="alert">
                                         {{$message}}
                                     </div>
                                     @enderror
               
                         </div><!--end::Input group-->
                     </div><!--end::Col--> 
             
                         <!--begin::Col-->
                     <div class="col-sm-12">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <!--begin::Label-->
                              <label class="fs-6 fw-semibold form-label mt-3"><span>Note</span>  </label>  
                             <textarea class="form-control" rows="5" id="comment" wire:model.defer="orderInvoice.note"></textarea>
                         </div><!--end::Input group-->
                     </div><!--end::Col--> 
             
                 <div class="clearfix"></div>
                      <div class="col-sm-3">
                         <!--begin::Input group-->
                         <div class="fv-row mb-7">
                             <!--begin::Label-->
                               <button type="submit" class="form-control btn btn-primary">{{$order->invoice?'Update' : 'Create'}}</button>
                         </div><!--end::Input group-->
                      </div><!--end::Col-->
                </form>
                      


                @if ($order->invoice)
                <div class="col-sm-9" style="text-align:right">
                    <a href="{{route('shop.orders.edit',['order'=>$order->id])}}" class="btn btn-primary">Show Invoice</a>
                </div>
                @endif
                      
                
                
                    </div>
                 </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>

            <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <div class="alert alert-primary text-black heading-box"> <h3>Cost Estimate</h3></div>
                    <!--begin::Hero content-->
                    <div class="card-body pt-9 pb-0" id="costpanel">
                        <!--begin::Details-->
                        
                
                        <form wire:submit.prevent="submitCostEstimate" class="form mb-15">
                            <div class="row">
                                <!--begin::Col-->
                                 <div class="col-sm-4">
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7">
                                         <!--begin::Label-->
                                          <label class="fs-6 fw-semibold form-label mt-3"><span>original price</span>  </label>  
                                          <input class="form-control" name="phone" type="text" wire:model.defer="costEstimate.originalprice"> 
                                          @error('costEstimate.originalprice')
                                          <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                          </div>
                                          @enderror
                                        </div><!--end::Input group-->
                                 </div><!--end::Col--> 
                                <!--begin::Col-->
                                 <div class="col-sm-4">
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7">
                                         <!--begin::Label-->
                                          <label class="fs-6 fw-semibold form-label mt-3"><span>repair costs</span>  </label>  
                                          <input class="form-control" name="phone" type="text" wire:model.defer="costEstimate.repaircost"> 
                                          @error('costEstimate.repaircost')
                                          <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                          </div>
                                          @enderror
                                        </div><!--end::Input group-->
                                 </div><!--end::Col--> 
                                <!--begin::Col-->
                                 <div class="col-sm-4">
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7">
                                         <!--begin::Label-->
                                          <label class="fs-6 fw-semibold form-label mt-3"><span>insurance number</span>  </label>  
                                          <input class="form-control" name="phone" type="text" wire:model.defer="costEstimate.insurancenumber"> 
                                          @error('costEstimate.insurancenumber')
                                          <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                          </div>
                                          @enderror
                                        </div><!--end::Input group-->
                                 </div><!--end::Col--> 
                                <!--begin::Col-->
                                 <div class="col-sm-4">
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7">
                                         <!--begin::Label-->
                                          <label class="fs-6 fw-semibold form-label mt-3"><span>customer number</span>  </label>  
                                          <input class="form-control" name="phone" type="text" wire:model.defer="costEstimate.customernumber"> 
                                          @error('costEstimate.customernumber')
                                          <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                          </div>
                                          @enderror
                                        </div><!--end::Input group-->
                                 </div><!--end::Col--> 
                                <!--begin::Col-->
                                 <div class="col-sm-4">
                                     <!--begin::Input group-->
                                     <div class="fv-row mb-7">
                                         <!--begin::Label-->
                                          <label class="fs-6 fw-semibold form-label mt-3"><span>e-mail</span>  </label>  
                                          <input class="form-control" name="phone" type="text" wire:model.defer="costEstimate.email"> 
                                          @error('costEstimate.email')
                                          <div class="alert alert-danger" role="alert">
                                              {{$message}}
                                          </div>
                                          @enderror
                                        </div><!--end::Input group-->
                                 </div><!--end::Col--> 
                                <!--begin::Col-->
                        
                     
                          
                                 <!--begin::Col-->
                             <div class="col-sm-6">
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-7">
                                     <!--begin::Label-->
                                      <label class="fs-6 fw-semibold form-label mt-3"><span>Note</span>  </label>  
                                     <textarea class="form-control" rows="5" id="comment" wire:model.defer="costEstimate.note"></textarea>
                                     @error('costEstimate.note')
                                     <div class="alert alert-danger" role="alert">
                                         {{$message}}
                                     </div>
                                     @enderror
                                    </div><!--end::Input group-->
                             </div><!--end::Col--> 
                          
                                 <!--begin::Col-->
                             <div class="col-sm-6">
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-7">
                                     <!--begin::Label-->
                                      <label class="fs-6 fw-semibold form-label mt-3"><span>Error Description</span>  </label>  
                                     <textarea class="form-control" rows="5" id="comment" wire:model.defer="costEstimate.errordescription"></textarea>
                                     @error('costEstimate.errordescription')
                                     <div class="alert alert-danger" role="alert">
                                         {{$message}}
                                     </div>
                                     @enderror
                                    </div><!--end::Input group-->
                             </div><!--end::Col--> 
                     
                         <div class="clearfix"></div>
                              <div class="col-sm-3">
                                 <!--begin::Input group-->
                                 <div class="fv-row mb-7">
                                     <!--begin::Label-->
                                       <button type="submit" class="form-control btn btn-primary">{{$order->costEstimate?'Update' : 'Create'}}</button> 
                                 </div><!--end::Input group-->
                              </div><!--end::Col-->
                     
                              @if ($order->costEstimate)
                              <div class="col-sm-9" style="text-align:right">
                                <a href="" class="btn btn-success"> View Estimate </a>
                              </div>
                              @endif
                                 
                     
                     
                         </div>
                        </form>
                </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div>

            {{-- <div class="card mb-12">
                <!--begin::Hero body-->
                <div class="card-body flex-column p-5">
                    <!--begin::Hero content-->
                    <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                        <!--begin::Wrapper-->
                       
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Hero content-->
                    <!--begin::Hero nav-->
                    
                    <!--end::Hero nav-->
                </div>
                <!--end::Hero body-->
            </div> --}}







            <!--end::Hero card-->
            <!--begin::Card-->
            
            <!--end::Card-->
            <!--begin::Modal - Support Center - Create Ticket-->
            
            <!--end::Modal - Support Center - Create Ticket-->
        </div>
        <!--end::Container-->
    </div>
</div>

@section('pageStyles')
<style type="text/css">
    fieldset {
   display: block;
   margin-inline-start: 2px;
   margin-inline-end: 2px;
   padding-block-start: 0.35em;
   padding-inline-start: 0.75em;
   padding-inline-end: 0.75em;
   padding-block-end: 0.625em;
   min-inline-size: min-content;
   border-width: 2px;
   border-style: groove;
   border-color: rgb(192, 192, 192);
   border-image: initial;
}

hr{
   margin: 0;
}
table td{
   padding: 10px;
}
  


</style>
@endsection

