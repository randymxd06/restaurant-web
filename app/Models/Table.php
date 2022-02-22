<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'tables';

    protected $fillable = [
        'people_capacity',
        'living_room_id',
        'description',
        'status'
    ];

    protected $casts = [
    
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
