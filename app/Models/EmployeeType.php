<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeType extends Model
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
        'work_area_id' => 'integer',
        'status' => 'boolean',
    ];

    public function workArea()
    {
        return $this->belongsTo(WorkArea::class);
    }

    public function workArea()
    {
        return $this->belongsTo(WorkArea::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function userType()
    {
        return $this->hasOne(UserType::class);
    }
}
