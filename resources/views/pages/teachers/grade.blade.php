@extends('layout.main')

@section('content')
    @php
        if (empty($response[0]->student_secid)) {
            $secid = 0;
        } else {
            $secid = $response[0]->student_secid;
        }
    @endphp
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/teacher/section/{{ $secid }}">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Student Grades</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    {{-- <li>
                                        <div class="drodown">
                                            <a href="/teacher/attendance/{{ $secid }}/{{ $subjects->subj_id }}"
                                                class="btn btn-light bg-white">
                                                <em class="d-none d-sm-inline icon ni ni-edit-alt"></em>
                                                <span>Upload Attendance </span>
                                            </a>
                                        </div>
                                    </li> --}}
                                    {{-- <li>
                                        <div class="drodown">
                                            <a href="#" class="btn btn-success">
                                                <em class="d-none d-sm-inline icon ni ni-check"></em>
                                                <span>Post Grade</span>
                                            </a>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                            {{-- <li>Students can access their individual grades through the Student Information System (SIS) once they are posted. After grades have been posted, making any alterations is not allowed.</li> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-3">
                        <h6>{{ $subjects->subj_title }}</h6>
                        <p>{{ $subjects->subj_description }}</p>
                    </div>
                </div>
            </div>
            @php
                use App\Models\Teacher;
                use App\Models\Assigned;

                $user = session('info');
                $teacher_id = Teacher::where('tech_email', $user['email'])->first();

                $get_quarter = Assigned::where('ass_secid', $secid)
                    ->where('ass_subjid', $subjects->subj_id)
                    ->where('ass_teacherid', $teacher_id->tech_id)
                    ->first();

                $quarter = $get_quarter->ass_quarter;
                $current_quarter = $quarter;
                use App\Models\Quarter;
                $quarter_data = Quarter::first();

                $quarter_monitor = [$quarter_data->q_1st, $quarter_data->q_2nd, $quarter_data->q_3rd, $quarter_data->q_4th];

            @endphp

            {{-- {{$current_quarter}}
            {{$quarter_monitor[$current_quarter - 1]}} --}}
            {{-- @if ($quarter_monitor[$current_quarter - 1] == 'false') --}}

            @php
                $input_Q1 = '';
                $input_Q2 = '';
                $input_Q3 = '';
                $input_Q4 = '';
            @endphp
            <br>
            {{-- <div class="alert alert-warning alert-icon mt-2">
                <em class="icon ni ni-alert-circle"></em> --}}
            <b>
                @if ($quarter_monitor[0] == 'false')
                    @php
                        $input_Q1 = 'disabled';
                    @endphp
                @endif
                @if ($quarter_monitor[1] == 'false')
                    @php
                        $input_Q2 = 'disabled';
                    @endphp
                @endif
                @if ($quarter_monitor[2] == 'false')
                    @php
                        $input_Q3 = 'disabled';
                    @endphp
                @endif
                @if ($quarter_monitor[3] == 'false')
                    @php
                        $input_Q4 = 'disabled';
                    @endphp
                @endif
                {{-- Quarter
                </b> is not yet ready. If you have concern please contact the
                <b>ICT Administrator</b>.
                Thank you. --}}
                {{-- </div> --}}
                {{-- @endif --}}

                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20" class="text-center">#</th>
                                        <th>List of Students</th>
                                        @if ($get_quarter->ass_quarter == 1)
                                            <th width="120" class="text-center">
                                                1st Quarter
                                            </th>
                                            <th width="120" class="text-center">
                                                2nd Quarter
                                            </th>
                                        @else
                                            <th width="120" class="text-center">
                                                3rd Quarter
                                            </th>
                                            <th width="120" class="text-center">
                                                4th Quarter
                                            </th>
                                        @endif
                                        <th width="120" class="text-center">
                                            Final Grade
                                        </th>
                                        <th width="120" class="text-center">--</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                    @endphp
                                    @foreach ($response as $rw)
                                        @php
                                            $grade = 0;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $num++ }}.
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <div class="user-card">
                                                        <div class="user-info text-dark" style="text-transform: uppercase">
                                                            <span class="tb-lead">
                                                                {{ $rw->student_lname }}, {{ $rw->student_fname }}
                                                                {{ $rw->student_mname }} {{ $rw->student_extname }}.
                                                                <span class="dot dot-success d-md-none ms-1"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            @php
                                                $grade = 0;
                                                $gradex = [];
                                                for ($i = 1; $i <= 4; $i++) {
                                                    $grades = DB::table('t_grades')
                                                        ->where('gd_studentid', $rw->student_id)
                                                        ->where('gd_subjid', $subjects->subj_id)
                                                        ->where('gd_secid', $secid)
                                                        ->where('gd_quarter', $i)
                                                        ->first();

                                                    if ($grades) {
                                                        $gradex[$i] = $grades->gd_grade;
                                                    }
                                                }

                                            @endphp
                                            @if ($get_quarter->ass_quarter == 1)
                                                @php
                                                    $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1];
                                                    $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                                    $avg = round(($grade_Q1 + $grade_Q2) / 2);
                                                @endphp
                                                <td class="text-center">
                                                    <input {{ $input_Q1 }} id="input_{{ $rw->student_id }}_1"
                                                        value="{{ $grade_Q1 }}" maxlength="3" max="100"
                                                        type="number"
                                                        onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 1)"
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td class="text-center">
                                                    <input {{ $input_Q2 }} id="input_{{ $rw->student_id }}_2"
                                                        value="{{ $grade_Q2 }}" maxlength="3" max="100"
                                                        type="number"
                                                        onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 2)"
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td style="padding-top: 15px">
                                                    <center>
                                                        <b id="avg_{{ $rw->student_id }}" style="font-size: 15px;" class="text-dark">
                                                            {{ $avg }}
                                                        </b>
                                                    </center>
                                                </td>
                                            @else
                                                @php
                                                    $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                                    $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];

                                                    $avg = round(($grade_Q3 + $grade_Q4) / 2);
                                                @endphp
                                                <td class="text-center">
                                                    <input {{ $input_Q3 }} id="input_{{ $rw->student_id }}_3"
                                                        value="{{ $grade_Q3 }}" maxlength="3" max="100"
                                                        type="number"
                                                        onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 3)"
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td class="text-center">
                                                    <input {{ $input_Q4 }} id="input_{{ $rw->student_id }}_4"
                                                        value="{{ $grade_Q4 }}" maxlength="3" max="100"
                                                        type="number"
                                                        onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 4)"
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td style="padding-top: 15px">
                                                    <center>
                                                        <b id="avg_{{ $rw->student_id }}" style="font-size: 15px;" class="text-dark">
                                                            {{ $avg }}
                                                        </b>
                                                    </center>
                                                </td>
                                            @endif

                                            <td>
                                                <center>
                                                    {{-- <b style="font-size: 21px;" class="text-warning">
                                                        <em class="ni ni-clock"></em>
                                                    </b> --}}
                                                    <b style="font-size: 21px; display: none;"
                                                        id="status_{{ $rw->student_id }}" class="text-success">
                                                        <em class="ni ni-check-circle"></em>
                                                    </b>
                                                </center>
                                            </td>

                                            {{-- <td class="text-center">
                                            <input id="input_{{ $rw->student_id }}_1" value="{{ $grade_Q2 }}"
                                                maxlength="3" max="100" type="number"
                                                onkeyup="uploadGrades({{ $rw->student_id }}, this.value, {{ $current_quarter }})"
                                                class="form-control text-center" value="0">
                                        </td>
                                        <td>
                                            <center>
                                                <b style="font-size: 21px; display: none;"
                                                    id="status_{{ $rw->student_id }}" class="text-success">
                                                    <em class="ni ni-check-circle"></em>
                                                </b>
                                            </center>
                                        </td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <script>
        function uploadGrades(id, grade, quarter) {
            document.getElementById('status_' + id).style.display = 'none';
            var avg = 0;
            $.ajax({
                url: '/api/upload/grades',
                type: 'POST',
                data: {
                    subject_quarter: quarter,
                    student_id: id,
                    student_grade: grade,
                    section_id: {{ $secid }},
                    subject_id: {{ $subjects->subj_id }},
                },
                success: function(data) {
                    console.log(data);
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'green';
                    document.getElementById('status_' + id).style.display = 'block';

                    if(quarter == 3 || quarter == 4){
                        $start_i = 3;
                        $end_i = 4;
                    }else{
                        $start_i = 1;
                        $end_i = 2;
                    }
                    
                    for (i = $start_i; i <= $end_i; i++) {
                        console.log(Number(document.getElementById('input_' + id + '_' + i).value))
                        if(Number(document.getElementById('input_' + id + '_' + i).value) !=  0 || Number(document.getElementById('input_' + id + '_' + i + 1).value) != 0){
                            avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                        }
                    }
                    document.getElementById('avg_' + id).innerHTML = avg / 2;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'red';
                }
            });
        }
    </script>
@endsection
