<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName', 'lastName', 'mobile', 'city', 'shippingAddress', 'email', 'created_at', 'updated_at',
    ];
    

}
