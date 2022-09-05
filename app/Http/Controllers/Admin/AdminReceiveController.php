<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receive;

class AdminReceiveController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receives=Receive::where('user_id',0)->get();
        return view('dashboards.admin.receive-page',[
            'receives'=>$receives,
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
            'receive' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'receive' =>'receive',
        ]);

        $receive=Receive::create([
            'receive'=>$request->receive,
        ]);

        if($receive)
        {
            return back()->with('success', 'New receive Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new receive' );
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
            'receive' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'receive' =>'receive',
        ]);

        $receive=(Receive::findOrFail($id))->update(['receive'=>$request->receive]);
        if($receive)
        {
            return back()->with('success', 'receive Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update receive' );
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
            $receive=Receive::findOrFail($id)->delete();
        } else {
            $receive=(Receive::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
      
        if($receive)
        {
            return back()->with('success', 'receive Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update receive' );
        }
    }
}
