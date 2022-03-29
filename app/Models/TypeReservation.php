<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeReservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'type_reservations';

    protected $fillable = [
        'id',
        'name',
        'description',
        'created_at',
        'updated_at',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

}
