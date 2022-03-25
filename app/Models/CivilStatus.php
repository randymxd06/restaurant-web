<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CivilStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'civil_status';

    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
