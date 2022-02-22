<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sex extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sexs';

    protected $fillable = [
        'name',
        'symbol',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

}
