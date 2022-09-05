<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;

class AdminProgressController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progresses=Progress::where('user_id',0)->get();
        return view('dashboards.admin.progress-page',[
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
        if ($request->status=='delete') {
            $progress=Progress::findOrFail($id)->delete();
        } else {
            $progress=(Progress::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($progress)
        {
            return back()->with('success', 'progress Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update progress' );
        }
    }
}
