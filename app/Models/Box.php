<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{

    use HasFactory, softDeletes;

    protected $table = 'boxes';

    protected $fillable = [
        'start_time',
        'end_time',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
