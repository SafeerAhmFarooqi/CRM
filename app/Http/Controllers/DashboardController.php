<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Orders;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use function Ramsey\Uuid\v1;

class DashboardController extends BaseController
{

   public function dashboard()
   {
      if (Auth::user()->hasRole('Admin')) {
         return view('dashboards.admin.dashboard');         
      } elseif(Auth::user()->hasRole('Shop')) {
         $orders=Orders::where('user_id',Auth::user()->id)->get();
         return view('dashboards.shop.dashboard',[
            'orders'=>$orders,
         ]);         
      }
      
      return redirect('/');
   }

   public function shopLanding($userName=null)
   {
         $shop=User::where('subdomain',$userName)->first();
         if ($shop) {
            return view('user.shop-landing',[
               'shop'=>$shop,
            ]);
         } else {
            return back();
         }
         
   }

   public function placeOrderView($userName=null)
   {
         $shop=User::where('subdomain',$userName)->first();

         if ($shop) {
            return view('user.place-order-page',[
               'shop'=>$shop,
            ]);
         } else {
            return back();
         }
         
   }

   public function placeOrderStore(Request $request,$userName)
   {
      //return dd($request);
      $request->validate([
         //Validation Rules
         'category' => ['required'],
         'title' => ['required', 'string', 'max:500'],
         'firstname' => ['required', 'string', 'max:500'],
         'surname' => ['required', 'string', 'max:500'],
         'address' => ['required', 'string', 'max:500'],
         'postalcode' => ['required', 'string', 'max:500'],
         'city' => ['required', 'string', 'max:500'],
         'landlinenumber' => ['string', 'max:500'],
         'mobilenumber' => ['required', 'string', 'max:500'],
         'email' => ['required', 'string', 'max:500'],
         'manufacturer' => ['required', 'string', 'max:500'],
         'modal' => ['required', 'string', 'max:500'],
         'imei' => ['required', 'string', 'max:500'],
         'serialnumber' => ['required', 'string', 'max:500'],
         'devicepassword' => ['required', 'string', 'max:500'],
         'storage' => ['required', 'string', 'max:500'],
         'color' => ['required', 'string', 'max:500'],
         'offer' => ['string', 'max:500'],
         'condition' => ['required', 'string', 'max:500'],
         'problem' => ['required', 'string', 'max:500'],
         'comment' => ['required', 'string', 'max:500'],
         'duration' => ['required', 'string', 'max:500'],
         'time' => ['required', 'string', 'max:500'],
         'pricedefaultmin' => ['required', 'string', 'max:500'],
         'pricedefaultmax' => ['required', 'string', 'max:500'],
         'warehousenumber' => ['required', 'string', 'max:500'],
         'approval' => ['required', 'string', 'max:500'],
         'paymentmethod' => ['required', 'string', 'max:500'],
       
     ],[
         //Validation Messages
         'required'=>':attribute Required',
     ],[
         //Validation Attributes
         'category' => 'Category',
         'title' => 'Title',
         'firstname' => 'First Name',
         'surname' => 'Surname',
         'address' => 'Address',
         'postalcode' => 'Postal Code',
         'city' => 'City',
         'landlinenumber' => 'Land Line Number',
         'mobilenumber' => 'Mobile Number',
         'email' => 'Email',
         'manufacturer' => 'Manufacturer',
         'modal' => 'Modal',
         'imei' => 'Imei',
         'serialnumber' => 'Serial Number',
         'devicepassword' => 'Device Password',
         'storage' => 'Storage',
         'color' => 'Color',
         'offer' => 'Offer',
         'condition' => 'Condition',
         'problem' => 'Problem',
         'comment' => 'Comment',
         'duration' => 'Duration',
         'time' => 'Time',
         'pricedefaultmin' => 'Minimum Default Price',
         'pricedefaultmax' => 'Maximum Default Price',
         'warehousenumber' => 'Ware House Number',
         'approval' => 'Approval',
         'paymentmethod' => 'Payment Method',
     ]);

         $shop=User::where('subdomain',$userName)->first();

         if ($shop) {
            $customer=Customer::create([
               'title' => $request->categorystatus=='Private'?$request->title : NULL,
               'firstname' => $request->categorystatus=='Private'?$request->firstname : NULL,
               'surname' => $request->categorystatus=='Private'?$request->surname : NULL,
               'company' => $request->categorystatus=='Company'?$request->title : NULL,
               'companycontact1' => $request->categorystatus=='Company'?$request->firstname : NULL,
               'companycontact2' => $request->categorystatus=='Company'?$request->surname : NULL,
               'address' => $request->address,
               'postalcode' => $request->postalcode,
               'city' => $request->city,
               'landlinenumber' => $request->landlinenumber,
               'mobilenumber' => $request->mobilenumber,
               'email' => $request->email,
               'category' => $request->category,
           ]);

           $order=Orders::create([
            'customer_id' => $customer->id  ,
            'user_id' => $shop->id  ,
            'manufacturer' => $request->manufacturer  ,
            'model' => $request->modal  ,
            'imei' => $request-> imei ,
            'serialno' => $request->serialnumber  ,
            'devicepassword' => $request->devicepassword  ,
            'storage' => $request-> storage ,
            'color' => $request-> color , 
            'offer' => $request-> offer ,
            'condition' => $request->  condition,
            'problem' => $request-> problem ,
            'comment' => $request->  comment,
            'duration' => $request->  duration,
            'time' => $request-> time ,
            'pricedefault' => $request-> pricedefaultmin. ' - '.$request-> pricedefaultmax ,
            'warehouseno' => $request->  warehousenumber,
            'approval' => $request->  approval,
            'paymentmethod' => $request->  paymentmethod,
            'status'=>'Received : Shop',
        ]);

        while(true)
        {
         $statusCode=Carbon::now()->format('YmdHis').mt_rand('100000000','999999999');
         if (Orders::where('statuscode',$statusCode)->first()) {
            continue;
         } else {
            $order->statuscode=$statusCode;
            $order->save();
            break;
         }    
        }

        if($order)
        {
            return redirect()->route('place.order.mobile.repair.complete',['statusCode'=>$order->statuscode])->with('success', 'Order Created Successfully with status code = '.$order->statuscode );
        }
        else
        {
            return back()->with('error', 'Unable to create Order' );
        }
            

         } else {
            return back();
         }
         
   }

   public function placeOrderViewComplete($statusCode)
   {
      return view('order-complete-page',[
         'statusCode'=>$statusCode,
      ]);
   }
}