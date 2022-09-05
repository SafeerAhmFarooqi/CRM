<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class AdminBrandController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brands::where('user_id',0)->get();
        return view('dashboards.admin.brand-page',[
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
            'brand' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'brand' =>'brand',
        ]);

        $brand=Brands::create([
            'brand'=>$request->brand,
        ]);

        if($brand)
        {
            return back()->with('success', 'New brand Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new brand' );
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
            'brand' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'brand' =>'brand',
        ]);

        $brand=(Brands::findOrFail($id))->update(['brand'=>$request->brand]);
        if($brand)
        {
            return back()->with('success', 'brand Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update brand' );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if ($request->status=='delete') {
            $brand=Brands::findOrFail($id)->delete();
        } else {
            $brand=(Brands::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($brand)
        {
            return back()->with('success', 'brand Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update brand' );
        }
    }
}
