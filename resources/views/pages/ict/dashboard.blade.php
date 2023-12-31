@extends('layout.main')
@php
    $user = session('info');
@endphp
@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Welcome! {{ $user['fname'] }} {{ $user['lname'] }}</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    {{-- <li>
                                        <div class="drodown">
                                            <a href="#"
                                                class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">School Year</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>S.Y : 2023-2024</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row g-gs">
                    <div class="col-md-3">
                        <div class="card is-dark h-100">
                            <div class="nk-ecwg nk-ecwg1">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Total Students</h6>
                                        </div>
                                    </div>
                                    @php
                                        use App\Models\Student;
                                        use App\Models\Teacher;
                                        use App\Models\Schools;

                                        $schools = Schools::where('sc_id', $user['schoolid'])->first();

                                        $teacher = Teacher::where('tech_ict_id', $user['schoolid'])->count();
                                        $student = Student::where('student_ict_id', $user['schoolid'])->count();
                                    @endphp
                                    <div class="data">
                                        <div class="amount">{{ $student }}</div>
                                    </div>
                                    <div class="data">
                                        <h6 class="sub-title">Teachers</h6>
                                        <div class="data-group">
                                            <div class="amount">{{ $teacher }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-ecwg -->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="#" class="d-flex align-items-center">
                                        <div class="ms-3 text-dark" style="font-size: 18px">
                                            <b>Control Each Quarter here.</b>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @php
                                use App\Models\Quarter;
                                $quarter_data = Quarter::where('q_id', 1)->first();
                                $quarter_monitor = [$quarter_data->q_1st, $quarter_data->q_2nd, $quarter_data->q_3rd, $quarter_data->q_4th];

                                $checked_1 = '';
                                $checked_2 = '';
                                $checked_3 = '';
                                $checked_4 = '';

                                if ($quarter_monitor[0] == 'true') {
                                    $checked_1 = 'checked';
                                }

                                if ($quarter_monitor[1] == 'true') {
                                    $checked_2 = 'checked';
                                }

                                if ($quarter_monitor[2] == 'true') {
                                    $checked_3 = 'checked';
                                }

                                if ($quarter_monitor[3] == 'true') {
                                    $checked_4 = 'checked';
                                }

                            @endphp
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(1)"
                                        {{ $checked_1 }} id="first">
                                    <label class="custom-control-label" for="first">(1) <b>First Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(2)"
                                        {{ $checked_2 }} id="second">
                                    <label class="custom-control-label" for="second">(2) <b>Second Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(3)"
                                        {{ $checked_3 }} id="third">
                                    <label class="custom-control-label" for="third">(3) <b>Third Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" {{ $checked_4 }}
                                        onchange="quarter(4)" id="fourth">
                                    <label class="custom-control-label" for="fourth">(4) <b>Fourth Quarter</b></label>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-5">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <center>
                                    <img src="/{{$schools->sc_logo}}" alt="" height="130">
                                    <hr>
                                    <h5 style="letter-spacing: 2px;"><b>{{$schools->sc_name}}</b> <br>
                                    <small>School ID : {{$schools->sc_id}}</small>
                                    </h5>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Students Information</h4>
                                        <div class="nk-block-des">
                                            <p>List of Students are here. Search student information</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Contact Number</th>
                                            <th>Date Created</th>
                                            <th width="50">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $students = Student::where('student_ict_id', $user['id'])->get();
                                        @endphp
                                        @foreach ($students as $rw)
                                            <tr>
                                                <td>
                                                    {{ $rw->student_lname }}, {{ $rw->student_fname }}
                                                    {{ $rw->student_mnme }} {{ $rw->student_extname }}
                                                </td>
                                                <td>{{ $rw->student_gender }}</td>
                                                <td>{{ $rw->student_mobile }}</td>
                                                <td>{{ date_format(date_create($rw->created_at), 'M d. Y h:i A') }}</td>
                                                <td>
                                                    <li>
                                                        <div class="drodown" style="">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger p-0"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="/students/details/{{ $rw->student_id }}">
                                                                            <em class="icon ni ni-eye"></em>
                                                                            <span>View Details</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </td>
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
    </div>

    <script>
        function quarter(type) {
            $.ajax({
                url: '/api/quarter',
                type: 'POST',
                data: {
                    push_type: type
                },
                success: function(data) {
                    console.log(data);
                    //window.location.href = data;
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endsection
