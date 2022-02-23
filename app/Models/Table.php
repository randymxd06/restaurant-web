<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
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
<<<<<<< HEAD
    
=======
        'id' => 'integer',
        'people_capacity' => 'integer',
        'living_room_id' => 'integer',
>>>>>>> 4d16e8e1c5d4f08c71d6a8c891c4c966468f0b63
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

    public function livingRoom()
    {
        return $this->belongsTo(LivingRoom::class);
    }
}
