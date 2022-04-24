<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipesVsIngredients extends Model
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
        'ingredients_id' => 'integer',
        'quantity' => 'integer',
        'unit_measurement_id' => 'integer',
    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function unitMeasurement()
    {
        return $this->belongsTo(UnitMeasurement::class);
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class);
    }

}
