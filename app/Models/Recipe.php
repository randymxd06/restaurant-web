<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recipes';

    protected $fillable = [
        'product_id',
        'name',
        'instructions',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'product_id' => 'integer',
        'status' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
