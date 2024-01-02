@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/teacher/advisory">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">List of Students</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-3">
                        <h4 class="text-dark">Section : <span class="text-danger">{{$sec_name->sec_name}}</span></h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th width="20" class="text-center">#</th>
                                        <th>List of Students</th>
                                        <th>Gender</th>
                                        <th>Contact Number</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $num = 1;
                                        $user = session('info');
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
                                            <td>{{ $rw->student_gender }}</td>
                                            <td>+63 {{ $rw->student_mobile }}</td>
                                            <td>
                                                <li>
                                                    <div class="drodown" style="">
                                                        <a href="#"
                                                            class="dropdown-toggle btn btn-icon btn-trigger p-0"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                {{-- <li>
                                                                    <a href="/teacher/students/">
                                                                        <em class="icon ni ni-download-cloud"></em>
                                                                        <span> Generate Form 137</span>
                                                                    </a>
                                                                </li> --}}
                                                                {{-- <li>
                                                                    <a href="/teacher/details/{{$rw->student_id}}">
                                                                        <em class="icon ni ni-users"></em>
                                                                        <span> View Grades</span>
                                                                    </a>
                                                                </li> --}}
                                                                <li>
                                                                    <a href="/teacher/attendance/{{$rw->student_id}}/{{$sec_name->sec_id}}">
                                                                        <em class="icon ni ni-book"></em>
                                                                        <span> Attendance & Values</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a target="_blank" href="/print/form9/{{$rw->student_id}}">
                                                                        <em class="icon ni ni-download-cloud"></em>
                                                                        <span> Generate Form 138</span>
                                                                    </a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </td>
                                            @php
                                                // $grade = 0;
                                                // $gradex = [];
                                                // for ($i = 1; $i <= 4; $i++) {
                                                //     $grades = DB::table('t_grades')
                                                //         ->where('gd_studentid', $rw->student_id)
                                                //         ->where('gd_secid', $response[0]->student_secid)
                                                //         ->where('gd_quarter', $i)
                                                //         ->first();

                                                //     if ($grades) {
                                                //         $gradex[$i] = $grades->gd_grade;
                                                //     }
                                                // }

                                                // $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1];
                                                // $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                                // $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                                // $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];

                                                // $avg = ($grade_Q1 + $grade_Q2 + $grade_Q3 + $grade_Q4) / 4;
                                            @endphp
                                            {{-- @if ($quarter_monitor[$current_quarter - 1] == 'false')
                                                <td class="text-center">
                                                    <input maxlength="3" max="100" type="number" disabled
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td>
                                                    <center>
                                                        <b style="font-size: 23px;" class="text-warning">
                                                            <em class="ni ni-clock"></em>
                                                        </b>
                                                    </center>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <input id="input_{{ $rw->student_id }}_1" value="{{ $grade_Q1 }}"
                                                        maxlength="3" max="100" type="number"
                                                        onkeyup="uploadGrades({{ $rw->student_id }}, this.value, {{$current_quarter}})"
                                                        class="form-control text-center" value="0">
                                                </td>
                                                <td>
                                                    <center>
                                                        <b style="font-size: 26px; display: none;"
                                                            id="status_{{ $rw->student_id }}" class="text-success">
                                                            <em class="ni ni-check-circle"></em>
                                                        </b>
                                                    </center>
                                                </td>
                                            @endif --}}
                                            {{-- <td class="text-center">
                                                <input id="input_{{ $rw->student_id }}_2" value="{{ $grade_Q2 }}" maxlength="3" max="100"
                                                    type="number"
                                                    onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 2)"
                                                    class="form-control text-center" value="0">
                                            </td>
                                            <td class="text-center">
                                                <input id="input_{{ $rw->student_id }}_3" value="{{ $grade_Q3 }}" maxlength="3" max="100"
                                                    type="number"
                                                    onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 3)"
                                                    class="form-control text-center" value="0">
                                            </td>
                                            <td class="text-center">
                                                <input id="input_{{ $rw->student_id }}_4" value="{{ $grade_Q4 }}" maxlength="3" max="100"
                                                    type="number"
                                                    onkeyup="uploadGrades({{ $rw->student_id }}, this.value, 4)"
                                                    class="form-control text-center" value="0">
                                            </td> --}}
                                            {{-- <td class="text-center">
                                                <b class="fs-4 text-dark" id="avg_{{ $rw->student_id }}">{{$avg}}</b>
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
            var avg = 0;
            $.ajax({
                url: '/api/upload/grades',
                type: 'POST',
                data: {
                    subject_quarter: quarter,
                    student_id: id,
                    student_grade: grade,
                    section_id: {{ $response[0]->student_secid }},
                },
                success: function(data) {
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'green';
                    document.getElementById('status_' + id).style.display = 'block';
                    for (i = 1; i <= 4; i++) {
                        avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                    }

                    document.getElementById('avg_' + id).innerHTML = avg / 4;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'red';
                }
            });
        }
    </script>
@endsection
