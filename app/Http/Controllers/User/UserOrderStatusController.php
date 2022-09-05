<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Orders;

class UserOrderStatusController extends BaseUserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.status-check-login-page');
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
       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $request->validate([
            //Validation Rules
            'code' => ['required', 'string', 'max:40'],
          
        ],[
            //Validation Messages
            'required'=>':attribute is Required',
        ],[
            //Validation Attributes
            'code' =>'Status Code',
        ]);

        $order=Orders::where('statuscode',$request->code)->first();

        if ($order) {
            return view('user.status-check-page',[
                'order'=>$order,
            ]);
        } else {
            return back()->with('error', 'Incorrect Status Code' );
        }
        
       // return Carbon::now()->format('YmdHis').mt_rand('100000000','999999999');
        //return $request->code;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
