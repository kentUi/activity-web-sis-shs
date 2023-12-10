<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $table = 't_students';

    protected $fillable = [
        'student_secid',
        'student_lrd',
        'student_fname',
        'student_mname',
        'student_lname',
        'student_extname',
        'student_birthdate',
        'student_gender',
        'student_mobile',
        'student_email',
        'student_address',
        'student_ict_id',
    ];
}
