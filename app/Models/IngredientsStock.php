<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngredientsStock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredients_stock';

    protected $fillable = [
        'ingredient_id',
        'quantity',
        'unit_measurement_id',
        'arrival_date',
        'expiration_date',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'ingredient_id' => 'integer',
        'unit_measurement_id' => 'integer',
        'arrival_date' => 'date',
        'expiration_date' => 'date',
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function unitMeasurement()
    {
        return $this->belongsTo(UnitMeasurement::class);
    }


}
