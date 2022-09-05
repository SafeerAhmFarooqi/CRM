<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locker;
use Illuminate\Support\Facades\Auth;

class ShopLockerController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lockers=Locker::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Locker::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $lockers=$lockers->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.locker-page',[
            'lockers'=>$lockers,
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
            'locker' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'locker' =>'locker',
        ]);

        $locker=Locker::create([
            'locker'=>$request->locker,
        ]);

        if($locker)
        {
            return back()->with('success', 'New locker Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new locker' );
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
            'locker' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'locker' =>'locker',
        ]);

        $locker=(Locker::findOrFail($id))->update(['locker'=>$request->locker]);
        if($locker)
        {
            return back()->with('success', 'locker Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update locker' );
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
                $revokeRow=Locker::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'locker Revoked Successfully' );                   
                } else {
                    $revokeRow=Locker::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'locker Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $locker=Locker::findOrFail($id)->delete();
            if ($locker) {
                return back()->with('success', 'locker Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove locker'); 
            }
            
        }
    }
}
