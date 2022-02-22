<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'products_categories_id',
        'price',
        'status'
    ];

    protected $casts = [
        'products_categories_id' => 'integer',
        'price' => 'decimal',
        'status' => 'boolean',
    ];

    public function productsCategories()
    {
        return $this->hasMany(ProductsCategory::class);
    }

}
