<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accessory;

class AdminAccessoryController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories=Accessory::where('user_id',0)->get();
        return view('dashboards.admin.accessory-page',[
            'accessories'=>$accessories,
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
            'accessory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'accessory' =>'Accessory',
        ]);

        $accessory=Accessory::create([
            'accessory'=>$request->accessory,
        ]);

        if($accessory)
        {
            return back()->with('success', 'Accessory Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Accessory' );
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
            'accessory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'accessory' =>'Accessory',
        ]);

        $accessory=(Accessory::findOrFail($id))->update(['accessory'=>$request->accessory]);
        if($accessory)
        {
            return back()->with('success', 'Accessory Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Accessory' );
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
            $accessory=Accessory::findOrFail($id)->delete();
        } else {
            $accessory=(Accessory::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($accessory)
        {
            return back()->with('success', 'Accessory Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Accessory' );
        }
    }
}
