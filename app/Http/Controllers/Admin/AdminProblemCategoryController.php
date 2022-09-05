<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemCategory;

class AdminProblemCategoryController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemCategories=ProblemCategory::where('user_id',0)->get();
        return view('dashboards.admin.problem-category-page',[
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
            'problemCategory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'problemCategory' =>'Problem Category',
        ]);

        $problemCategory=ProblemCategory::create([
            'category'=>$request->problemCategory,
        ]);

        if($problemCategory)
        {
            return back()->with('success', 'New Problem Category Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Problem Category' );
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
            'problemCategory' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'problemCategory' =>'Problem Category',
        ]);

        $problemCategory=(ProblemCategory::findOrFail($id))->update(['category'=>$request->problemCategory]);
        if($problemCategory)
        {
            return back()->with('success', 'Problem Category Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Problem Category' );
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
            $problemCategory=ProblemCategory::findOrFail($id)->delete();
        } else {
            $problemCategory=(ProblemCategory::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
       
        if($problemCategory)
        {
            return back()->with('success', 'Problem Category Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Problem Category' );
        }
    }
}
