<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnDevice;
use Illuminate\Support\Facades\Auth;

class ShopReturnDeviceController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returnDevices=ReturnDevice::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=ReturnDevice::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $returnDevices=$returnDevices->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.return-device-page',[
            'returnDevices'=>$returnDevices,
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
            'returnDevice' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'returnDevice' =>'returnDevice',
        ]);

        $returnDevice=ReturnDevice::create([
            'return'=>$request->returnDevice,
        ]);

        if($returnDevice)
        {
            return back()->with('success', 'New Return Device Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Return Device' );
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
            'returnDevice' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'returnDevice' =>'returnDevice',
        ]);

        $returnDevice=(ReturnDevice::findOrFail($id))->update(['return'=>$request->returnDevice]);
        if($returnDevice)
        {
            return back()->with('success', 'Return Device Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Return Device' );
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
                $revokeRow=ReturnDevice::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Return Device Revoked Successfully' );                   
                } else {
                    $revokeRow=ReturnDevice::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Return Device Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $returnDevice=ReturnDevice::findOrFail($id)->delete();
            if ($returnDevice) {
                return back()->with('success', 'Return Device Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Return Device'); 
            }
            
        }
    }
}
