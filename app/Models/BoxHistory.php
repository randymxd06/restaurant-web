<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoxHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'boxes_history';

    protected $fillable = [
        'box_id',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'id' => 'integer',
        'box_id' => 'integer',
    ];

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

}
