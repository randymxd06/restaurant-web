<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
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
        'order_id' => 'integer',
        'payment_method_id' => 'integer',
        'shipping' => 'double',
        'promo' => 'double',
        'taxes' => 'double',
        'discount' => 'double',
        'total' => 'double',
        'status' => 'boolean',
    ];

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
