<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Teachers;
use App\Http\Controllers\Students;
use App\Http\Controllers\Subjects;
use App\Http\Controllers\Sections;
use App\Http\Controllers\Strands;
use App\Http\Controllers\Auth;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\Printing;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () { 
    return view('auth.register');
});

Route::get('/user', function () {
    return view('layout.type');
});

Route::get('/user', function () {
    return view('layout.type');
});

Route::get('/user/student', [Students::class, 'confirmation']);
Route::post('/user/student/confirm', [Students::class, 'register'])->name('student.confirm');

Route::get('/user/teacher', [Teachers::class, 'confirmation']);
Route::post('/user/teacher/confirm', [Teachers::class, 'register'])->name('teacher.confirm');
Route::post('/user/teacher/update', [Teachers::class, 'update'])->name('teacher.update');

// Teacher Controller
Route::get('/teachers', [Teachers::class, 'list']);
Route::get('/teacher/section/{id}', [Teachers::class, 'subjects']);
Route::get('/teachers/register', [Teachers::class, 'registration']);

// Teacher > Advisory 
Route::get('/teacher/advisory', [Teachers::class, 'advisory']);
Route::get('/teacher/advisory/list/{id}', [Teachers::class, 'advisory_list']);

Route::get('/teacher/details/{id}', [Teachers::class, 'details']);
Route::get('/teacher/attendance/{id}', [Teachers::class, 'attendance']);
Route::get('/teacher/students/{sec}/{subj}', [Teachers::class, 'grade']);
Route::get('/teacher/xattendance/{sec}/{subj}/{quarter}', [Teachers::class, 'attendance']);
Route::get('/teacher/137/{sec}', [Teachers::class, 'form137']);

// Student Controller
Route::get('/students', [Students::class, 'list']);
Route::get('/students/details/{id}', [Students::class, 'details']);
Route::get('/students/search/{id}', [Students::class, 'search']);
Route::get('/students/register', [Students::class, 'registration']);
Route::post('/student/confirm', [Students::class, 'register'])->name('student.confirm');
Route::post('/student/update', [Students::class, 'update'])->name('student.update');

// Section Controller
Route::get('/sections', [Sections::class, 'list']);
Route::get('/sections/view/{id}', [Sections::class, 'details']);
Route::get('/sections/search/{id}', [Sections::class, 'search']);
Route::get('/sections/import/{id}', [Sections::class, 'import']);
Route::get('/sections/edit/{id}', [Sections::class, 'edit']);
Route::get('/sections/register', [Sections::class, 'registration']);
Route::post('/sections/update', [Sections::class, 'update'])->name('section.update');
Route::post('/sections/assign', [Sections::class, 'assign'])->name('teacher.assign');

// Assign Subject Teacher
Route::get('/assign/teacher', [Subjects::class, 'assign']);
Route::post('/assign/subject', [Teachers::class, 'assign_subject'])->name('assign.subject');

Route::get('/generate/137', function(){
    return view('layout.form137');
});

Route::get('/generate/138', function(){
    return view('layout.form138');
});

Route::get('/strands', [Strands::class, 'list']);
Route::get('/strand/register', [Strands::class, 'registartion']);
Route::get('/strand/details/{id}', [Strands::class, 'details']);
Route::post('/strand/save', [Strands::class, 'register'])->name('strand.register');
Route::post('/strand/update', [Strands::class, 'update'])->name('strand.update');

// Subject Controller
Route::get('/subjects', [Subjects::class, 'list']);
Route::get('/subject/view/{id}', [Subjects::class, 'details']);
Route::get('/subject/register', [Subjects::class, 'registration']);
Route::post('/subject/update', [Subjects::class, 'update'])->name('update.course');
Route::post('/subject/confirm', [Subjects::class, 'save'])->name('create.course');

Route::post('/login', [Auth::class, 'login'])->name('login');
Route::post('/register', [Auth::class, 'register'])->name('register');
Route::get('/logout', [Auth::class, 'logout']);

Route::post('/create-course', [Subjects::class, 'save'])->name('create.course');
Route::post('/create-section', [Sections::class, 'save'])->name('create.section');

Route::get('/user/teacher/section/{id}', [Teachers::class, 'subjects']);
Route::get('/user/teacher/import/{id}', [Teachers::class, 'import']);


Route::get('/teacher/subject/{subject}/{section}/{quarter}', [Teachers::class, 'students']);

// Import Excel
Route::post('import/excel', [ExcelImportController::class, 'import'])->name('import.excel');

// Print Form
Route::get('/print/form9/{id}', [Printing::class, 'form9']);

use App\Models\Schools;
use App\Models\User;
// Administrator V.1
Route::get('/admin/ict', function(Request $request){
    $schools = Schools::get();
    return view('pages.admin.ict')->with(['schools' => $schools]);
});

Route::get('/admin/schools', function(Request $request){
    $schools = Schools::get();

    if(isset($_GET['id'])){
        $users = User::where('user_schoolid', $_GET['id'])->get();
    }else{
        $users = [];
    }
   
    return view('pages.admin.schools')->with(['schools' => $schools, 'users' => $users]);
});

Route::post('/admin/schools-register', function(Request $request){
    if ($_FILES["inp_logo"]["error"] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . uniqid() . basename($_FILES["inp_logo"]["name"]);
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
        } else {
            if (move_uploaded_file($_FILES["inp_logo"]["tmp_name"], $targetFile)) {
                $data = [
                    'sc_id' => $request->input('inp_id'),
                    'sc_name' => $request->input('inp_name'),
                    'sc_address' => $request->input('inp_address'),
                    'sc_region' => $request->input('inp_region'),
                    'sc_principal' => $request->input('inp_principal'),
                    'sc_pr_rank' => $request->input('inp_rank'),
                    'sc_logo' => $targetFile,
                ];

                Schools::create($data);

                return redirect('/admin/schools?register&s');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["file"]["error"];
    }
    
})->name('register.school');