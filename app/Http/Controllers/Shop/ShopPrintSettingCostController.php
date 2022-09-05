<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvoiceSetting;
use Illuminate\Support\Facades\Auth;

class ShopPrintSettingCostController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.shop.print-setting-cost-page');
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
        if ($request->field==1) {
            $request->validate([
                //Validation Rules
                'header' => ['required'],
              
            ],[
                //Validation Messages
                'required'=>':attribute is Required',
            ],[
                //Validation Attributes
                'header' =>'Header',
            ]);
            if (Auth::user()->invoiceSetting(2)) {
                $invoiceSetting=Auth::user()->invoiceSetting(2)->update([
                    'header'=>$request->header,
                ]);

                if($invoiceSetting)
                {
                    return back()->with('success', 'Header Created Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to create Header' );
                }
            } else {
                $invoiceSetting=InvoiceSetting::create([
                    'header'=>$request->header,
                    'invoicetype'=>2,
                ]);
                if($invoiceSetting)
                {
                    return back()->with('success', 'Header Updated Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to update Header' );
                }
            }
            

        } elseif ($request->field==2) {
            $request->validate([
                //Validation Rules
                'general' => ['required'],
              
            ],[
                //Validation Messages
                'required'=>':attribute is Required',
            ],[
                //Validation Attributes
                'general' =>'General',
            ]);

            if (Auth::user()->invoiceSetting(2)) {
                $invoiceSetting=Auth::user()->invoiceSetting(2)->update([
                    'general'=>$request->general,
                ]);

                if($invoiceSetting)
                {
                    return back()->with('success', 'General Created Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to create General' );
                }
            } else {
                $invoiceSetting=InvoiceSetting::create([
                    'general'=>$request->general,
                    'invoicetype'=>2,
                ]);
                if($invoiceSetting)
                {
                    return back()->with('success', 'General Updated Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to update General' );
                }
            }
        } elseif ($request->field==3) {
            $request->validate([
                //Validation Rules
                'footer' => ['required'],
              
            ],[
                //Validation Messages
                'required'=>':attribute is Required',
            ],[
                //Validation Attributes
                'footer' =>'Footer',
            ]);

            if (Auth::user()->invoiceSetting(2)) {
                $invoiceSetting=Auth::user()->invoiceSetting(2)->update([
                    'footer'=>$request->footer,
                ]);

                if($invoiceSetting)
                {
                    return back()->with('success', 'Footer Created Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to create Footer' );
                }
            } else {
                $invoiceSetting=InvoiceSetting::create([
                    'footer'=>$request->footer,
                    'invoicetype'=>2,
                ]);
                if($invoiceSetting)
                {
                    return back()->with('success', 'Footer Updated Successfully' );
                }
                else
                {
                    return back()->with('error', 'Unable to update Footer' );
                }
            }
        }else {
            return back();
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
