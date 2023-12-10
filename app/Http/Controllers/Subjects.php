<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Strand;

class Subjects extends Controller
{
    //

    public static function save(Request $request)
    {
        $data = [
            'subj_strand' => $request->input('inp_strand'),
            'subj_gradelevel' => $request->input('inp_gradelevel'),
            'subj_title' => $request->input('inp_course'),
            'subj_description' => $request->input('inp_description')
        ];

        $subject = new Subject($data);
        $subject->save();

        return redirect('/subject/register?s');
    }

    public static function update(Request $request)
    {
        $data = [
            'subj_strand' => $request->input('inp_strand'),
            'subj_gradelevel' => $request->input('inp_gradelevel'),
            'subj_title' => $request->input('inp_course'),
            'subj_description' => $request->input('inp_description')
        ];

        Subject::where('subj_id', $request->input('id'))->update($data);

        return redirect('/subject/view/'.$request->input('id').'?s');
    }

    public static function assign()
    {
        $subjects = new Subject;
        $response = $subjects::join('t_strands', 'of_id', 'subj_strand')
            ->join('t_sections', 'sec_strand', 'subj_strand')
            ->orderBy('subj_title', 'ASC')->get();

        return view('pages.subjects.assigned')->with(['response' => $response]);
    }

    public static function list()
    {
        $subjects = new Subject;
        $response = $subjects::join('t_strands', 'of_id', 'subj_strand')
            ->orderBy('subj_title', 'ASC')->get();
        return view('pages.subjects.list')->with(['response' => $response]);
    }


    public static function registration()
    {
        $strand = new Strand;
        $strands = $strand::get();
        return view('pages.subjects.registration')->with(['strands' => $strands]);
    }


    public static function details($id)
    {
        $strand = new Strand;
        $strands = $strand::get();

        $subjects = Subject::where('subj_id', $id)->first();
        $strand_selected = Strand::where('of_id', $subjects->subj_strand)->first();
        return view('pages.subjects.edit')->with(['strands' => $strands, 'info' => $subjects, 'strand' => $strand_selected]);
    }
}