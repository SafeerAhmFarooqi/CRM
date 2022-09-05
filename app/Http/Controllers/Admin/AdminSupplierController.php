<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class AdminSupplierController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=Supplier::where('user_id',0)->get();
        return view('dashboards.admin.supplier-page',[
            'suppliers'=>$suppliers,
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
            'supplier' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'supplier' =>'supplier',
        ]);

        $supplier=Supplier::create([
            'supplier'=>$request->supplier,
        ]);

        if($supplier)
        {
            return back()->with('success', 'New supplier Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new supplier' );
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
            'supplier' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'supplier' =>'supplier',
        ]);

        $supplier=(Supplier::findOrFail($id))->update(['supplier'=>$request->supplier]);
        if($supplier)
        {
            return back()->with('success', 'supplier Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update supplier' );
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
            $supplier=Supplier::findOrFail($id)->delete();
        } else {
            $supplier=(Supplier::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($supplier)
        {
            return back()->with('success', 'supplier Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update supplier' );
        }
    }
}
