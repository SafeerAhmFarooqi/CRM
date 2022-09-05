<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;

class ShopProgressController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progresses=Progress::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Progress::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $progresses=$progresses->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.progress-page',[
            'progresses'=>$progresses,
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
            'progress' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'progress' =>'progress',
        ]);

        $progress=Progress::create([
            'progress'=>$request->progress,
        ]);

        if($progress)
        {
            return back()->with('success', 'New progress Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new progress' );
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
            'progress' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'progress' =>'progress',
        ]);

        $progress=(Progress::findOrFail($id))->update(['progress'=>$request->progress]);
        if($progress)
        {
            return back()->with('success', 'progress Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update progress' );
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
                $revokeRow=Progress::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'progress Revoked Successfully' );                   
                } else {
                    $revokeRow=Progress::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'progress Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $progress=Progress::findOrFail($id)->delete();
            if ($progress) {
                return back()->with('success', 'progress Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove progress'); 
            }
            
        }
    }
}
