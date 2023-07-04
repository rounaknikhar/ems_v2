<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClockIn extends Model
{
    use HasFactory;

    protected $table = 'clock_in';

    protected $fillable = [
        'employeeId',
        'regEntry',
        'regExit'
    ];
}