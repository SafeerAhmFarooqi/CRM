<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Auth;

class ShopManufactureController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures=Manufacture::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Manufacture::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $manufactures=$manufactures->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.manufacture-page',[
            'manufactures'=>$manufactures,
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
            'manufacture' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'manufacture' =>'manufacture',
        ]);

        $manufacture=Manufacture::create([
            'manufacture'=>$request->manufacture,
        ]);

        if($manufacture)
        {
            return back()->with('success', 'New manufacture Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new manufacture' );
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
            'manufacture' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'manufacture' =>'manufacture',
        ]);

        $manufacture=(Manufacture::findOrFail($id))->update(['manufacture'=>$request->manufacture]);
        if($manufacture)
        {
            return back()->with('success', 'manufacture Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update manufacture' );
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
                $revokeRow=Manufacture::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'manufacture Revoked Successfully' );                   
                } else {
                    $revokeRow=Manufacture::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'manufacture Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $manufacture=Manufacture::findOrFail($id)->delete();
            if ($manufacture) {
                return back()->with('success', 'manufacture Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove manufacture'); 
            }
            
        }
    }
}
