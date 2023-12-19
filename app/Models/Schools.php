<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;
    protected $table = 't_schools';
    protected $fillable = [
        'sc_id',
        'sc_name',
        'sc_address',
        'sc_region',
        'sc_principal',
        'sc_pr_rank',
        'sc_logo',
    ];
}
