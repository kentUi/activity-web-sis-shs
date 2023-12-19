<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Student;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('excel_file');

        try {
            $spreadsheet = IOFactory::load($file);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();

            $user_info = session('info');

            $import_data = [];

            for ($row = 6; $row < count($data); $row++) {

                $matchingStudents = Student::where('student_lrd', $data[$row][0])->get();
                $validate_lrn = $matchingStudents->count();

                if ($validate_lrn != 0) {
                    $datax = [
                        'student_ict_id' => $user_info['schoolid'],
                        'student_secid' => $request->input('secid'),
                        'student_lrd' => $data[$row][0],
                        'student_fname' => $data[$row][1],
                        'student_mname' => $data[$row][3],
                        'student_lname' => $data[$row][2],
                        'student_extname' => $data[$row][4],
                        'student_birthdate' => date_format(date_create($data[$row][5]), 'Y-m-d'),
                        'student_gender' => $data[$row][6],
                        'student_mobile' => $data[$row][7],
                        'student_email' => $data[$row][8],
                        'student_address' => $data[$row][9],
                        'status' => 'Existing'
                    ];
                    
                }else{
                    $datax = [
                        'student_ict_id' => $user_info['schoolid'],
                        'student_secid' => $request->input('secid'),
                        'student_lrd' => $data[$row][0],
                        'student_fname' => $data[$row][1],
                        'student_mname' => $data[$row][3],
                        'student_lname' => $data[$row][2],
                        'student_extname' => $data[$row][4],
                        'student_birthdate' => date_format(date_create($data[$row][5]), 'Y-m-d'),
                        'student_gender' => $data[$row][6],
                        'student_mobile' => $data[$row][7],
                        'student_email' => $data[$row][8],
                        'student_address' => $data[$row][9],
                        'status' => 'Saved'
                    ];

                    $gen_password = substr(uniqid(mt_rand(0, 0)), 8, 15);
                    User::create([
                        'user_schoolid' => $user_info['schoolid'],
                        'user_fname' => $data[$row][1],
                        'user_lname' => $data[$row][2],
                        'user_mobile' => $data[$row][7],
                        'email' => $data[$row][8],
                        'password' => Hash::make($gen_password),
                        'user_type' => 'student'
                    ]);
                    
                    Student::create($datax); 
                }               

                $import_data[$row] = $datax;

                //print_r($datax);


                // $userEmail = $request->input('inp_email');

                // $data_email = [
                //     'name' => $request->inp_lname,
                //     'email' => $userEmail,
                //     'password' => $gen_password 
                // ];    

                // Mail::send('layout.email', ["data" => $data_email], function ($message) use ($userEmail) {
                //     $message->to($userEmail)->subject('[Account Details] You have new message. Please read.');
                // });

            }

            session(['imported' => $import_data]);
            return redirect('/sections/import/'. $request->input('secid') .'?s');

        } catch (\Exception $e) {
            echo $e;
            //return redirect()->back()->with('error', 'Error importing Excel file: ' . $e->getMessage());
        }
    }
}
