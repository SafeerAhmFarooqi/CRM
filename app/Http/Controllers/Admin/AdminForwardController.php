<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Forward;

class AdminForwardController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forwards=Forward::where('user_id',0)->get();
        return view('dashboards.admin.forward-page',[
            'forwards'=>$forwards,
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
            'forward' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'forward' =>'forward',
        ]);

        $forward=Forward::create([
            'forward'=>$request->forward,
        ]);

        if($forward)
        {
            return back()->with('success', 'New forward Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new forward' );
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
            'forward' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'forward' =>'forward',
        ]);

        $forward=(Forward::findOrFail($id))->update(['forward'=>$request->forward]);
        if($forward)
        {
            return back()->with('success', 'forward Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update forward' );
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
        if ($request->status=='delete') {
            $forward=Forward::findOrFail($id)->delete();
        } else {
            $forward=(Forward::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($forward)
        {
            return back()->with('success', 'forward Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update forward' );
        }
    }
}
