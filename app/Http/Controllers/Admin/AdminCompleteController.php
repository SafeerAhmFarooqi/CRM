<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complete;

class AdminCompleteController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completes=Complete::where('user_id',0)->get();
        return view('dashboards.admin.complete-page',[
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
        if ($request->status=='delete') {
            $complete=Complete::findOrFail($id)->delete();
        } else {
            $complete=(Complete::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($complete)
        {
            return back()->with('success', 'complete Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update complete' );
        }
    }
}
