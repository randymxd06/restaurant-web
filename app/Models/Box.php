<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $table = 'boxes';

    protected $fillable = [
        'user_id',
        'device_use',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function box_history(){
        return $this->hasMany(BoxHistory::class);
    }

}
