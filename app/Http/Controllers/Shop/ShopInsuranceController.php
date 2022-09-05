<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insurance;
use Illuminate\Support\Facades\Auth;

class ShopInsuranceController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurances=Insurance::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Insurance::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $insurances=$insurances->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.insurance-page',[
            'insurances'=>$insurances,
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
            'insurance' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'insurance' =>'insurance',
        ]);

        $insurance=Insurance::create([
            'insurance'=>$request->insurance,
        ]);

        if($insurance)
        {
            return back()->with('success', 'New insurance Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new insurance' );
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
            'insurance' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'insurance' =>'insurance',
        ]);

        $insurance=(Insurance::findOrFail($id))->update(['insurance'=>$request->insurance]);
        if($insurance)
        {
            return back()->with('success', 'insurance Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update insurance' );
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
                $revokeRow=Insurance::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'insurance Revoked Successfully' );                   
                } else {
                    $revokeRow=Insurance::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'insurance Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $insurance=Insurance::findOrFail($id)->delete();
            if ($insurance) {
                return back()->with('success', 'insurance Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove insurance'); 
            }
            
        }
    }
}
