<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waiting;
use Illuminate\Support\Facades\Auth;

class ShopWaitingController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waitings=Waiting::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Waiting::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $waitings=$waitings->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.waiting-page',[
            'waitings'=>$waitings,
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
            'waiting' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'waiting' =>'waiting',
        ]);

        $waiting=Waiting::create([
            'waiting'=>$request->waiting,
        ]);

        if($waiting)
        {
            return back()->with('success', 'New waiting Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new waiting' );
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
            'waiting' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'waiting' =>'waiting',
        ]);

        $waiting=(Waiting::findOrFail($id))->update(['waiting'=>$request->waiting]);
        if($waiting)
        {
            return back()->with('success', 'waiting Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update waiting' );
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
                $revokeRow=Waiting::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'waiting Revoked Successfully' );                   
                } else {
                    $revokeRow=Waiting::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'waiting Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $waiting=Waiting::findOrFail($id)->delete();
            if ($waiting) {
                return back()->with('success', 'waiting Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove waiting'); 
            }
            
        }
    }
}
