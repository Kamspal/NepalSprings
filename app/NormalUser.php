<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalUser extends Model
{
    protected $fillable = ['name', 'email', 'phone_number', 'address', 'password'];
}
