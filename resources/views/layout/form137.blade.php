<!DOCTYPE html>
<html lang="en">
    @php
    use App\Models\Subject;
    use App\Models\Section;
    use App\Models\Student;
    $user = session('info');
@endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form - 137</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }


        .container {
            width: 100%;
            margin: 0 auto;
            display: flex;
        }

        .column {
            flex: 1;
            padding: 20px;
            box-sizing: border-box;

        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }

        /* Style for table cells (td) */
        td {
            border-bottom: 1px solid #000;
            /* Only bottom border */
            padding: 10px;
            padding-top: 2px;
            padding-bottom: 2px;
            text-align: left;
        }

        /* Style for table header cells (th) */
        th {
            border: 1px solid #202020;
            /* border-bottom: 2px solid #333; */
            /* Header has a slightly thicker bottom border */
            padding: 10px;
            padding-top: 2px;
            text-align: left;
        }

        @media print {
            /* Apply print-specific styles here */

            /* Add page breaks as needed */
            .page-break {
                page-break-before: always;
            }
        }

        .nested-table {
            border-collapse: collapse;
            width: 100%;
        }

        .nested-table,
        .nested-table th,
        .nested-table td {
            /* //border: 1px solid #ddd; */
        }

        .nested-table th,
        .nested-table td {
            text-align: left;
        }
    </style>
</head>

<body onload="Xwindow.print()">
    @php
        $info = DB::table('t_students')
            ->where('student_id', $id)
            ->first();

        $strand = DB::table('t_sections')
            ->join('t_strands', 't_strands.of_id', 't_sections.sec_strand')
            ->where('sec_id', $info->student_secid)
            ->first();

        $school = DB::table('t_schools')
            ->where('sc_id', $info->student_ict_id)
            ->get();
    @endphp
    <div class="" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px;">
        <div id="form137">
            <div id="PrintGradeReportFrontPage">
                <b style="float: right;">SF10-SHS</b>
                <center>
                    <img src="/deped seal.webp" height="60" style="position: absolute; left: 85px; top: 15px">
                    <img src="/logo.png" height="50" style="position: absolute; right: 40px; top: 15px">

                    <br>
                    <p style="font-size: 16px">
                        <span style="text-transform: uppercase;">Republic of the Philippines</span> <br>
                        <span style="text-transform: uppercase; font-size: 16px; font-style: bold;">Department of
                            Education</span> <br>
                        <b style="text-transform: uppercase;">SENIOR HIGH SCHOOL STUDENT PERMANET RECORD</b>
                    </p>
                </center>
                <table style="width:100%; border-collapse: collapse; font-weight: bold; margin: 0; font-size: 12px;"
                    border="0">
                    <tr>
                        <td colspan="8"
                            style="border: 1px solid #000; background-color: #D0CECE; text-align: center; font-weight: bold; padding-top: 2px">
                            LEARNER'S INFORMATION
                        </td>
                    </tr>
                    <tr>
                        <td width="80" colspan="-1" style="border: none;">LAST NAME:</td>
                        <td colspan="0">
                            <b style="text-transform: uppercase">
                                {{ $info->student_lname }}
                            </b>
                        </td>
                        <td width="100" style="border: none;">FIRST NAME:</td>
                        <td colspan="2">
                            <b style="text-transform: uppercase">
                                {{ $info->student_fname }}
                            </b>
                        </td>
                        <td width="100" style="border: none;">MIDDLE NAME:</td>
                        <td colspan="4">
                            <b style="text-transform: uppercase">
                                {{ $info->student_mname }}
                            </b>
                        </td>
                    </tr>
                </table>
                <table style="width:100%; border-collapse: collapse; font-weight: bold;  margin: 0;  font-size: 12px;"
                    border="0">
                    <tr>
                        <td width="20" style="border: none;">LRN:</td>
                        <td colspan="2">
                            <b style="text-transform: uppercase">
                                {{ $info->student_lrd }}
                            </b>
                        </td>
                        <td width="130" style="border: none; letter-spacing: -1px;">Date of Birth
                            <small>(MM/DD/YYYY)</small>:
                        </td>
                        <td colspan="2">
                            <b style="text-transform: uppercase">
                                {{ date_format(date_create($info->student_birthdate), 'm/d/Y') }}
                            </b>
                        </td>
                        <td width="20" style="border: none;">SEX:</td>
                        <td colspan="2">
                            <b style="text-transform: uppercase">
                                {{ $info->student_mname }}
                            </b>
                        </td>
                        <td width="160" style="border: none; letter-spacing: -1px;">Date of Admission
                            <small>(MM/DD/YYYY)</small>:
                        </td>
                        <td colspan="2">
                            <b style="text-transform: uppercase">
                                {{ date_format(date_create($info->student_birthdate), 'm/d/Y') }}
                            </b>
                        </td>
                    </tr>
                </table>
               
                <table style="width: 100%; border-collapse: collapse; font-weight: bold; margin: 0">
                    <tr>
                        <td colspan="8"
                            style="border: 1px solid #000; background-color: #D0CECE; text-align: center; font-weight: bold; padding-top: 2px">
                            ELIGIBILITY FOR SHS ENROLMENT
                        </td>
                    </tr>
                </table>
                <table
                    style="border: 0px solid black; width: 100%; margin: 0; border-collapse: collapse; font-weight: bold;"
                    border="0">
                </table>
                @include('layout.details.grade-11-1');
                @include('layout.details.grade-11-2');

                @include('layout.details.grade-12-1');
                @include('layout.details.grade-12-2');
                {{-- @include('layout.details.grade-11-2'); --}}

            </div>
        </div>
    </div>

</body>

</html>
