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
                        <h3 class="nk-block-title page-title">Assigned Advisory</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row g-gs">
                    @php
                        $box = ['bg-purple', 'bg-success', 'bg-info', 'bg-danger', 'bg-warning'];
                        $cover = ['course-bg6.png', 'course-bg2.png', 'course-bg.png', 'course-bg4.png', 'course-bg5.png'];
                        $num = 0;
                        $bnum = 0;
                    @endphp
                    <div class="col-sm-12 col-lg-12 col-xxl-12">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="">
                                List of Assigned Sections
                            </div>
                            <div class="px-4 pt-2 pb-2 ">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th width="150">School Year</th>
                                            <th width="150">Grade Level</th>
                                            <th>Section Name</th>
                                            <th width="200">Date Assigned</th>
                                            <th width="50">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($response as $rw)
                                            <tr>
                                                <td>
                                                    {{ $rw->sec_schoolyear }}
                                                </td>
                                                <td>
                                                    Grade {{ $rw->sec_grade }}
                                                </td>
                                                <td>
                                                    {{ $rw->sec_name }}
                                                </td>
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
                                                                    <li><a href="/teacher/advisory/list/{{ $rw->sec_id }}"><em
                                                                                class="icon ni ni-eye"></em><span>View
                                                                                Details</span></a></li>
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
@endsection
