<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complete;
use Illuminate\Support\Facades\Auth;

class ShopCompleteController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completes=Complete::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Complete::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $completes=$completes->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.complete-page',[
            'completes'=>$completes,
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
            'complete' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'complete' =>'complete',
        ]);

        $complete=Complete::create([
            'complete'=>$request->complete,
        ]);

        if($complete)
        {
            return back()->with('success', 'New complete Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new complete' );
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
            'complete' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'complete' =>'complete',
        ]);

        $complete=(Complete::findOrFail($id))->update(['complete'=>$request->complete]);
        if($complete)
        {
            return back()->with('success', 'complete Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update complete' );
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
                $revokeRow=Complete::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'complete Revoked Successfully' );                   
                } else {
                    $revokeRow=Complete::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'complete Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $complete=Complete::findOrFail($id)->delete();
            if ($complete) {
                return back()->with('success', 'complete Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove complete'); 
            }
            
        }
    }
}
