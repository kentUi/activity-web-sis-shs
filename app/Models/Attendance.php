<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 't_attendance';
    protected $fillable = [
        'at_studentid', 
        'at_type', 
        'at_month', 
        'at_count'
    ];
}
