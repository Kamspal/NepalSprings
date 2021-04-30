<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    protected $fillable = [
        'email',
    	'delivery_title',
        'delivery_message',
        'customer_support_message',
        'primary_number',
        'secondary_number',
        'whatsApp_link',
        'viber_link'
    ];
}
