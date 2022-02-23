<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
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
        'entity_id' => 'integer',
        'customer_type_id' => 'integer',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

    public function customerType()
    {
        return $this->hasOne(CustomerType::class);
    }
}
