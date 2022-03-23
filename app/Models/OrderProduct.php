<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_products';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'discount',
        'total',
        'description'
    ];

    protected $casts = [
        'id' => 'integer',
        'order_id' => 'integer',
        'box_id' => 'integer',
        'customer_id' => 'integer',
        'order_types_id' => 'integer',
        'table_id' => 'integer',
        'total' => 'double',
        'status' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
