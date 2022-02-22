<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'entity_id',
        'customer_type_id'
    ];

    protected $casts = [
        'entity_id' => 'integer',
        'customer_type_id' => 'integer',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function customerType()
    {
        return $this->belongsTo(CustomerType::class);
    }

}
