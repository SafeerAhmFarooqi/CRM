<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accessory;
use Illuminate\Support\Facades\Auth;

class ShopAccessoryController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories=Accessory::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Accessory::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $accessories=$accessories->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.accessory-page',[
            'accessories'=>$accessories,
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
            'accessory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'accessory' =>'Accessory',
        ]);

        $accessory=Accessory::create([
            'accessory'=>$request->accessory,
        ]);

        if($accessory)
        {
            return back()->with('success', 'Accessory Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Accessory' );
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
            'accessory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'accessory' =>'Accessory',
        ]);

        $accessory=(Accessory::findOrFail($id))->update(['accessory'=>$request->accessory]);
        if($accessory)
        {
            return back()->with('success', 'Accessory Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Accessory' );
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
                $revokeRow=Accessory::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Accessory Revoked Successfully' );                   
                } else {
                    $revokeRow=Accessory::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Accessory Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $accessory=Accessory::findOrFail($id)->delete();
            if ($accessory) {
                return back()->with('success', 'Accessory Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Accessory'); 
            }
            
        }
    }
}
