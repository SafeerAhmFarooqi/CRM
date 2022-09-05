<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Brands;
use Illuminate\Support\Facades\Auth;

class ShopModalsController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modals=Modal::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Modal::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $modals=$modals->where('id','!=',$id);
            }
        }
        $brands=Brands::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Brands::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $brands=$brands->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.modal-page',[
            'modals'=>$modals,
            'brands'=>$brands,
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
            'modal' => ['required', 'string', 'max:500'],
            'brand' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'modal' =>'modal',
            'brand' =>'Brand',
        ]);

        $modal=Modal::create([
            'modal'=>$request->modal,
            'brand_id'=>$request->brand,
        ]);

        if($modal)
        {
            return back()->with('success', 'New modal Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new modal' );
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
            'modal' => ['required', 'string', 'max:500'],
            'brand' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'modal' =>'modal',
            'brand' =>'Brand',
        ]);

        $modal=(Modal::findOrFail($id))->update([
            'modal'=>$request->modal,
            'brand_id'=>$request->brand,
        ]);
        if($modal)
        {
            return back()->with('success', 'modal Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update modal' );
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
                $revokeRow=Modal::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'modal Revoked Successfully' );                   
                } else {
                    $revokeRow=Modal::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'modal Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $modal=Modal::findOrFail($id)->delete();
            if ($modal) {
                return back()->with('success', 'modal Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove modal'); 
            }
            
        }
    }
}
