<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class Students extends Controller
{
    public static function list()
    {

        $user = session("info");
        $id = $user['id'];
        $students = new Student;
        $stud = $students::where('student_ict_id', $id)->orderBy('student_lname', 'ASC')->get();

        return view('pages.students.list')->with(['response' => $stud]);
    }

    public static function xlist()
    {

        $user = session("info");
        $email = $user["email"];
        $students = new Student;
        $stud = $students::where('student_email', $email)->orderBy('student_lname', 'ASC')->first();

        $subjs = new Subject;
        $response = $subjs::where('subj_strand', $stud)->orderBy('subj_title', 'ASC')->get();

        return view('pages.students.list')->with(['response' => $response]);
    }

    public static function registration()
    {
        $section = new Section;
        $response = $section::orderBy('sec_name', 'ASC')->get();
        return view('pages.students.registration')->with(['response' => $response]);
    }

    public static function details($id)
    {
        $student = new Student;
        $details = $student::where('student_id', $id)->first();

        $section = new Section;
        $response = $section::orderBy('sec_name', 'ASC')->get();
        $sec_name = $section::where('sec_id', $details->student_secid)->first();
        return view('pages.students.edit')->with(['response' => $response, 'details' => $details, 'section_name' => $sec_name]);
    }

    public static function confirmation()
    {
        return view('pages.students.registration');
    }

    public static function register(Request $request)
    {
        $user_info = session('info');

        $data = [
            'student_ict_id' => $user_info['id'],
            'student_secid' => $request->input('inp_section'),
            'student_lrd' => $request->input('inp_lrn'),
            'student_fname' => $request->input('inp_fname'),
            'student_mname' => $request->input('inp_mname'),
            'student_lname' => $request->input('inp_lname'),
            'student_extname' => $request->input('inp_extname'),
            'student_birthdate' => date_format(date_create($request->input('inp_birth')), 'Y-m-d'),
            'student_gender' => $request->input('inp_gender'),
            'student_mobile' => $request->input('inp_mobile'),
            'student_email' => $request->inp_email,
            'student_address' => $request->input('inp_address')
        ];

        $gen_password = substr(uniqid(mt_rand(0, 0)), 8, 15);

        User::create([
            'user_linkid' => $user_info['id'],
            'user_fname' => $request->inp_fname,
            'user_lname' => $request->inp_lname,
            'user_mobile' => $request->inp_mobile,
            'email' => $request->inp_email,
            'password' => Hash::make($gen_password),
            'user_type' => 'student',
            'user_schoolid' => 0
        ]);

        $userEmail = $request->input('inp_email');

        $data_email = [
            'name' => $request->inp_lname,
            'email' => $userEmail,
            'password' => $gen_password
        ];

        Student::create($data);

        Mail::send('layout.email', ["data" => $data_email], function ($message) use ($userEmail) {
            $message->to($userEmail)->subject('[Account Details] You have new message. Please read.');
        });

        return redirect('/students/register?s');
    }

    public static function update(Request $request)
    {
        $id = $request->input('id');

        $data = [
            'student_secid' => $request->input('inp_section'),
            'student_lrd' => $request->input('inp_lrn'),
            'student_fname' => $request->input('inp_fname'),
            'student_mname' => $request->input('inp_mname'),
            'student_lname' => $request->input('inp_lname'),
            'student_extname' => $request->input('inp_extname'),
            'student_birthdate' => date_format(date_create($request->input('inp_birth')), 'Y-m-d'),
            'student_gender' => $request->input('inp_gender'),
            'student_mobile' => $request->input('inp_mobile'),
            'student_email' => $request->inp_email,
            'student_address' => $request->input('inp_address')
        ];

        $user = [
            'user_fname' => $request->inp_fname,
            'user_lname' => $request->inp_lname,
            'user_mobile' => $request->inp_mobile,
            'email' => $request->inp_email
        ];
        
        Student::where('student_email', $request->input('inp_email_org'))->update($data);
        User::where('email', $request->input('inp_email_org'))->update($user);
        
        return redirect('/students/details/' . $id . '?s');
    }


}