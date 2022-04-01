<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'phones';

    protected $fillable = [
        'entity_id',
        'phone',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'status' => 'boolean',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

}
