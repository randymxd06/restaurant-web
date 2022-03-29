<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
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
        'warehouse_type_id' => 'integer',
    ];

    public function warehouseType()
    {
        return $this->belongsTo(WarehouseType::class);
    }

    public function warehouseType()
    {
        return $this->belongsTo(WarehouseType::class);
    }

    public function ingredientsStocks()
    {
        return $this->hasMany(IngredientsStock::class);
    }

    public function recipesVsIngredients()
    {
        return $this->hasMany(RecipesVsIngredients::class);
    }
}
