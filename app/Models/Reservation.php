<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
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
