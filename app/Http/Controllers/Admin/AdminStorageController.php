<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Storage;

class AdminStorageController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storages=Storage::where('user_id',0)->get();
        return view('dashboards.admin.storage-page',[
            'storages'=>$storages,
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
            'storage' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'storage' =>'storage',
        ]);

        $storage=Storage::create([
            'storage'=>$request->storage,
        ]);

        if($storage)
        {
            return back()->with('success', 'New storage Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new storage' );
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
            'storage' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'storage' =>'storage',
        ]);

        $storage=(Storage::findOrFail($id))->update(['storage'=>$request->storage]);
        if($storage)
        {
            return back()->with('success', 'storage Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update storage' );
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
            $storage=Storage::findOrFail($id)->delete();
        } else {
            $storage=(Storage::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($storage)
        {
            return back()->with('success', 'storage Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update storage' );
        }
    }
}
