<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;
class Strands extends Controller
{
    public static function list(){
        $strands = new Strand;
        $response = $strands::get();
        return view('pages.strands.list')->with(['response' => $response ]);
    }
}
