<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rental extends Model
{
    protected $primaryKey = 'rental_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'rental_id',
        'customer_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'base_cost',
        'total_amount',
        'status',
        'pickup_location'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->rental_id) {
                $model->rental_id = 'RENT-' . strtoupper(Str::random(6));
            }
        });
    }
}
