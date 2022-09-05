<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Problem;
use Illuminate\Support\Facades\Auth;
use App\Models\ProblemCategory;

class ShopProblemController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $problems=Problem::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Problem::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $problems=$problems->where('id','!=',$id);
            }
        }
        $problemCategories=ProblemCategory::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=ProblemCategory::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $problemCategories=$problemCategories->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.problem-page',[
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
        if($request->status=='Admin')
        {
                $revokeRow=Problem::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'problem Revoked Successfully' );                   
                } else {
                    $revokeRow=Problem::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'problem Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $problem=Problem::findOrFail($id)->delete();
            if ($problem) {
                return back()->with('success', 'problem Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove problem'); 
            }
            
        }
    }
}
