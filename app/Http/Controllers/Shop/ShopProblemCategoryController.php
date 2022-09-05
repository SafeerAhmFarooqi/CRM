<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProblemCategory;
use Illuminate\Support\Facades\Auth;

class ShopProblemCategoryController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problemCategories=ProblemCategory::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=ProblemCategory::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $problemCategories=$problemCategories->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.problem-category-page',[
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
            'problemCategory' =>'problemCategory',
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
            'problemCategory' =>'problemCategory',
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
        if($request->status=='Admin')
        {
                $revokeRow=ProblemCategory::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Problem Category Revoked Successfully' );                   
                } else {
                    $revokeRow=ProblemCategory::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Problem Category Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $problemCategory=ProblemCategory::findOrFail($id)->delete();
            if ($problemCategory) {
                return back()->with('success', 'Problem Category Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Problem Category'); 
            }
            
        }
    }
}
