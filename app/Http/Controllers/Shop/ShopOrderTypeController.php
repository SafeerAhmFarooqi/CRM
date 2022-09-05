<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderType;
use Illuminate\Support\Facades\Auth;

class ShopOrderTypeController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderTypes=OrderType::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=OrderType::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $orderTypes=$orderTypes->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.order-type-page',[
            'orderTypes'=>$orderTypes,
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
            'ordertype' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'ordertype' =>'Order Type',
        ]);

        $orderType=OrderType::create([
            'order'=>$request->ordertype,
        ]);

        if($orderType)
        {
            return back()->with('success', 'Order Type Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Order Type' );
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
            'ordertype' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'ordertype' =>'Order Type',
        ]);

        $orderType=(OrderType::findOrFail($id))->update(['order'=>$request->ordertype]);
        if($orderType)
        {
            return back()->with('success', 'Order Type Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Order Type' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if($request->status=='Admin')
        {
                $revokeRow=OrderType::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Order Type Revoked Successfully' );                   
                } else {
                    $revokeRow=OrderType::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Order Type Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $orderType=OrderType::findOrFail($id)->delete();
            if ($orderType) {
                return back()->with('success', 'Order Type Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Order Type'); 
            }
            
        }
    }
}
