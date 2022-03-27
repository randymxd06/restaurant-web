<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
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
        'employee_type_id' => 'integer',
        'status' => 'boolean',
        'hire_date' => 'timestamp',
    ];

    public function employeeType()
    {
        return $this->hasOne(EmployeeType::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}
