<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ingredients';

    protected $fillable = [
        'name',
        'description',
        'warehouse_type_id',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'warehouse_type_id' => 'integer',
        'status' => 'boolean',
    ];

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
