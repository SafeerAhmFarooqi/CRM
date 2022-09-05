<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offers;

class AdminOffersController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offers::where('user_id',0)->get();
        return view('dashboards.admin.offers-page',[
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
        return "safeer";
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
        if ($request->status=='delete') {
            $offer=Offers::findOrFail($id)->delete();
        } else {
            $offer=(Offers::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($offer)
        {
            return back()->with('success', 'Offer Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Offer' );
        }
    }
}
