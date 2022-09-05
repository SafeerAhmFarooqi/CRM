<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receive;
use Illuminate\Support\Facades\Auth;

class ShopReceiveController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receives=Receive::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Receive::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $receives=$receives->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.receive-page',[
            'receives'=>$receives,
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
            'receive' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'receive' =>'receive',
        ]);

        $receive=Receive::create([
            'receive'=>$request->receive,
        ]);

        if($receive)
        {
            return back()->with('success', 'New receive Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new receive' );
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
            'receive' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'receive' =>'receive',
        ]);

        $receive=(Receive::findOrFail($id))->update(['receive'=>$request->receive]);
        if($receive)
        {
            return back()->with('success', 'receive Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update receive' );
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
                $revokeRow=Receive::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'receive Revoked Successfully' );                   
                } else {
                    $revokeRow=Receive::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'receive Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $receive=Receive::findOrFail($id)->delete();
            if ($receive) {
                return back()->with('success', 'receive Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove receive'); 
            }
            
        }
    }
}
