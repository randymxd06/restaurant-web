<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngredientsStock extends Model
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

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function unitMeasurement()
    {
        return $this->belongsTo(UnitsMeasurement::class);
    }
}
