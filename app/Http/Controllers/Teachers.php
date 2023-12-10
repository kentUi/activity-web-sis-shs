<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Assigned;
use App\Models\Enrolled;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Subject;

use Illuminate\Support\Facades\Mail;

class Teachers extends Controller
{
    public static function list()
    {
        $user = session('info');
        $id = $user['id'];
        $teachers = new Teacher;
        $response = $teachers::where('tech_ict_id', $id)->orderBy('tech_lname', 'ASC')->get();

        return view('pages.teachers.list')->with(['response' => $response]);
    }

    public static function registration()
    {
        return view('pages.teachers.registration');
    }

    public static function details($id)
    {
        $teachers = new Teacher;
        $teacher = $teachers::where('tech_id', $id)->first();

        $advisory = Assigned::join('t_sections', 'sec_id', 'ass_secid')
            ->where('ass_teacherid', $id)
            ->where('ass_type', 'advisory')
            ->get();

        $assign_subject = Assigned::join('t_subjects', 'subj_id', 'ass_subjid')
            ->join('t_sections', 'sec_id', 'ass_secid')
            ->where('ass_teacherid', $id)
            ->where('ass_type', 'subject')
            ->get();

        return view('pages.teachers.details')->with(['personal_info' => $teacher, 'advisory' => $advisory, 'assign_subject' => $assign_subject]);
    }

    public static function confirmation()
    {
        return view('pages.teachers.registration');
    }

    public static function import()
    {
        return view('pages.teachers.import');
    }

    public static function register(Request $request)
    {
        $user_info = session('info');

        $data = [
            'tech_ict_id' => $user_info['id'],
            'tech_fname' => $request->inp_fname,
            'tech_mname' => $request->inp_mname,
            'tech_lname' => $request->inp_lname,
            'tech_extname' => $request->inp_extname,
            'tech_birthdate' => date_format(date_create($request->inp_birth), 'Y-m-d'),
            'tech_civilStatus' => $request->inp_civil,
            'tech_gender' => $request->inp_gender,
            'tech_phone' => $request->inp_mobile,
            'tech_email' => $request->inp_email,
            'tech_address' => $request->inp_address
        ];

        $gen_password = substr(uniqid(mt_rand(0, 0)), 8, 15);

        User::create([
            'user_linkid' => $user_info['id'],
            'user_fname' => $request->inp_fname,
            'user_lname' => $request->inp_lname,
            'user_mobile' => $request->inp_mobile,
            'email' => $request->inp_email,
            'password' => Hash::make($gen_password),
            'user_type' => 'teacher',
            'user_schoolid' => 0
        ]);

        $userEmail = $request->input('inp_email');

        $data_email = [
            'name' => $request->inp_lname,
            'email' => $userEmail,
            'password' => $gen_password
        ];

        Teacher::create($data);

        Mail::send('layout.email', ["data" => $data_email], function ($message) use ($userEmail) {
            $message->to($userEmail)->subject('[Account Details] You have new message. Please read.');
        });

        return redirect('/teachers/register?s');
    }

    public static function update(Request $request)
    {
        $data = [
            'tech_fname' => $request->inp_fname,
            'tech_mname' => $request->inp_mname,
            'tech_lname' => $request->inp_lname,
            'tech_extname' => $request->inp_extname,
            'tech_birthdate' => date_format(date_create($request->inp_birth), 'Y-m-d'),
            'tech_civilStatus' => $request->inp_civil,
            'tech_gender' => $request->inp_gender,
            'tech_phone' => $request->inp_mobile,
            'tech_address' => $request->inp_address
        ];

        Teacher::find($request->Y7cbdb3e4ebb)->update($data);

        return redirect('/teacher/details/' . $request->Y7cbdb3e4ebb . '?s');
    }
    public static function subjects($section)
    {
        $user = session('info');
        $teacher_id = Teacher::where('tech_email', $user['email'])->first();

        $assign_subject = Assigned::join('t_subjects', 'subj_id', 'ass_subjid')
            ->join('t_sections', 'sec_id', 'ass_secid')
            ->where('ass_secid', $section)
            ->where('ass_teacherid', $teacher_id->tech_id)
            ->select('t_subjects.subj_title', 't_subjects.subj_id', 't_sections.sec_id')
            ->distinct()
            ->get();

        return view('pages.teachers.subjects')->with(['response' => $assign_subject]);
    }

    public static function grade($sec, $subj)
    {
        $student = new Student;
        $students = $student::where('student_secid', $sec)->orderBy('student_lname', 'ASC')->get();

        $subject = new Subject;
        $subjects = $subject::where('subj_id', $subj)->first();

        return view('pages.teachers.grade')->with(['response' => $students, 'subjects' => $subjects]);
    }

    public static function attendance($sec, $subj, $quarter)
    {
        $student = new Student;
        $students = $student::where('student_secid', $sec)->orderBy('student_lname', 'ASC')->get();

        $subject = new Subject;
        $subjects = $subject::where('subj_id', $subj)->first();

        return view('pages.teachers.attendance')->with(['response' => $students, 'subjects' => $subjects, 'quarter' => $quarter]);
    }

