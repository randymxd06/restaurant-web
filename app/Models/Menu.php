<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'menu';

    protected $casts = [
        'id' => 'integer',
    ];

    public function menuVsProducts()
    {
        return $this->hasMany(MenuVsProduct::class);
    }

}
