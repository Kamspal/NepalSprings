<?php

namespace App\Http\Controllers;

use App\Vendor;
use DB;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $vendors = $request->all();

        //return $vendors;
        
        // $this->validate($request,[
        //     'client_name' => 'required',
        //     'company_name' => 'required',
        //     'brand_name' => 'required',
        //     'vendor_type' => 'required',
        //     'designation' => 'required',
        //     'email' => 'required:unique',
        //     'address' => 'required',
        //     'phone' => 'string|max:10',
        //     'is_registered' => 'boolean',
        // ]);

        Vendor::create([
            'client_name' =>$request->client_name,
            'company_name' =>$request->company_name,
            'brand_name' =>$request->brand_name,
            'vendor_type' =>$request->vendor_type,
            'designation' =>$request->designation,
            'email' =>$request->email,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'is_registered' =>$request->is_registered
        ]);

        
        $vendor[]=[

            'client_name' =>$request->client_name,
            'company_name' =>$request->company_name,
            'brand_name' =>$request->brand_name,
            'vendor_type' =>$request->vendor_type,
            'designation' =>$request->designation,
            'email' =>$request->email,
            'address' =>$request->address,
            'phone' =>$request->phone,
            'is_registered' =>$request->is_registered

        ];
        $vendor_id=DB::table('vendors')->latest('id')->first();

        $email=$request->email;
        $owner_email='sangroula2@gmail.com';
        $to = [['email' => $email],['email' => $owner_email]];
        Mail::send('client_emails.vendor_details', ['vendor' => $vendor,'vendor_id'=>$vendor_id], function ($message) use ($email) {
            $message->subject('New Vendor Details');
            $message->from('info@rasanmart.nepyantra.com');
            $message->cc('sangroula2@gmail.com');
            $message->to($email);
           
         });

        return redirect('/connect-vendors')->with('flash_message_success','Vendor profile Created Successful');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}
