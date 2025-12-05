<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';
    public $incrementing = false; // kalau reservation_id bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'reservation_id',
        'customer_id',
        'vehicle_id',
        'start_date',
        'end_date',
        'status',
    ];

    // RELATION: Reservation belongs to Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // RELATION: Reservation belongs to Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }
}
