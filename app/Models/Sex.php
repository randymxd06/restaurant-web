<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sex extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sexs';

    protected $casts = [
        'id' => 'integer',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
