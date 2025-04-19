<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'address',
        'date',
        'time_in_1',
        'time_out_1',
        'time_in_2',
        'time_out_2',
        'late_time',
        'total',
        'remarks',
        'status',
    ];
}