    public static function rstudents($subject, $section, $quarter)
    {
        $enrolled = new Enrolled;
        $response = $enrolled::where('en_strandid', $subject)
            ->where('en_secid', $section)
            ->join('t_assign', 'en_strandid', '=', 'ass_strandid')
            ->join('t_sections', 'en_secid', '=', 'sec_id')
            ->join('t_students', 'en_studentid', '=', 'student_id')
            ->get();

        return view('pages.teachers.list')->with(['response' => $response]);
    }

    public static function form137($sec)
    {
        $student = new Student;
        $students = $student::where('student_secid', $sec)->orderBy('student_lname', 'ASC')->get();

        return view('pages.teachers.form-137')->with(['response' => $students]);
    }

    public static function assign_subject(Request $request)
    {
        if ($request->input('semester') == '1st') {
            $data_1 = [
                'ass_teacherid' => $request->input('inp_teacherid'),
                'ass_secid' => $request->input('inp_secid'),
                'ass_subjid' => $request->input('inp_subjid'),
                'ass_quarter' => 1,
                'ass_type' => 'subject',
            ];

            $data_2 = [
                'ass_teacherid' => $request->input('inp_teacherid'),
                'ass_secid' => $request->input('inp_secid'),
                'ass_subjid' => $request->input('inp_subjid'),
                'ass_quarter' => 2,
                'ass_type' => 'subject',
            ];

            $find_1 = [
                'ass_secid' => $request->input('inp_secid'),
                'ass_subjid' => $request->input('inp_subjid'),
                'ass_quarter' => 1,
                'ass_type' => 'subject',
            ];

            $find_2 = [
                'ass_secid' => $request->input('inp_secid'),
                'ass_subjid' => $request->input('inp_subjid'),
                'ass_quarter' => 2,
                'ass_type' => 'subject',
            ];

            $assign_1 = new Assigned($data_1);
            $assign_2 = new Assigned($data_2);

            $recordExists_1 = $assign_1::where($find_1)->exists();

            if ($recordExists_1) {
                $assign_1::where($find_1)->update($data_1);
            } else {
                $assign_1->save();
            }

            $recordExists_2 = $assign_2::where($find_2)->exists();

            if ($recordExists_2) {
                $assign_2::where($find_2)->update($data_2);
            } else {
                $assign_2->save();
            }

            $sec_name = Section::where('sec_id', $request->input('inp_secid'))->first();
            $subj_name = Subject::where('subj_id', $request->input('inp_subjid'))->first();
            $teacher_name = Teacher::where('tech_id', $request->input('inp_teacherid'))->first();

            session(['section' => $sec_name, 'subject' => $subj_name, 'teacher' => $teacher_name]);
        } else { {
                $data_1 = [
                    'ass_teacherid' => $request->input('inp_teacherid'),
                    'ass_secid' => $request->input('inp_secid'),
                    'ass_subjid' => $request->input('inp_subjid'),
                    'ass_quarter' => 3,
                    'ass_type' => 'subject',
                ];

                $data_2 = [
                    'ass_teacherid' => $request->input('inp_teacherid'),
                    'ass_secid' => $request->input('inp_secid'),
                    'ass_subjid' => $request->input('inp_subjid'),
                    'ass_quarter' => 4,
                    'ass_type' => 'subject',
                ];

                $find_1 = [
                    'ass_secid' => $request->input('inp_secid'),
                    'ass_subjid' => $request->input('inp_subjid'),
                    'ass_quarter' => 3,
                    'ass_type' => 'subject',
                ];

                $find_2 = [
                    'ass_secid' => $request->input('inp_secid'),
                    'ass_subjid' => $request->input('inp_subjid'),
                    'ass_quarter' => 4,
                    'ass_type' => 'subject',
                ];

                $assign_1 = new Assigned($data_1);
                $assign_2 = new Assigned($data_2);

                $recordExists_1 = $assign_1::where($find_1)->exists();

                if ($recordExists_1) {
                    $assign_1::where($find_1)->update($data_1);
                } else {
                    $assign_1->save();
                }

                $recordExists_2 = $assign_2::where($find_2)->exists();

                if ($recordExists_2) {
                    $assign_2::where($find_2)->update($data_2);
                } else {
                    $assign_2->save();
                }

                $sec_name = Section::where('sec_id', $request->input('inp_secid'))->first();
                $subj_name = Subject::where('subj_id', $request->input('inp_subjid'))->first();
                $teacher_name = Teacher::where('tech_id', $request->input('inp_teacherid'))->first();

                session(['section' => $sec_name, 'subject' => $subj_name, 'teacher' => $teacher_name]);
            }
        }



        return redirect('/assign/teacher?s');
    }

    public function advisory(Request $request)
    {
        $user = session('info');
        $teacher_fk = $user['email'];
        $section = new Assigned();
        $response = $section
            ::join('t_sections', 'sec_id', 'ass_secid')
            ->join('t_teachers', 'tech_id', 'ass_teacherid')
            ->where('tech_email', $teacher_fk)
            ->select('sec_name', 'sec_id', 'sec_grade', 'sec_schoolyear')
            ->distinct()
            ->orderBy('sec_name', 'DESC')
            ->get();

        return view('pages.teachers.advisory')->with(['response' => $response]);
    }

    public static function advisory_list($sec)
    {
        $student = new Student;
        $students = $student::where('student_secid', $sec)->orderBy('student_lname', 'ASC')->get();

        $sec_name = Section::where('sec_id', $sec)->first();

        return view('pages.teachers.advisorylist')->with(['response' => $students, 'sec_name' => $sec_name]);
    }
}
