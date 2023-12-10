<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 't_subjects';
    protected $fillable = [
        'subj_title',
        'subj_description',
        'subj_strand',
        'subj_gradelevel'
    ];
}
