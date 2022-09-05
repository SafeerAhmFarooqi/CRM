<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waiting;

class AdminWaitingController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waitings=Waiting::where('user_id',0)->get();
        return view('dashboards.admin.waiting-page',[
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
        if ($request->status=='delete') {
            $waiting=Waiting::findOrFail($id)->delete();
        } else {
            $waiting=(Waiting::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
     
        if($waiting)
        {
            return back()->with('success', 'waiting Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update waiting' );
        }
    }
}
