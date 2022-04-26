<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_types';

    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
