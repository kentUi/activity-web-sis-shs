<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
class Auth extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $validator = validator($credentials, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        if (auth()->attempt($credentials)) {
            $user = auth()->user();
    
            session(['info' => [
                'id' => $user->id,
                'id_link' => $user->user_linkid,
                'fname' => $user->user_fname,
                'lname' => $user->user_lname,
                'mobile' => $user->user_mobile,
                'name' => $user->user_lname . ', ' . $user->user_fname,
                'email' => $user->email,
                'schoolid' => $user->user_schoolid,
                'type' => $user->user_type
            ]]);
            return redirect('/user');
        }
    
        return redirect()->back()->withErrors(['email' => 'Invalid Username/Password.']);
    }
    

    public static function register(Request $request){
        User::create([
            'user_linkid' => 0,
            'user_schoolid' => $request->inp_schoolid,
            'user_fname' => $request->inp_fname,
            'user_lname' => $request->inp_lname,
            'user_mobile' => $request->inp_mobile,
            'email' => $request->inp_email,
            'password' => Hash::make($request->inp_password),
            'user_type' => 'ICT'
        ]);
        return redirect('/admin/ict?register&s');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}