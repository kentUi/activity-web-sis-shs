<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 't_teachers';
    protected $primaryKey = 'tech_id';
    protected $fillable = [
        'tech_ict_id',
        'tech_fname',
        'tech_lname',
        'tech_mname',
        'tech_extname',
        'tech_gender',
        'tech_birthdate',
        'tech_civilStatus',
        'tech_phone',
        'tech_email',
        'tech_address',
    ];
}
