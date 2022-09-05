<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use App\Models\ProblemCategory;


class AdminProblemController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems=Problem::where('user_id',0)->get();
        $problemCategories=ProblemCategory::where('user_id',0)->get();
        return view('dashboards.admin.problem-page',[
            'problems'=>$problems,
            'problemCategories'=>$problemCategories,
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
            'problem' => ['required', 'string', 'max:500'],
            'category' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'problem' =>'Problem',
            'category' =>'Category',
        ]);

        $problem=Problem::create([
            'problem'=>$request->problem,
            'category_id'=>$request->category,
        ]);

        if($problem)
        {
            return back()->with('success', 'New problem Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new problem' );
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
            'problem' => ['required', 'string', 'max:500'],
            'category' => ['required'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'problem' =>'Problem',
            'category' =>'Category',
        ]);

        $problem=(Problem::findOrFail($id))->update([
            'problem'=>$request->problem,
            'category_id'=>$request->category,
        ]);
        if($problem)
        {
            return back()->with('success', 'problem Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update problem' );
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
            $problem=Problem::findOrFail($id)->delete();
        } else {
            $problem=(Problem::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
       
        if($problem)
        {
            return back()->with('success', 'problem Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update problem' );
        }
    }
}
