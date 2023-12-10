@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/teacher/students/{{ $response[0]->student_secid }}/{{ $subjects->subj_id }}/{{$quarter}}">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Student Attendance</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-1">
                        <table class="table table-bordered" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>List of Students</th>
                                    @for ($i = 1; $i <= date('m'); $i++)
                                        @php
                                            $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            $formattedDate = date('Y-m-d', strtotime("Y-$i-$day"));
                                            $month = date_format(date_create(date("Y-$i-$day")), 'M.');
                                        @endphp
                                        <th class="text-center" style="width: 50px">
                                            {{ $month }}
                                        </th>
                                    @endfor
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @foreach ($response as $rw)
                                    <tr>
                                        <td>{{ $num++ }}.</td>
                                        <td>
                                            {{ $rw->student_lname }}, {{ $rw->student_fname }}
                                            {{ $rw->student_mnme }} {{ $rw->student_extname }}
                                        </td>
                                        @for ($i = 1; $i <= date('m'); $i++)
                                            <td style="padding: 0;">
                                                <input type="number" placeholder="0" class="form-control text-center"
                                                    style="border: none; border-bottom: 2px solid #eee;">
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <table class="table">
                                <thead>
                                    <tr>
                                        <th width="20" class="text-center">#</th>
                                        <th>List of Students</th>
                                        <th width="120" class="text-center">
                                            @if ($current_quarter == 1)
                                                1st
                                            @elseif ($current_quarter == 2)
                                                2nd
                                            @elseif ($current_quarter == 3)
                                                3rd
                                            @elseif ($current_quarter == 4)
                                                4th
                                            @endif
                                            Quarter
                                        </th>
                                        <th width="120" class="text-center">Status</th>
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
                                                                {{ $rw->student_mnme }} {{ $rw->student_extname }}
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
                                                        ->where('gd_secid', $response[0]->student_secid)
                                                        ->where('gd_quarter', $current_quarter)
                                                        ->first();

                                                    if ($grades) {
                                                        $gradex[$i] = $grades->gd_grade;
                                                    }
                                                }

                                                $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1];
                                                $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                                $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                                $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];

                                                $avg = ($grade_Q1 + $grade_Q2 + $grade_Q3 + $grade_Q4) / 4;

                                            @endphp
                                            @if ($quarter_monitor[$current_quarter - 1] == 'false')
                                                <td class="text-center">
                                                    <input maxlength="3" max="100" type="number" disabled
                                                        class="form-control text-center" value="<?= $grade_Q1 ?>">
                                                </td>
                                                <td>
                                                    <center>
                                                        <b style="font-size: 21px;" class="text-warning">
                                                            <em class="ni ni-clock"></em>
                                                        </b>
                                                    </center>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <input id="input_{{ $rw->student_id }}_1" value="{{ $grade_Q1 }}"
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
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> --}}
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
                    section_id: {{ $response[0]->student_secid }},
                    subject_id: {{ $subjects->subj_id }},
                },
                success: function(data) {
                    document.getElementById('input_' + id + '_1').style.borderColor = 'green';
                    document.getElementById('status_' + id).style.display = 'block';
                    for (i = 1; i <= 4; i++) {
                        avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                    }

                    document.getElementById('avg_' + id).innerHTML = avg / 4;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_1').style.borderColor = 'red';
                }
            });
        }
    </script>
@endsection
