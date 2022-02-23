<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
        'products_categories_id' => 'integer',
        'price' => 'decimal',
        'status' => 'boolean',
    ];

    public function productsCategories()
    {
        return $this->hasMany(ProductsCategory::class);
    }

    public function productsCategories()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}