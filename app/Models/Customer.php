<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'customer_id';
    protected $keyType = 'string';

    public $timestamps = false; 

    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'driver_license',
        'customer_type',
        'registration_date',
        'status',
    ];
}
