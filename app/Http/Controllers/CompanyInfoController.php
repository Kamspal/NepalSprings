<?php

namespace App\Http\Controllers;

use App\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyInfos = CompanyInfo::all();
        return view('companyInfo.index', compact('companyInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companyInfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->request->validate([
            'email' => 'required|email',
            'delivery_title' => 'required|max:255',
            'delivery_message' => 'required|max:255',
            'customer_support_message' => 'required|max:255',
            'primary_contact_number' => 'required|max:255',
            'secondary_contact_number' => 'required|max:255',
            'whatsApp_link' => 'required',
            'viber_link' => 'required'

        ]);
        CompanyInfo::create([
            'email' => $request->email,
            'delivery_title' =>$request->delivery_title,
            'delivery_message' =>$request->delivery_message,
            'customer_support_message' =>$request->customer_suppport_message,
            'primary_number' =>$request->primary_number,
            'secondary_number' =>$request->secondary_number,
            'whatsApp_link' =>$request->whatsApp_link,
            'viber_link' =>$request->viber_link

        ]);

        return redirect('/companyInfo')->with('success', 'Company Details Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyInfo $companyInfo)
    {
        //
    }
}
