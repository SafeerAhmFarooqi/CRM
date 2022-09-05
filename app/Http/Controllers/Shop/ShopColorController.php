<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;

class ShopColorController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=Color::where('user_id',0)->where('status',true)->orWhere('user_id',Auth::user()->id)->where('revoke',NULL)->get();
        $revoke=Color::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
        if($revoke)
        {
            foreach ($revoke->revoke as  $id) {
                $colors=$colors->where('id','!=',$id);
            }
        }
        return view('dashboards.shop.color-page',[
            'colors'=>$colors,
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
            'color' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'color' =>'Color',
        ]);

        $color=Color::create([
            'color'=>$request->color,
        ]);

        if($color)
        {
            return back()->with('success', 'New Color Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Color' );
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
            'color' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'color' =>'Color',
        ]);

        $color=(Color::findOrFail($id))->update(['color'=>$request->color]);
        if($color)
        {
            return back()->with('success', 'Color Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update Color' );
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
                $revokeRow=Color::where('user_id',Auth::user()->id)->where('revoke','!=','')->first();
                if ($revokeRow) {
                    $revokeRow->revoke=$id;
                    $revokeRow->save();
                    return back()->with('success', 'Color Revoked Successfully' );                   
                } else {
                    $revokeRow=Color::create([
                        'revoke'=>$id,
                    ]);
                    return back()->with('success', 'Color Revoked Successfully' );
                }
                
                return back();
        }
        if($request->status=='User')
        {
            $color=Color::findOrFail($id)->delete();
            if ($color) {
                return back()->with('success', 'Color Removed Successfully' ); 
            } else {
                return back()->with('error','Unable to Remove Color'); 
            }
            
        }
    }
}
