<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reservations';

    protected $fillable = [
        'customer_id',
        'type_reservations_id',
        'living_room_id',
        'number_people',
        'description',
        'status'
    ];

    protected $casts = [
        'customers_id' => 'integer',
        'type_reservations_id' => 'integer',
        'living_room_id' => 'integer',
        'date_time' => 'timestamp',
        'status' => 'boolean',
    ];

    public function typeReservation()
    {
        return $this->hasOne(TypeReservation::class);
    }

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function typeReservations()
    {
        return $this->belongsTo(TypeReservation::class);
    }

    public function livingRoom()
    {
        return $this->belongsTo(LivingRoom::class);
    }
}
