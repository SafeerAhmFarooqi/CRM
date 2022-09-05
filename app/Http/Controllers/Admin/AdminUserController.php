<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "Hello";
        $users = User::role('Shop')->get();
        return view('dashboards.admin.all-users-page',['users'=>$users,'srNo'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.admin.create-user-page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id==1) {
            $users = User::role('Shop')
            ->where('status',true)
            ->get();
        return view('dashboards.admin.active-users-page',['users'=>$users,'srNo'=>0]);
        } else {
            $users = User::role('Shop')
            ->where('status',false)
            ->get();
        return view('dashboards.admin.deactive-users-page',['users'=>$users,'srNo'=>0]);
        }
        
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
        if ($request->status=='active') {
            $user=(User::findOrFail($id))->update(['status'=>true]);
            if($user)
            {
                return back()->with('success', 'User Active Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to update user status' );
            }
        } elseif ($request->status=='deactive') {
            $user=(User::findOrFail($id))->update(['status'=>false]);
            if($user)
            {
                return back()->with('success', 'User De-Active Successfully' );
            }
            else
            {
                return back()->with('error', 'Unable to update user status' );
            }
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
            $user=User::findOrFail($id)->delete();
        } else {
            return back();
        }
        if($user)
        {
            return back()->with('success', 'User Deleted Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to delete User' );
        }
    }
}
