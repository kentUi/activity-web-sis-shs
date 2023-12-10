<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolled extends Model
{
    use HasFactory;
    protected $table = 't_enrolled';
    protected $fillable = [
        'en_strandid',
        'en_secid',
        'en_studentid',
        'en_sy',
        'en_gradeLevel',
        'en_status'
    ];

}