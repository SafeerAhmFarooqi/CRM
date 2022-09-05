<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condition;

class AdminConditionController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions=Condition::where('user_id',0)->get();
        return view('dashboards.admin.condition-page',[
            'conditions'=>$conditions,
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
            'condition' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'condition' =>'condition',
        ]);

        $condition=Condition::create([
            'condition'=>$request->condition,
        ]);

        if($condition)
        {
            return back()->with('success', 'New condition Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new condition' );
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
            'condition' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'condition' =>'condition',
        ]);

        $condition=(Condition::findOrFail($id))->update(['condition'=>$request->condition]);
        if($condition)
        {
            return back()->with('success', 'condition Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update condition' );
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
            $condition=Condition::findOrFail($id)->delete();
        } else {
            $condition=(Condition::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($condition)
        {
            return back()->with('success', 'condition Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update condition' );
        }
    }
}
