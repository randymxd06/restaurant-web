<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
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
        'employee_type_id' => 'integer',
        'salary' => 'double',
        'status' => 'boolean',
    ];

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }

    public function employeeType()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}
