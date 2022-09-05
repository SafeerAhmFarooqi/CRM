<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\SliderImages;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ShopProfileController extends BaseShopController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.shop.profile-view-page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboards.shop.profile-update-page',[
            'countries'=>Country::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return "safeer";
       // return $request;

        $request->validate([
            //Validation Rules
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048',
            'firstname' => ['required', 'string', 'max:500'],
            'lastname' => ['required', 'string', 'max:500'],
            'company' => ['required', 'string', 'max:500'],
            'phone' => ['required', 'string', 'max:255'],
            'taxnumber' => ['required', 'string', 'max:255'],
            'fax' => ['max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'country' => ['required'],
            'companysite' => ['max:255'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048',
        ],[
            //Validation Messages
            'required'=>':attribute Required',
        ],[
            //Validation Attributes
            'firstname' =>'First Name',
            'lastname' =>'Last Name',
            'company' => 'Company Name',
            'phone' => 'Contact Number',
            'taxnumber' => 'Tax Number',
            'fax' => 'Fax Number',
            'address' => 'Address',
            'postalcode' => 'Postal Code',
            'country' => 'Country',
            'companysite' => 'Company Website',
            'images' => 'Slider Images',
            'images.*' => 'Slider Images',
        ]);
        //return Auth::user()->id;

        $user=User::where('id',Auth::user()->id)->first();
        $user->firstname=$request->firstname;
        $user->lastname =$request->lastname;
        $user->shopname = $request->company;
        $user->phone = $request->phone;
        $user->taxnumber = $request->taxnumber;
        $user->fax = $request->fax;
        $user->address = $request->address;
        $user->postalcode = $request->postalcode;
        $user->country_id = $request->country;
        $user->companysite = $request->companysite;
        $user->save();

        if($request->file('images'))
        {
            foreach($request->file('images') as $image)
            {
                $image->store('slider-images/'.Auth::user()->id.'/slider-images','public');
                $filePath = 'slider-images/'.Auth::user()->id.'/slider-images'.'/'. $image->hashName();
                $images = new SliderImages(['path' => $filePath]);
                $user->images()->save($images);
            }
        }
        
        if($request->logo)
        {
            if(Auth::user()->logo)
            {
                $oldLogo=Auth::user()->logo;
                Storage::disk('public')->delete($oldLogo);
            }
            $request->logo->store('shop-logos/'.Auth::user()->id.'/logo','public');
            $filePath = 'shop-logos/'.Auth::user()->id.'/logo'.'/'. $request->logo->hashName();
            $user->logo = $filePath;
            $user->save();
        }

        if($request->logo_remove)
        {
            if(Auth::user()->logo)
            {
                $oldLogo=Auth::user()->logo;
                Storage::disk('public')->delete($oldLogo);
                $user->logo = '';
                $user->save();
            }   
        }

        if($user)
        {
            return redirect()->route('shop.profile.index')->with('success', 'Shop Profile Updated Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to Update Shop Profile' );
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
