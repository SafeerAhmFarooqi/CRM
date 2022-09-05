<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpareParts;
use Illuminate\Support\Facades\Auth;

class ShopSparePartController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spareParts=SpareParts::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=SpareParts::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $spareParts=$spareParts->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.spare-parts-page',[
            'spareParts'=>$spareParts,
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
            'sparepart' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'sparepart' =>'Spare Part',
        ]);

        $sparePart=SpareParts::create([
            'part'=>$request->sparepart,
        ]);

        if($sparePart)
        {
            return back()->with('success', 'Spare Part Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Spare Part' );
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
            'sparepart' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'sparepart' =>'Spare Part',
        ]);

        $sparePart=(SpareParts::findOrFail($id))->update(['part'=>$request->sparepart]);
        if($sparePart)
        {
            return back()->with('success', 'Spare Part Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Spare Part' );
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
                $revokeRow=SpareParts::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Spare Part Revoked Successfully' );                   
                } else {
                    $revokeRow=SpareParts::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Spare Part Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $sparePart=SpareParts::findOrFail($id)->delete();
            if ($sparePart) {
                return back()->with('success', 'Spare Part Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Spare Part'); 
            }
            
        }
    }
}
