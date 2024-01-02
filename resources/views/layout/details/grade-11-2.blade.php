@php
    use App\Models\Subject;
    use App\Models\Section;
    use App\Models\Student;
    $user = session('info');
@endphp
<table style="width: 100%; border-collapse: collapse; font-weight: bold; margin: 0; padding-top: 0">
    <tr>
        <td width="50" colspan="-1" style="border: none;">SCHOOL:</td>
        <td colspan="0">
            <b style="text-transform: Capitalize">
                {{ $school[0]->sc_name }}
            </b>
        </td>
        <td width="75" style="border: none;">SCHOOL ID:</td>
        <td colspan="1">
            <b style="text-transform: uppercase">
                {{ $school[0]->sc_id }}
            </b>
        </td>
        <td width="90" style="border: none;">GRADE LEVEL:</td>
        <td colspan="0">
            <b style="text-transform: uppercase">

            </b>
        </td>
        <td width="20" style="border: none;">SY:</td>
        <td colspan="0">
            <b style="text-transform: uppercase">

            </b>
        </td>
        <td width="20" style="border: none;">SEM:</td>
        <td colspan="0">
            <b style="text-transform: uppercase">

            </b>
        </td>
    </tr>
</table>
<table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;" border="0">
    <tr>
        <td width="20" style="border: none;">TRACK/STRAND:</td>
        <td colspan="4">
            <b style="text-transform: uppercase">

            </b>
        </td>
        <td width="20" style="border: none; ">SECTION:</td>
        <td colspan="4">
            <b style="text-transform: uppercase">

            </b>
        </td>
    </tr>
</table>
<table style="border-collapse: collapse; margin: 0px; padding: 0;">
    <tr>
        <td width="100"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">
            Indicate if Subject is <br> CORE, APPLIED, <br> or SPECIALIZED
        </td>
        <td style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">
            Subjects</td>
        <td style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            colspan="2">Quarter
        </td>
        <td width="30"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">SEM FINAL <br> GRADE
        </td>
        <td width="50"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">ACTION <br> TAKEN
        </td>
    </tr>
    <tr>
        <td width="30"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;">
            3RD</td>
        <td width="30"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;">
            4TH</td>
    </tr>

    @php

        $students = new Student();
        $stud = $students::where('student_id', $id)->first();

        $grades_sections = DB::table('t_grades')
            ->join('t_sections', 'sec_id', 'gd_secid')
            ->where('gd_studentid', $id)
            ->select('gd_secid', 'sec_name', 'sec_grade')
            ->distinct('gd_secid')
            ->get();

        $section = new Section();
        $sections = $section::where('sec_id', $stud->student_secid)->first();

        $subjs = new Subject();
        $response_1 = $subjs
            ::where('subj_strand', $sections->sec_strand)
            ->where('subj_schoolid', $user['schoolid'])
            ->where('subj_gradelevel', 11)
            ->where('subj_semester', 2)
            ->orderBy('subj_type', 'ASC')
            ->get();

        $general_average = 0;
        $count_num = 0;
    @endphp
    @foreach ($response_1 as $rw_1)
        @php
            $grade = 0;
            $gradex = [];
            for ($i = 1; $i <= 4; $i++) {
                foreach ($grades_sections as $gs) {
                    if ($gs->sec_grade == 11) {
                        $grades = DB::table('t_grades')
                            ->where('gd_studentid', $id)
                            ->where('gd_subjid', $rw_1->subj_id)
                            ->where('gd_secid', $gs->gd_secid)
                            ->where('gd_quarter', $i)
                            ->first();
                    }
                }

                if ($grades) {
                    $gradex[$i] = $grades->gd_grade;
                }
            }

            $grade_Q1 = empty($gradex[1]) ? '' : $gradex[1];
            $grade_Q2 = empty($gradex[2]) ? '' : $gradex[2];
            $grade_Q3 = empty($gradex[3]) ? '' : $gradex[3];
            $grade_Q4 = empty($gradex[4]) ? '' : $gradex[4];

            $status = '';

            if (empty($grade_Q3) || empty($grade_Q4)) {
                $avg = '';
            } else {
                $avg = ($grade_Q3 + $grade_Q4) / 2;
                if ($avg <= 75) {
                    $status = 'Failed';
                } else {
                    $status = 'Passed';
                }
                $general_average += $avg;
                $count_num++;
            }
        @endphp
        <tr>
            <td style="border: 1px solid; font-weight: bold; text-align: center; padding-top: 0">{{ $rw_1->subj_type }}x
            </td>
            <td style="border: 1px solid; font-weight: bold; text-align: left; padding-top: 0">{{ $rw_1->subj_title }}
            </td>
            <td width="50" style="border: 1px solid; font-weight: bold; text-align: center; padding-top: 0">
                {{ $grade_Q3 }}</td>
            <td width="50" style="border: 1px solid; font-weight: bold; text-align: center; padding-top: 0">
                {{ $grade_Q4 }}</td>
            <td style="border: 1px solid; font-weight: bold; text-align: center; padding-top: 0">{{ $avg }}
            </td>
            <td style="border: 1px solid; font-weight: bold; text-align: center; padding-top: 0">{{ $status }}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: right;">
            General Ave. for Semester</td>
        <td colspan="2" style="padding-top: 0;border: 1px solid; font-weight: bold; text-align: left;">
            &ensp;&nbsp;<b>
                @if ($general_average <= 0)
                    0
                @else
                    {{ number_format($general_average / $count_num, 1) }}
                @endif
            </b>
        </td>
    </tr>
