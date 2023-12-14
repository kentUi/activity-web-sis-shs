<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    use HasFactory;

    protected $table = 't_values';
    protected $fillable = [
        'val_studentid', 
        'val_type',
        'val_quarter', 
        'val_result'
    ];
}
