<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'products_categories_id',
        'price',
        'status',
        'image'
    ];

    protected $casts = [
        'id' => 'integer',
        'products_categories_id' => 'integer',
        'price' => 'decimal',
        'status' => 'boolean',
    ];

    public function productsCategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

}
