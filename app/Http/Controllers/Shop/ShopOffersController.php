<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offers;
use Illuminate\Support\Facades\Auth;

class ShopOffersController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offers::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Offers::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $offers=$offers->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.offers-page',[
            'offers'=>$offers,
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
            'offer' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'offer' =>'Offer',
        ]);

        $offer=Offers::create([
            'offer'=>$request->offer,
        ]);

        if($offer)
        {
            return back()->with('success', 'Offer Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Offer' );
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
            'offer' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'offer' =>'Offer',
        ]);
        
        $offer=(Offers::findOrFail($id))->update(['offer'=>$request->offer]);
        if($offer)
        {
            return back()->with('success', 'Offer Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Offer' );
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
        //return $request->status;
        if($request->status=='Admin')
        {
                $revokeRow=Offers::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Offer Revoked Successfully' );                   
                } else {
                    $revokeRow=Offers::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Offer Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $offer=Offers::findOrFail($id)->delete();
            if ($offer) {
                return back()->with('success', 'Offer Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Offer'); 
            }
            
        }
    }
}
