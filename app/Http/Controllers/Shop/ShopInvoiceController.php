<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class ShopInvoiceController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=Invoice::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Invoice::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $invoices=$invoices->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.invoice-page',[
            'invoices'=>$invoices,
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
            'invoice' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'invoice' =>'invoice',
        ]);

        $invoice=Invoice::create([
            'invoice'=>$request->invoice,
        ]);

        if($invoice)
        {
            return back()->with('success', 'New invoice Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new invoice' );
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
            'invoice' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'invoice' =>'invoice',
        ]);

        $invoice=(Invoice::findOrFail($id))->update(['invoice'=>$request->invoice]);
        if($invoice)
        {
            return back()->with('success', 'invoice Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update invoice' );
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
        if($request->status=='Admin')
        {
                $revokeRow=Invoice::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'invoice Revoked Successfully' );                   
                } else {
                    $revokeRow=Invoice::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'invoice Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $invoice=Invoice::findOrFail($id)->delete();
            if ($invoice) {
                return back()->with('success', 'invoice Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove invoice'); 
            }
            
        }
    }
}
