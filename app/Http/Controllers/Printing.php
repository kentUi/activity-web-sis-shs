<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Printing extends Controller
{
    public static function form9($id){
        return view('print.form9')->with(['id' => $id]);
    }
}
