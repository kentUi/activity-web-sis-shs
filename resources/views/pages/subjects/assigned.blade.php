@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Assign Subject Teachers</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            @if (isset($_GET['s']))
                                @php
                                    $section = session('section');
                                    $subject = session('subject');
                                    $teacher = session('teacher');
                                @endphp
                                <div class="alert alert-success" style="width: 100%;">
                                    <b><em class="icon ni ni-check"></em> {{ $subject->subj_title }}</b> has been assigned
                                    to <b>{{ $teacher->tech_lname }}, {{ $teacher->tech_fname }}</b> in section
                                    <b>{{ $section->sec_name }}</b>
                                </div>
                                <hr>
                            @endif
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Sections</th>
                                        <th>School Year</th>
                                        <th>Subject</th>
                                        <th>Grade Level</th>
                                        <th>Semester</th>
                                        <th width="50">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $user = session('info');
                                    @endphp
                                    @foreach ($response as $rw)
                                        <tr>
                                            <td>{{ $rw->sec_name }}</td>
                                            <td>{{ $rw->sec_schoolyear }}</td>
                                            <td>{{ $rw->subj_title }}</td>

                                            @if ($rw->subj_semester == 1)
                                                <td>1st Semester</td>
                                            @else
                                                <td>2nd Semester</td>
                                            @endif
                                            <td>Grade {{ $rw->subj_gradelevel }}</td>
                                            <td>
                                                <center>
                                                    <li>
                                                        <div class="drodown" style="">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger "
                                                                style="padding: 0" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="#"
                                                                            onclick="assign({{ $rw->sec_id }}, {{ $rw->subj_id }}, {{ $user['schoolid'] }}, {{$rw->subj_semester}})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#assign-teacher">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Assign Teacher</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </center>
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
    <div class="modal fade" role="dialog" id="assign-teacher">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-xl">
                    <h5 class="title">Assign Teacher</h5>
                    <div class="row ">
                        <form action="{{ route('assign.subject') }}" method="POST">
                            @csrf
                            <div id="assgin_teacher"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function assign(id, sid, school, sem) {
            var avg = 0;
            $.ajax({
                url: '/api/assign',
                type: 'POST',
                data: {
                    section: id,
                    subject: sid,
                    school: school,
                    semester: sem
                },
                success: function(data) {
                    $('#assgin_teacher').html(data)
                },
                error: function(err) {
                    $('#assgin_teacher').html(err)
                }
            });
        }
    </script>
@endsection
