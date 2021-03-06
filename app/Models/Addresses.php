<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model
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
        'id' => 'integer',
        'entity_id' => 'integer',
        'sector_id' => 'integer',
        'status' => 'boolean',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
