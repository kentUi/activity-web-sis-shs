<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Strand;
class Strands extends Controller
{
    public static function list(){
        $user = session('info');
        $sid = $user['schoolid'];

        $strands = new Strand;
        $response = $strands::where('of_schoolid', $sid)->get();
        return view('pages.strands.list')->with(['response' => $response ]);
    }

    public static function registartion(){
        return view('pages.strands.registration');
    }

    public static function details($id){
        $user = session('info');
        $sid = $user['schoolid'];

        $info = Strand::where('of_id', $id)->where('of_schoolid', $sid)->first();
        return view('pages.strands.edit')->with(['data' => $info]);
    }

    public static function register(Request $request){
        $user = session('info');
        $sid = $user['schoolid'];

        Strand::create([
            'of_schoolid' => $sid,
            'of_strands' => $request->inp_name,
            'of_code' => $request->inp_code,
        ]);

        return redirect('/strand/register?s');
    }

    public static function update(Request $request){
        $user = session('info');
        $sid = $user['schoolid'];

        Strand::where('of_id', $request->inp_id)->update([
            'of_strands' => $request->inp_name,
            'of_code' => $request->inp_code,
        ]);

        return redirect('/strand/details/'.$request->inp_id.'?u');
    }
}
