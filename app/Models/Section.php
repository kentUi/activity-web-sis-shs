<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 't_sections';

    protected $fillable = [
        'sec_strand',
        'sec_grade',
        'sec_name',
        'sec_description',
        'sec_schoolyear',
        'sec_ict_id',
    ];
}
