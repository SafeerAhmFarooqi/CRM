<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Orders;
use App\Models\ServiceInformation;
use App\Models\OrderInvoice;
use App\Models\CostEstimate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class ViewOrder extends Component
{
    public $orderId;
    public $isCompany=false;
    public $updateCustomer=[];
    public $updateDevice=[];
    public $serviceInformation=[];
    public $orderInvoice=[];
    public $costEstimate=[];
    public $technicianNote='';
    public $subTotal=0;

    protected $validationAttributes = [
        'updateCustomer.title' => 'Title',
        'updateCustomer.firstname' => 'First Name',
        'updateCustomer.surname' => 'Surname',
        'updateCustomer.company' => 'Company',
        'updateCustomer.contact1' => 'Company Contact Person 1',
        'updateCustomer.contact2' => 'Company Contact Person 2',
        'updateCustomer.email' => 'Email',
        'updateCustomer.mobilenumber' => 'Mobile Number',
        'updateCustomer.address' => 'Address',
        'updateCustomer.landlinenumber' => 'Land Line Number',
        'updateCustomer.city' => 'City',
        'updateCustomer.postalcode' => 'Postal Code',
        'updateDevice.imei' => 'Imei',
        'updateDevice.serialno' => 'Serial Number',
        'updateDevice.devicepassword' => 'Device Password',
        'updateDevice.model' => 'Model',
        'updateDevice.manufacturer' => 'Manufacturer',
        'updateDevice.storage' => 'Storage',
        'updateDevice.color' => 'Color',
        'updateDevice.offer' => 'Offer',
        'updateDevice.condition' => 'Condition',
        'updateDevice.problem' => 'Problem',
        'serviceInformation.service' => 'Service',
        'serviceInformation.serviceprice' => 'Service Price',
        'serviceInformation.servicediscount' => 'Service Discount',
        'serviceInformation.servicediscounttype' => 'Service Discount Type',
        'serviceInformation.sparepart' => 'Spare Part',
        'serviceInformation.sparepartprice' => 'Spare Part Price',
        'serviceInformation.sparepartnumber' => 'Spare Part Number',
        'serviceInformation.sparepartdiscount' => 'Spare Part Discount',
        'serviceInformation.sparepartdiscounttype' => 'Spare Part Discount Type',
        'orderInvoice.shippingcost' => 'Shipping Cost',
        'orderInvoice.paymentmethod' => 'Payment Method',
        'orderInvoice.paymentreference' => 'Payment Reference',
        'orderInvoice.discount' => 'Discount',
        'orderInvoice.discounttype' => 'Discount Type',
        'orderInvoice.shippingtax' => 'Shipping Tax',
        'orderInvoice.note' => 'Note',
        'costEstimate.originalprice' => 'Original Price',
        'costEstimate.repaircost' => 'Repair Cost',
        'costEstimate.insurancenumber' => 'Insurance Number',
        'costEstimate.customernumber' => 'Customer Number',
        'costEstimate.email' => 'Email',
        'costEstimate.note' => 'Note',
        'costEstimate.errordescription' => 'Error Description',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function customerInformationRules()
    {
        $field1=$this->isCompany?'company' : 'title';
        $field2=$this->isCompany?'contact1' : 'firstname';
        $field3=$this->isCompany?'contact2' : 'surname';
        return [
            'updateCustomer.'.$field1 => ['required', 'string', 'max:100'],
            'updateCustomer.'.$field2 => ['required', 'string', 'max:100'],
            'updateCustomer.'.$field3 => ['required', 'string', 'max:100'],
            'updateCustomer.email'=> ['required', 'email', 'max:80'],
            'updateCustomer.mobilenumber'=> ['required', 'string', 'max:80'],
            'updateCustomer.address'=> ['required', 'string', 'max:80'],
            'updateCustomer.landlinenumber'=> ['required', 'string', 'max:80'],
            'updateCustomer.city'=> ['required', 'string', 'max:80'],
            'updateCustomer.postalcode'=> ['required', 'string', 'max:80'],
        ];
    }

    protected function deviceInformationRules()
    {
        return [
            'updateDevice.imei' => ['required', 'string', 'max:80'],
            'updateDevice.serialno' => ['required', 'string', 'max:80'],
            'updateDevice.devicepassword' => ['required', 'string', 'max:80'],
            'updateDevice.model' => ['required', 'string', 'max:80'],
            'updateDevice.manufacturer' => ['required', 'string', 'max:80'],
            'updateDevice.storage' => ['required', 'string', 'max:80'],
            'updateDevice.color' => ['required', 'string', 'max:80'],
            //'updateDevice.offer' => ['required', 'string', 'max:80'],
            'updateDevice.condition' => ['required', 'string', 'max:80'],
            'updateDevice.problem' => ['required', 'string', 'max:80'],
        ];
    }

    protected function serviceInformationRules()
    {
        return [
            'serviceInformation.service' => ['required', 'string', 'max:80'],
            'serviceInformation.serviceprice' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'max:80'],
            'serviceInformation.servicediscount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'max:80'],
            'serviceInformation.servicediscounttype' => ['required', 'boolean', 'max:80'],
        ];
    }

    protected function sparePartInformationRules()
    {
        return [
            'serviceInformation.sparepart' => ['required', 'string', 'max:80'],
            'serviceInformation.sparepartprice' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'max:80'],
            'serviceInformation.sparepartnumber' => ['required', 'string', 'max:80'],
            'serviceInformation.sparepartdiscount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'max:80'],
            'serviceInformation.sparepartdiscounttype' => ['required', 'boolean', 'max:80'],
        ];
    }

    protected function invoiceRules()
    {
        return [
            'orderInvoice.shippingcost' => ['required', 'string', 'max:80'],
            'orderInvoice.paymentmethod' => ['required', 'string', 'max:80'],
            'orderInvoice.paymentreference' => ['required', 'string', 'max:80'],
            'orderInvoice.discount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/', 'max:80'],
            'orderInvoice.discounttype' => ['required', 'boolean', 'max:80'],
            'orderInvoice.shippingtax' => ['required', 'boolean', 'max:80'],
            'orderInvoice.note' => ['string'],
        ];
    }

    protected function costEstimateRules()
    {
        return [
            'costEstimate.originalprice' => ['required', 'string', 'max:80'],
            'costEstimate.repaircost' => ['required', 'string', 'max:80'],
            'costEstimate.insurancenumber' => ['required', 'string', 'max:80'],
            'costEstimate.customernumber' => ['required', 'string', 'max:80'],
            'costEstimate.email' => ['required', 'email', 'max:80'],
            'costEstimate.note' => [ 'string'],
            'costEstimate.errordescription' => ['required', 'string'],
        ];
    }

    public function getCustomerInfo($order)
    {        
        $this->updateCustomer['title']=$order->customer->title;
        $this->updateCustomer['firstname']=$order->customer->firstname;
        $this->updateCustomer['surname']=$order->customer->surname;
        $this->updateCustomer['company']=$order->customer->company;
        $this->updateCustomer['contact1']=$order->customer->companycontact1;
        $this->updateCustomer['contact2']=$order->customer->companycontact2;
        $this->updateCustomer['email']=$order->customer->email;
        $this->updateCustomer['mobilenumber']=$order->customer->mobilenumber;
        $this->updateCustomer['address']=$order->customer->address;
        $this->updateCustomer['landlinenumber']=$order->customer->landlinenumber;
        $this->updateCustomer['city']=$order->customer->city;
        $this->updateCustomer['postalcode']=$order->customer->postalcode;
    }

    public function getDeviceInfo($order)
    {       
        $this->updateDevice['imei']=$order->imei;
        $this->updateDevice['serialno']=$order->serialno;
        $this->updateDevice['devicepassword']=$order->devicepassword;
        $this->updateDevice['model']=$order->model;
        $this->updateDevice['manufacturer']=$order->manufacturer;
        $this->updateDevice['storage']=$order->storage;
        $this->updateDevice['color']=$order->color;
        $this->updateDevice['offer']=$order->offer;
        $this->updateDevice['condition']=$order->condition;
        $this->updateDevice['problem']=$order->problem;
    }

    public function getInvoiceInfo($order)
    {       
        $this->orderInvoice['shippingcost']=$order->invoice->shippingcost??'';
        $this->orderInvoice['paymentmethod']=$order->invoice->paymentmethod??'';
        $this->orderInvoice['paymentreference']=$order->invoice->paymentreference??'';
        $this->orderInvoice['discount']=$order->invoice->discount??'';
        $this->orderInvoice['discounttype']=$order->invoice->discounttype??'';
        $this->orderInvoice['shippingtax']=$order->invoice->shippingtax??'';
        $this->orderInvoice['note']=$order->invoice->note??'';
    }

    public function updateCustomerInfo()
    {
        $this->validate($this->customerInformationRules());

        $order=Orders::findOrFail($this->orderId);
        $order->customer->update([
            'title'=>$this->updateCustomer['title']??NULL,
            'firstname'=>$this->updateCustomer['firstname']??NULL,
            'surname'=>$this->updateCustomer['surname']??NULL,
            'company'=>$this->updateCustomer['company']??NULL,
            'companycontact1'=>$this->updateCustomer['contact1']??NULL,
            'companycontact2'=>$this->updateCustomer['contact2']??NULL,
            'address'=>$this->updateCustomer['address'],
            'postalcode'=>$this->updateCustomer['postalcode'],
            'city'=>$this->updateCustomer['city'],
            'landlinenumber'=>$this->updateCustomer['landlinenumber'],
            'mobilenumber'=>$this->updateCustomer['mobilenumber'],
            'email'=>$this->updateCustomer['email'],
        ]);

        if($order) {
            Session::flash('success', __('Customer Information Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Updated Customer Information'));
        }
    }

    public function updateDeviceInfo()
    {
        $this->validate($this->deviceInformationRules());

        $order=Orders::findOrFail($this->orderId);
        $order->update([
            'imei'=>$this->updateDevice['imei'],
            'serialno'=>$this->updateDevice['serialno'],
            'devicepassword'=>$this->updateDevice['devicepassword'],
            'model'=>$this->updateDevice['model'],
            'manufacturer'=>$this->updateDevice['manufacturer'],
            'storage'=>$this->updateDevice['storage'],
            'color'=>$this->updateDevice['color'],
            'offer'=>!$this->updateDevice['offer']?NULL :$this->updateDevice['offer'] ,
            'condition'=>$this->updateDevice['condition'],
            'problem'=>$this->updateDevice['problem'],
        ]);

        if($order) {
            Session::flash('success', __('Order Information Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Updated Order Information'));
        }
    }

    public function submitService()
    {
        $this->validate($this->serviceInformationRules());

        $order=Orders::findOrFail($this->orderId);
        $serviceInformation=ServiceInformation::create([
            'order_id' => $order->id,
            'service' => $this->serviceInformation['service'],
            'serviceprice' => $this->serviceInformation['serviceprice'],
            'servicediscount' => $this->serviceInformation['servicediscount'],
            'servicediscounttype' => $this->serviceInformation['servicediscounttype']??false,
        ]);

        if($serviceInformation) {
            Session::flash('success', __('Service Information Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Service Information'));
        }
    }

    public function submitInvoice()
    {
        $this->validate($this->invoiceRules());

        $order=Orders::findOrFail($this->orderId);
        if ($order->invoice) {
            $invoice=$order->invoice->update([
                'order_id' => $order->id,
                'shippingcost' => $this->orderInvoice['shippingcost'],
                'paymentmethod' => $this->orderInvoice['paymentmethod'],
                'paymentreference' => $this->orderInvoice['paymentreference'],
                'discount' => $this->orderInvoice['discount'],
                'discounttype' => $this->orderInvoice['discounttype']??false,
                'shippingtax' => $this->orderInvoice['shippingtax']??false,
                'note' => $this->orderInvoice['note'],
            ]);
        } else {
            $invoice=OrderInvoice::create([
                'order_id' => $order->id,
                'shippingcost' => $this->orderInvoice['shippingcost'],
                'paymentmethod' => $this->orderInvoice['paymentmethod'],
                'paymentreference' => $this->orderInvoice['paymentreference'],
                'discount' => $this->orderInvoice['discount'],
                'discounttype' => $this->orderInvoice['discounttype']??false,
                'shippingtax' => $this->orderInvoice['shippingtax']??false,
                'note' => $this->orderInvoice['note'],
            ]);    
        }

        if($invoice) {
            Session::flash('success', __('Invoice Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Update Invoice'));
        }
    }

    public function submitCostEstimate()
    {
        $this->validate($this->costEstimateRules());

        $order=Orders::findOrFail($this->orderId);
        if ($order->costEstimate) {
            $costEstimate=$order->costEstimate->update([
                'order_id' => $order->id,
                'originalprice' => $this->costEstimate['originalprice'],
                'repaircost' => $this->costEstimate['repaircost'],
                'insurancenumber' => $this->costEstimate['insurancenumber'],
                'customernumber' => $this->costEstimate['customernumber'],
                'email' => $this->costEstimate['email'],
                'note' => $this->costEstimate['note'],
                'errordescription' => $this->costEstimate['errordescription'],
            ]);
        } else {
            $costEstimate=CostEstimate::create([
                'order_id' => $order->id,
                'originalprice' => $this->costEstimate['originalprice'],
                'repaircost' => $this->costEstimate['repaircost'],
                'insurancenumber' => $this->costEstimate['insurancenumber'],
                'customernumber' => $this->costEstimate['customernumber'],
                'email' => $this->costEstimate['email'],
                'note' => $this->costEstimate['note'],
                'errordescription' => $this->costEstimate['errordescription'],
            ]);    
        }

        if($costEstimate) {
            Session::flash('success', __('Cost Estimate Updated Successfully'));
        } else {
            Session::flash('error', __('Unable to Update Cost Estimate'));
        }
    }

    public function submitSparePart()
    {
        $this->validate($this->sparePartInformationRules());

        $order=Orders::findOrFail($this->orderId);
        $serviceInformation=ServiceInformation::create([
            'order_id' => $order->id,
            'sparepart' => $this->serviceInformation['sparepart'],
            'sparepartprice' => $this->serviceInformation['sparepartprice'],
            'sparepartnumber' => $this->serviceInformation['sparepartnumber'],
            'sparepartdiscount' => $this->serviceInformation['sparepartdiscount'],
            'sparepartdiscounttype' => $this->serviceInformation['sparepartdiscounttype']??false,
        ]);

        if($serviceInformation) {
            Session::flash('success', __('Spare Part Information Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Spare Part Information'));
        }
    }

    public function technicianStartTime()
    {
        $order=Orders::findOrFail($this->orderId);
        $order->update([
            'starttime'=> Carbon::now(),
            'technician'=>'Admin',
        ]);
    }

    public function technicianEndTime()
    {
        $order=Orders::findOrFail($this->orderId);
        $order->update([
            'endtime'=> Carbon::now(),
            'techniciannote'=>$this->technicianNote,
        ]);
    }

    public function render()
    {
        $order=Orders::findOrFail($this->orderId);
        $this->isCompany=$order->customer->company==NULL?false : true;
        $this->getCustomerInfo($order);
        $this->getDeviceInfo($order);
        $this->getInvoiceInfo($order);
        return view('livewire.view-order',[
            'order'=>$order,
        ]);
    }
}
