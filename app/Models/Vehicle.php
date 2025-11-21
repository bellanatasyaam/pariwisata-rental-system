<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'make', 'model', 'category', 'license_plate', 'daily_rate',
        'status', 'location', 'mileage', 'last_maintenance'
    ];

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
