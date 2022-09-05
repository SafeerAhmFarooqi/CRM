<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpareParts;

class AdminSparePartController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spareParts=SpareParts::where('user_id',0)->get();
        return view('dashboards.admin.spare-parts-page',[
            'spareParts'=>$spareParts,
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
            'sparepart' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'sparepart' =>'Spare Part',
        ]);

        $sparePart=SpareParts::create([
            'part'=>$request->sparepart,
        ]);

        if($sparePart)
        {
            return back()->with('success', 'Spare Part Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Spare Part' );
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
            'sparepart' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'sparepart' =>'Spare Part',
        ]);

        $sparePart=(SpareParts::findOrFail($id))->update(['part'=>$request->sparepart]);
        if($sparePart)
        {
            return back()->with('success', 'Spare Part Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Spare Part' );
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
            $sparePart=SpareParts::findOrFail($id)->delete();
        } else {
            $sparePart=(SpareParts::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
      
        if($sparePart)
        {
            return back()->with('success', 'Spare Part Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Spare Part' );
        }
    }
}
