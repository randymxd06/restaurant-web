<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LivingRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'living_rooms';

    protected $fillable = [
        'name',
        'description',
        'tables_capacity',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'tables_capacity' => 'integer',
        'status' => 'boolean',
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
