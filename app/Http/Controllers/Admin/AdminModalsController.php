<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal;
use App\Models\Brands;

class AdminModalsController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modals=Modal::where('user_id',0)->get();
        $brands=Brands::where('user_id',0)->get();
        return view('dashboards.admin.modal-page',[
            'modals'=>$modals,
            'brands'=>$brands,
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
            'modal' => ['required', 'string', 'max:500'],
            'brand' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'modal' =>'modal',
            'brand' =>'Brand',
        ]);

        $modal=Modal::create([
            'modal'=>$request->modal,
            'brand_id'=>$request->brand,
        ]);

        if($modal)
        {
            return back()->with('success', 'New modal Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new modal' );
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
            'modal' => ['required', 'string', 'max:500'],
            'brand' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'modal' =>'modal',
            'brand' =>'Brand',
        ]);

        $modal=(Modal::findOrFail($id))->update([
            'modal'=>$request->modal,
            'brand_id'=>$request->brand,
        ]);
        if($modal)
        {
            return back()->with('success', 'modal Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update modal' );
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
            $modal=Modal::findOrFail($id)->delete();
        } else {
            $modal=(Modal::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($modal)
        {
            return back()->with('success', 'modal Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update modal' );
        }
    }
}