</table>


<table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;" border="0">
    <tr>
        <td width="20" style="border: none;">REMARKS:</td>
        <td colspan="8">
        </td>
    </tr>
    <tr>
        <td width="50" style="border: none;">Prepare by</td>
        <td colspan="4" style="border: none;">
            <b style="">
                <center>Certified True and Correct</center>
            </b>
        </td>
        <td colspan="3" style="border: none;">
            <b style="">
                <center>Date Checked (MM/DD/YYYY)</center>
            </b>
        </td>
    </tr>
</table>
<table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;" border="0">
    <tr>
        <td width="20" style="border: none;"></td>
        <td colspan="4">
            <b style="">

            </b>
        </td>
        <td width="20" style="border: none;"></td>
        <td colspan="6">
            <b style="">

            </b>
        </td>
        <td width="50" style="border: none;"></td>
        <td width="100"></td>
    </tr>
</table>
<table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;" border="0">
    <tr>
        <td width="20" style="border: none;padding-top: 0px"></td>
        <td colspan="4" style="border: none; padding-top: 0px; width: 170px">
            <b style="">
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<small>Signature of Adviser over Printed Name</small>
            </b>
        </td>
        <td colspan="4" style="border: none; padding-top: 0px">
            <b style="">
                <small>Signature of Authorized Person over Printed Name, Designation</small>
            </b>
        </td>
    </tr>
</table>
&ensp;&nbsp;<b>REMEDIAL CLASSES</b>
<table style="width: 100%; border-collapse: collapse; font-weight: bold; margin: 0; padding-top: 0">
    <tr>
        <td width="150" colspan="-1" style="border: none; padding-top: 0"><small>Conducted
                from (MM/DD/YYYY)</small></td>
        <td width="30" colspan="1" style=" padding-top: 0">
            <b style="text-transform: Capitalize">

            </b>
        </td>
        <td width="85" style="border: none;  padding-top: 0"><small>to (MM/DD/YYYY)</small></td>
        <td width="30" colspan="1" style=" padding-top: 0">
            <b style="text-transform: uppercase">

            </b>
        </td>
        <td width="50" style="border: none;  padding-top: 0">SCHOOL:</td>
        <td colspan="0" style=" padding-top: 0">
            <b style="text-transform: Capitalize">
                {{ $school[0]->sc_name }}
            </b>
        </td>
        <td width="75" style="border: none;  padding-top: 0">SCHOOL ID:</td>
        <td colspan="0" style=" padding-top: 0">
            <b style="text-transform: uppercase">
                {{ $school[0]->sc_id }}
            </b>
        </td>
    </tr>
</table>
<table style="border-collapse: collapse;  margin: 0px; padding-top: 0px;">
    <tr>
        <td width="100"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">
            Indicate if Subject is <br> CORE, APPLIED, <br> or SPECIALIZED
        </td>
        <td style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">
            Subjects</td>
        <td style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">SEM FINAL <br> GRADE
        </td>
        <td width="30"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">REMEDIAL <br> CLASS <br> MARK
        </td>
        <td width="30"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">RECOMPUTE <br> FINAL GRADE
        </td>
        <td width="50"
            style="padding-top: 0; background-color: #D0CECE; border: 1px solid; font-weight: bold; text-align: center;"
            rowspan="2">ACTION <br> TAKEN
        </td>
    </tr>
    <tbody>
        @php
            $grades = ['1', '2', '3', '4'];
        @endphp
        @foreach ($grades as $grade)
            <tr>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;"></td>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;"></td>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;"></td>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;"></td>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;"></td>
                <td style="padding-top: 0; border: 1px solid; font-weight: bold; text-align: center;">-</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;" border="0">
    <tr>
        <td width="150" style="border: none;">Name of Teacher/Adviser:</td>
        <td colspan="3">
            <b style="text-transform: uppercase">

            </b>
        </td>
        <td width="20" style="border: none; ">Signature:</td>
        <td colspan="3">
            <b style="text-transform: uppercase">

            </b>
        </td>
    </tr>
</table>
