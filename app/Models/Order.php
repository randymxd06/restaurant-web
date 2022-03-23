<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'box_id',
        'customer_id',
        'order_types_id',
        'table_id',
        'total',
        'status',
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'box_id' => 'integer',
        'customer_id' => 'integer',
        'orders_types_id' => 'integer',
        'table_id' => 'integer',
        'total' => 'decimal',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function box()
    {
        return $this->hasOne(Box::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function orderType()
    {
        return $this->hasOne(OrderType::class);
    }

    public function table()
    {
        return $this->hasOne(Table::class);
    }

    public function order_products(){
        return $this->hasOne(OrderProduct::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function box()
    // {
    //     return $this->belongsTo(Box::class);
    // }

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class);
    // }

    // public function ordersTypes()
    // {
    //     return $this->belongsTo(OrdersType::class);
    // }

    // public function table()
    // {
    //     return $this->belongsTo(Table::class);
    // }
}
