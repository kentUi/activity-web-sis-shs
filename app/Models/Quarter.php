<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    use HasFactory;
    protected $table = 't_quarters';
    protected $fillable = [
        'q_1st',
        'q_2nd',
        'q_3rd',
        'q_4th'
    ];
}
