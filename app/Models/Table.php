<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tables';

    protected $casts = [
        'id' => 'integer',
        'people_capacity' => 'integer',
        'living_room_id' => 'integer',
        'status' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function livingRoom()
    {
        return $this->belongsTo(LivingRoom::class);
    }

}
