<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 't_grades';
    protected $fillable = [
        'gd_secid', 
        'gd_subjid', 
        'gd_studentid', 
        'gd_quarter', 
        'gd_grade'
    ];
}
