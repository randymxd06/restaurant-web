<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'emails';

    protected $fillable = [
        'entity_id',
        'email',
        'status'
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
