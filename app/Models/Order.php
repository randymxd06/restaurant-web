<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
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

    public function ordersTypes()
    {
        return $this->belongsTo(OrdersType::class);
    }

}
