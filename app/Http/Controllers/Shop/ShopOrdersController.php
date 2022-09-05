<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;

class ShopOrdersController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Orders::where('user_id',Auth::user()->id)->get();
        return view('dashboards.shop.orders-page',[
            'orders'=>$orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return $id;
    }

    public function chat($id)
    {
        //return $id;
        $order=Orders::findOrFail($id);
        return view('dashboards.shop.order-chat-page',[
            'order'=>$order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->orderId;
        $order=Orders::findOrFail($request->orderId);
        $mail=Mail::to($order->customer->email)->send(new OrderInvoice($request->orderId));
        if($mail)
        {
            return back()->with('success', 'Email send Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to send Email' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboards.shop.order-view-page',[
            'id'=>$id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Orders::findOrFail($id);
        return view('dashboards.shop.view-invoice-page',[
            'order'=>$order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return "safeer";
        //return $request->status;
        //return $id;
        //return var_dump($request->color);
        $order=Orders::findOrFail($id);
        if ($request->status) {
            $order->update(['status'=>$request->status]);
            $order->shop->update(['colorsetting'=>$request->color]);
        } else {
            $order->shop->update(['colorsetting'=>$request->color]);
        }

        if($order)
        {
            return back()->with('success', 'Order Status Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Order Status' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
