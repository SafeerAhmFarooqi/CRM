<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Locker;

class AdminLockerController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lockers=Locker::where('user_id',0)->get();
        return view('dashboards.admin.locker-page',[
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
        if ($request->status=='delete') {
            $locker=Locker::findOrFail($id)->delete();
        } else {
            $locker=(Locker::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($locker)
        {
            return back()->with('success', 'locker Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update locker' );
        }
    }
}
