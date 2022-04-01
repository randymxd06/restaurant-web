<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'entities';

    protected $fillable = [
        'first_name',
        'last_name',
        'identification',
        'sex_id',
        'civil_status_id',
        'nationality_id',
        'status',
        'birth_date',
    ];

    protected $casts = [
        'id' => 'integer',
        'sex_id' => 'integer',
        'civil_status_id' => 'integer',
        'nationality_id' => 'integer',
        'status' => 'boolean',
    ];

    public function sexes()
    {
        return $this->hasMany(Sex::class);
    }

    public function civilStatuses()
    {
        return $this->hasMany(CivilStatus::class);
    }

    public function nationalities()
    {
        return $this->hasMany(Nationality::class);
    }

    public function sex()
    {
        return $this->belongsTo(Sex::class);
    }

    public function civilStatus()
    {
        return $this->belongsTo(CivilStatus::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

}
