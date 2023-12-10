<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assigned extends Model
{
    use HasFactory;
    protected $table = 't_assign';
    protected $fillable = [
        'ass_teacherid',
        'ass_secid',
        'ass_subjid',
        'ass_quarter',
        'ass_type'
    ];

}