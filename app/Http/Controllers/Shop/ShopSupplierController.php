<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;

class ShopSupplierController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Supplier::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $suppliers=$suppliers->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.supplier-page',[
            'suppliers'=>$suppliers,
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
            'supplier' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'supplier' =>'supplier',
        ]);

        $supplier=Supplier::create([
            'supplier'=>$request->supplier,
        ]);

        if($supplier)
        {
            return back()->with('success', 'New supplier Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new supplier' );
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
            'supplier' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'supplier' =>'supplier',
        ]);

        $supplier=(Supplier::findOrFail($id))->update(['supplier'=>$request->supplier]);
        if($supplier)
        {
            return back()->with('success', 'supplier Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update supplier' );
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
                $revokeRow=Supplier::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'supplier Revoked Successfully' );                   
                } else {
                    $revokeRow=Supplier::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'supplier Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $supplier=Supplier::findOrFail($id)->delete();
            if ($supplier) {
                return back()->with('success', 'supplier Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove supplier'); 
            }
            
        }
    }
}
