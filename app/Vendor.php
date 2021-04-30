<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'client_name', 
        'company_name', 
        'brand_name',
        'vendor_type',
        'designation',
        'email',
        'address', 
        'phone', 
        'is_registered',
        'extra',
        'h1',
        'h2',
        'h3'
    ];
}
