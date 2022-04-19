<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WarehouseType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'warehouse_type';

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'status' => 'boolean'
    ];

}
