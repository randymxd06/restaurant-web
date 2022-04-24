<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitsMeasurement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredients_stock';

    protected $casts = [
        'id' => 'integer',
    ];

    public function ingredientsStocks()
    {
        return $this->hasMany(IngredientsStock::class);
    }
}
