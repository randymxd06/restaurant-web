<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
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
        'sex_id' => 'integer',
        'civil_status_id' => 'integer',
        'nationality_id' => 'integer',
        'status' => 'boolean',
    ];

    public function sexes()
    {
        return $this->hasMany(Sex::class);
    }

    public function civilStatus()
    {
        return $this->hasMany(CivilStatu::class);
    }

    public function nationalities()
    {
        return $this->hasMany(Nationality::class);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

}
