<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Assigned;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Strand;

class Sections extends Controller
{
    public static function save(Request $request)
    {
        $user_info = session('info');

        $data = [
            'sec_strand' => $request->input('inp_strand'),
            'sec_grade' => $request->input('inp_gradelevel'),
            'sec_name' => $request->input('inp_course'),
            'sec_description' => $request->input('inp_description'),
            'sec_schoolyear' => $request->input('inp_schoolyear'),
            'sec_ict_id' => $user_info['schoolid'],
        ];

        $section = new Section($data);
        $section->save();

        return redirect('/sections/register?s');
    }

    public static function update(Request $request)
    {

        $data = [
            'sec_strand' => $request->input('inp_strand'),
            'sec_grade' => $request->input('inp_gradelevel'),
            'sec_name' => $request->input('inp_course'),
            'sec_description' => $request->input('inp_description'),
            'sec_schoolyear' => $request->input('inp_schoolyear'),
        ];

        Section::where('sec_id', $request->id)->update($data);

        return redirect('/sections/edit/'.$request->id.'?s');
    }
    public static function assign(Request $request)
    {
        $data = [
            'ass_teacherid' => $request->input('inp_teacherid'),
            'ass_secid' => $request->input('inp_secid'),
            'ass_type' => 'advisory',
        ];

        $find = [
            'ass_secid' => $request->input('inp_secid'),
            'ass_type' => 'advisory',
        ];

        $assign = new Assigned($data);

        $recordExists = $assign::where($find)->exists();

        if ($recordExists) {
            $assign::where($find)->update($data);
        } else {
            $assign->save();
        }

        return redirect('/sections/view/' . $request->input('inp_secid') . '?s');
    }

  

    public static function list()
    {
        $user = session('info');
        $id = $user['schoolid'];
        $section = new Section;
        $response = $section::where('sec_ict_id', $id)->orderBy('sec_name', 'ASC')->get();
        return view('pages.sections.list')->with(['response' => $response]);
    }

    public static function search($search)
    {
        $section = new Section;
        $response = $section->where("sec_name", "LIKE", "%" . $search . "%")
            ->orderBy('sec_name', 'ASC')
            ->get();

        return view('pages.sections.list')->with(['response' => $response]);
    }

    public static function registration()
    {
        $strand = new Strand;
        $strands = $strand::get();
        return view('pages.sections.registration')->with(['strands' => $strands]);
    }

    public static function details($id)
    {
        $user = session('info');

        $teacher = new Teacher;

        $student = new Student;

        $adviser = $teacher::join('t_assign', function ($join) {
            $join->on('ass_teacherid', '=', 'tech_id');
        })
            ->where('sec_ict_id', $user['schoolid'])
            ->where('ass_secid', $id)
            ->orderBy('tech_lname', 'ASC')
            ->first();

        $teachers = $teacher::where('tech_ict_id', $user['schoolid'])->orderBy('tech_lname', 'ASC')->get();
        $students_count = $student::where('student_secid', $id)->count();
        $students = $student::where('student_secid', $id)->orderBy('student_lname', 'ASC')->get();

        $strand = new Section;
        $strands = $strand::where('sec_id', $id)->join('t_strands', 'of_id', 'sec_strand')->get();
        
        return view('pages.sections.view')->with(['strands' => $strands, 'teachers' => $teachers, 'adviser' => $adviser, 'count' => $students_count, 'students' => $students]);
    }

    public static function edit($id)
    {
        $user = session('info');
        $sid = $user['schoolid'];

        $strand = new Strand;
        $strands = $strand::where('of_schoolid', $sid)->get();

        $section = Section::where('sec_id', $id)->first();
        $stand_selected = Strand::where('of_id', $section->sec_strand)->first();
        return view('pages.sections.edit')->with(['strands' => $strands, 'section' => $section, 'strand' => $stand_selected]);
    }

    public static function import($id)
    {
        return view('pages.sections.import')->with(['secid' => $id]);
    }

    public function import_save(Request $request)
    {
        // Validate and process the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        $path = $request->file('file')->store('temp');

        $spreadsheet = IOFactory::load(storage_path('app/' . $path));
        $worksheet = $spreadsheet->getActiveSheet();

        $data = $worksheet->toArray();

        
        foreach ($data as $row) {
            // YourModel::create([
            //     'column1' => $row[0],
            //     'column2' => $row[1],
            //     // Add more columns as needed
            // ]);
        }

        return $data;

    }

}
