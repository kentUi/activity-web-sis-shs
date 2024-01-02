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


use App\Models\Strand;
use App\Models\Subject;

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
Route::get('/teacher/attendance/{id}/{secid}', [Teachers::class, 'attendance']);
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

Route::get('/generate/137/{id}', function ($id) {
    return view('layout.form137')->with(['id' => $id]);
});

Route::get('/generate/138', function () {
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
Route::get('/admin/ict', function (Request $request) {
    $schools = Schools::get();
    return view('pages.admin.ict')->with(['schools' => $schools]);
});

Route::get('/admin/schools', function (Request $request) {
    $schools = Schools::get();

    if (isset($_GET['id'])) {
        $users = User::where('user_schoolid', $_GET['id'])->get();
    } else {
        $users = [];
    }

    return view('pages.admin.schools')->with(['schools' => $schools, 'users' => $users]);
});

Route::get('/principal', function (Request $request) {

    $info = session('info');
    $schools = Schools::where('sc_id', $info['schoolid'])->first();

    return view('pages.principal')->with(['schools' => $schools]);
});

Route::post('/admin/schools', function (Request $request) {

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

                $strands = [
                    'of_schoolid' => $request->input('inp_id'),
                    'of_strands' => 'General Academic Strand (GAS)',
                    'of_code' => 'GAS'
                ];

                Strand::create($strands);
                $l_strands = Strand::where('of_schoolid', $request->input('inp_id'))->first();

                $commonSubjectValues = [
                    'subj_schoolid' => $request->input('inp_id'),
                    'subj_description' => '-',
                    'subj_strand' => $l_strands->of_id,
                    'subj_gradelevel' => 11,
                    'subj_semester' => 1,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ];

                $subjects = [];

                $coreSubjects = [
                    'Oral Communication',
                    'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino',
                    'General Mathematics',
                    'Earth and Life Science*',
                    '21st Century Literature from the Philippines and the World',
                    'Physical Education and Health',
                ];

                foreach ($coreSubjects as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Core'], $commonSubjectValues);
                }

                $appliedSubjects = ['Empowerment Technologies'];

                foreach ($appliedSubjects as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Applied'], $commonSubjectValues);
                }

                $specializedSubjects = [
                    'Disciplines and Ideas in the Social Sciences',
                    'Organization and Management',
                ];

                foreach ($specializedSubjects as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Specialized'], $commonSubjectValues);
                }

                $commonSubjectValuesSemester2 = [
                    'subj_schoolid' => $request->input('inp_id'),
                    'subj_description' => '-',
                    'subj_strand' => $l_strands->of_id,
                    'subj_gradelevel' => 11,
                    'subj_semester' => 2,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ];

                $coreSubjectsSemester2 = [
                    'Reading and Writing',
                    'Pagbasa at Pagsusuri ng Iba\'t Ibang Teksto Tungo sa Pananaliksik',
                    'Statistics and Probability',
                    'Physical Science*',
                    'Introduction to the Philosophy of the Human Person/Pambungad sa Pilosopiya ng Tao',
                    'Physical Education and Health',
                ];

                foreach ($coreSubjectsSemester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Core'], $commonSubjectValuesSemester2);
                }

                $appliedSubjectsSemester2 = ['Practical Research 1'];

                foreach ($appliedSubjectsSemester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Applied'], $commonSubjectValuesSemester2);
                }

                $specializedSubjectsSemester2 = [
                    'Creative Writing',
                    'Disaster Readiness and Risk Reduction',
                ];

                foreach ($specializedSubjectsSemester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Specialized'], $commonSubjectValuesSemester2);
                }

                $commonSubjectValuesGrade12Semester1 = [
                    'subj_schoolid' => $request->input('inp_id'),
                    'subj_description' => '-',
                    'subj_strand' => $l_strands->of_id,
                    'subj_gradelevel' => 12,
                    'subj_semester' => 1,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ];

                $coreSubjectsGrade12Semester1 = [
                    'Personal Development/Pansariling Kaunlaran',
                    'Understanding Culture, Society and Politics',
                    'Physical Education and Health',
                ];

                foreach ($coreSubjectsGrade12Semester1 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Core'], $commonSubjectValuesGrade12Semester1);
                }

                $appliedSubjectsGrade12Semester1 = [
                    'Practical Research 2',
                    'English for Academic and Professional Purposes',
                ];

                foreach ($appliedSubjectsGrade12Semester1 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Applied'], $commonSubjectValuesGrade12Semester1);
                }

                $specializedSubjectsGrade12Semester1 = [
                    'Trends, Networks and Critical Thinking in the 21st Century',
                    'Applied Economics',
                    'Creative Nonfiction',
                ];

                foreach ($specializedSubjectsGrade12Semester1 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Specialized'], $commonSubjectValuesGrade12Semester1);
                }

                $commonSubjectValuesGrade12Semester2 = [
                    'subj_schoolid' => $request->input('inp_id'),
                    'subj_description' => '-',
                    'subj_strand' => $l_strands->of_id,
                    'subj_gradelevel' => 12,
                    'subj_semester' => 2,
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                ];

                $coreSubjectsGrade12Semester2 = [
                    'Media and Information Literacy',
                    'Contemporary Philippine Arts from the Regions',
                    'Physical Education and Health',
                ];

                foreach ($coreSubjectsGrade12Semester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Core'], $commonSubjectValuesGrade12Semester2);
                }

                $appliedSubjectsGrade12Semester2 = [
                    'Inquiries, Investigations and Immersion',
                    'Entrepreneurship',
                    'Filipino sa Piling Larang',
                ];

                foreach ($appliedSubjectsGrade12Semester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Applied'], $commonSubjectValuesGrade12Semester2);
                }

                $specializedSubjectsGrade12Semester2 = [
                    'Philippine Politics and Governance',
                    'Work Immersion/ Research/ Career Advocacy/Culminating Activity',
                ];

                foreach ($specializedSubjectsGrade12Semester2 as $subjectTitle) {
                    $subjects[] = array_merge(['subj_title' => $subjectTitle, 'subj_type' => 'Specialized'], $commonSubjectValuesGrade12Semester2);
                }

                Subject::insert($subjects);

                return redirect('/admin/schools?register&s');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["file"]["error"];
    }

})->name('register.school');

Route::post('/reset-password', [Teachers::class, 'reset_password'])->name('reset.password');
Route::get('/member/change-password', function () {
    return view('auth.password');
});
Route::post('/change-password', function (Request $request) {
    $info = session('info');
    $user = DB::table('t_users')->where('id', $info['id'])->first();

    if (Hash::check($request->inp_current, $user->password)) {
        if ($request->inp_new == $request->inp_repeat) {
            DB::table('t_users')->where('id', $info['id'])->update(['password' => Hash::make($request->inp_repeat)]);
            return redirect('member/change-password?success');
        } else {
            return redirect('member/change-password?nm');
        }
    } else {
        return redirect('member/change-password?invalid');
    }
})->name('change.password');

Route::post('/admin/schools-register', function (Request $request) {
    $user = session('info');

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

                Schools::where('sc_id', $user['schoolid'])->update($data);

                return redirect('/principal?s');

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $data = [
            'sc_id' => $request->input('inp_id'),
            'sc_name' => $request->input('inp_name'),
            'sc_address' => $request->input('inp_address'),
            'sc_region' => $request->input('inp_region'),
            'sc_principal' => $request->input('inp_principal'),
            'sc_pr_rank' => $request->input('inp_rank')
        ];

        Schools::where('sc_id', $user['schoolid'])->update($data);

        return redirect('/principal?s');
    }

})->name('update.school');