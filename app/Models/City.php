<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
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
        'provice_id' => 'integer',
        'status' => 'boolean',
    ];

    public function provice()
    {
        return $this->belongsTo(Provice::class);
    }

    public function sectors()
    {
        return $this->hasMany(Sectors::class);
    }

}
