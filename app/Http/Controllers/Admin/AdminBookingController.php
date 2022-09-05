<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class AdminBookingController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=Booking::where('user_id',0)->get();
        return view('dashboards.admin.booking-page',[
            'bookings'=>$bookings,
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
            'booking' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'booking' =>'booking',
        ]);

        $booking=Booking::create([
            'booking'=>$request->booking,
        ]);

        if($booking)
        {
            return back()->with('success', 'New booking Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new booking' );
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
            'booking' => ['required', 'string', 'max:500'],
          
        ],[
            //Validation Messages
            'required'=>':attribute Name Required',
        ],[
            //Validation Attributes
            'booking' =>'booking',
        ]);

        $booking=(Booking::findOrFail($id))->update(['booking'=>$request->booking]);
        if($booking)
        {
            return back()->with('success', 'booking Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update booking' );
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
            $booking=Booking::findOrFail($id)->delete();
        } else {
            $booking=(Booking::findOrFail($id))->update(['status'=>$request->status=='disable'? false : true]);
        }
        
        if($booking)
        {
            return back()->with('success', 'booking Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to update booking' );
        }
    }
}
