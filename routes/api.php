<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Attendance;
use App\Models\Values;
use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Quarter;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload/grades', function (Request $request) {

    $find = [
        'gd_secid' => $request->input('section_id'),
        'gd_subjid' => $request->input('subject_id'),
        'gd_studentid' => $request->input('student_id'),
        'gd_quarter' => $request->input('subject_quarter'),
    ];

    $data = [
        'gd_secid' => $request->input('section_id'),
        'gd_subjid' => $request->input('subject_id'),
        'gd_studentid' => $request->input('student_id'),
        'gd_quarter' => $request->input('subject_quarter'),
        'gd_grade' => $request->input('student_grade'),
    ];


    $count = Grade::where($find)->count();

    if ($count == 0) {
        Grade::create($data);
        echo 'saved';
    } else {
        Grade::where($find)->update($data);
        echo 'updated';
    }
});

Route::post('/assign', function (Request $request) {

    $id = $request->input('section');
    $subj_id = $request->input('subject');
    $teacher = new Teacher;

    $adviser = $teacher::join('t_assign', function ($join) {
        $join->on('ass_teacherid', '=', 'tech_id');
    })
        ->where('ass_secid', $id)
        ->orderBy('tech_lname', 'ASC')
        ->first();

    $teachers = $teacher::orderBy('tech_lname', 'ASC')->get();

    $strand = new Section;
    $strands = $strand::where('sec_id', $id)->join('t_strands', 'of_id', 'sec_strand')->get();

    $subject = Subject::where('subj_id', $subj_id)->first();

    $sub_teacher = $teacher::join('t_assign', function ($join) {
        $join->on('ass_teacherid', '=', 'tech_id');
    })
        ->where('ass_secid', $id)
        ->where('ass_subjid', $subject->subj_id)
        ->orderBy('tech_lname', 'ASC')
        ->first();

    return view('pages.subjects.modal.index')->with(['strands' => $strands, 'teachers' => $teachers, 'adviser' => $adviser, 'subject' => $subject, 'subject_teacher' => $sub_teacher]);
});

Route::post('/delete', function (Request $request) {
    $id = $request->input('push_id');
    $type = $request->input('push_type');

    if( $type == 'student') {
        Student::where('student_id', $id)->delete();
        return '/students';
    }elseif( $type == 'teacher') {
        Teacher::where('tech_id', $id)->delete();
        return '/teachers';
    }elseif( $type == 'section') {
        Section::where('sec_id', $id)->delete();
        return '/sections';
    }elseif( $type == 'subject') {
        Subject::where('subj_id', $id)->delete();
        return '/subjects';
    }
});

Route::post('/quarter', function (Request $request) {
    $type = $request->input('push_type');    
    $quarter = Quarter::where('q_id', 1)->first();
    if( $type == 1) {
        if($quarter->q_1st == 'true'){
            Quarter::where('q_id', 1)->update(['q_1st' => 'false']);
        }else{            
            Quarter::where('q_id', 1)->update(['q_1st' => 'true']);
        }
    }elseif( $type == 2) {
        if($quarter->q_2nd == 'true'){
            Quarter::where('q_id', 1)->update(['q_2nd' => 'false']);
        }else{            
            Quarter::where('q_id', 1)->update(['q_2nd' => 'true']);
        }
    }elseif( $type == 3) {
        if($quarter->q_3rd == 'true'){
            Quarter::where('q_id', 1)->update(['q_3rd' => 'false']);
        }else{            
            Quarter::where('q_id', 1)->update(['q_3rd' => 'true']);
        }
    }elseif( $type == 4) {
        if($quarter->q_4th == 'true'){
            Quarter::where('q_id', 1)->update(['q_4th' => 'false']);
        }else{            
            Quarter::where('q_id', 1)->update(['q_4th' => 'true']);
        }
    }
});

Route::post('/upload/attendance', function (Request $request) {

    $find = [
        'at_studentid' => $request->input('id'),
        'at_type' => $request->input('type'),
        'at_month' => $request->input('month'),
    ];

    $data = [
        'at_studentid' => $request->input('id'),
        'at_type' => $request->input('type'),
        'at_month' => $request->input('month'),
        'at_count' => $request->input('count')
    ];


    $count = Attendance::where($find)->count();

    if ($count == 0) {
        Attendance::create($data);
        echo 'saved';
    } else {
        Attendance::where($find)->update($data);
        echo 'updated';
    }
});

Route::post('/upload/values', function (Request $request) {

    $find = [
        'val_studentid' => $request->input('id'),
        'val_type' => $request->input('type'),
        'val_quarter' => $request->input('quarter'),
    ];

    $data = [
        'val_studentid' => $request->input('id'),
        'val_type' => $request->input('type'),
        'val_quarter' => $request->input('quarter'),
        'val_result' => $request->input('value')
    ];


    $count = Values::where($find)->count();

    if ($count == 0) {
        Values::create($data);
        echo 'saved';
    } else {
        Values::where($find)->update($data);
        echo 'updated';
    }
});