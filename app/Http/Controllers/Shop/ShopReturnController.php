<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Returns;
use Illuminate\Support\Facades\Auth;

class ShopReturnController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns=Returns::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Returns::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $returns=$returns->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.return-page',[
            'returns'=>$returns,
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
            'return' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'return' =>'return',
        ]);

        $return=Returns::create([
            'return'=>$request->return,
        ]);

        if($return)
        {
            return back()->with('success', 'New return Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new return' );
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
            'return' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'return' =>'return',
        ]);

        $return=(Returns::findOrFail($id))->update(['return'=>$request->return]);
        if($return)
        {
            return back()->with('success', 'return Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update return' );
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
                $revokeRow=Returns::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'return Revoked Successfully' );                   
                } else {
                    $revokeRow=Returns::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'return Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $return=Returns::findOrFail($id)->delete();
            if ($return) {
                return back()->with('success', 'return Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove return'); 
            }
            
        }
    }
}
