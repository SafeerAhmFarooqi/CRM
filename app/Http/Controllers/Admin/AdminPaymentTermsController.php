<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentTerms;

class AdminPaymentTermsController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentTerms=PaymentTerms::where('user_id',0)->get();
        return view('dashboards.admin.payment-term-page',[
            'paymentTerms'=>$paymentTerms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //Validation Rules
            'paymentTerm' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'paymentTerm' =>'paymentTerm',
        ]);

        $paymentTerm=PaymentTerms::create([
            'term'=>$request->paymentTerm,
        ]);

        if($paymentTerm)
        {
            return back()->with('success', 'New Payment Term Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Payment Term' );
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            //Validation Rules
            'paymentTerm' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'paymentTerm' =>'paymentTerm',
        ]);

        $paymentTerm=(PaymentTerms::findOrFail($id))->update(['term'=>$request->paymentTerm]);
        if($paymentTerm)
        {
            return back()->with('success', 'Payment Term Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Payment Term' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->status=='delete') {
            $paymentTerm=PaymentTerms::findOrFail($id)->delete();
        } else {
            $paymentTerm=(PaymentTerms::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($paymentTerm)
        {
            return back()->with('success', 'Payment Term Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Payment Term' );
        }
    }
}
