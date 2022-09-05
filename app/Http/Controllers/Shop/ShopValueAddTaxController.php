<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ValueAddTax;
use Illuminate\Support\Facades\Auth;

class ShopValueAddTaxController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.shop.value-add-tax-page');
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
            'apply' => ['required'],
            'price_status' => ['required'],
            'designation' => ['required', 'string', 'max:500'],
            'shock_rate' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'apply' => 'Apply Sales Tax Status',
            'price_status' => 'Price Status',
            'designation' => 'Designation',
            'shock_rate' => 'Shock Rate',
        ]);

        $valueTax=ValueAddTax::where('user_id',Auth::user()->id)->first();

        if ($valueTax) {
            $valueTax->update([
            'apply' => $request->apply,
            'price_status' => $request->price_status,
            'designation' => $request->designation,
            'shock_rate' => $request->shock_rate,
            ]);
        } else {
            $valueTax=ValueAddTax::create([
                'apply' => $request->apply,
                'price_status' => $request->price_status,
                'designation' => $request->designation,
                'shock_rate' => $request->shock_rate,
            ]);    
        }
        
        if($valueTax)
        {
            return back()->with('success', 'Value Add Tax Status Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Value Add Tax Status' );
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
        //
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
