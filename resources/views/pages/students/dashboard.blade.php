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
                        <h3 class="nk-block-title page-title">Hello! {{ $user['fname'] }}</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
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
                                        {{-- </li>
                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-link"></em><span>Join Class via Code</span></a>
                                    </li>
                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                        <a class="btn btn-icon btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-plus"></em></a>
                                    </li> --}}
                                </ul>
                            </div>
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
                            <div class="card-inner pb-1"
                                style="min-height: 50px;background-image: url(&quot;{{ '/' . $cover[3] }}&quot;); 
                                background-position:center; background-size: cover; padding: 20px;">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="/teacher/students/" class="d-flex align-items-center">
                                        <div class="user-avatar sq course-bg6.png">
                                            <span style="text-transform: uppercase;">
                                                <em class="ni ni-book"></em>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            <b>GRADE {{ $sectionGrade }}</b> ({{ $sectionName }}) <br>
                                            <b>ADVISER : </b>
                                            @if (!empty($adviser))
                                                <b style="color: green; text-transform: uppercase;">{{ $adviser->tech_lname }},
                                                    {{ $adviser->tech_fname }}</b>
                                            @else
                                                <b style="color: red"><i>No Adviser</i></b>
                                            @endif
                                            <br>
                                           <b>SCHOOL YEAR :</b> 2023-2024
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="px-4 pt-2 pb-2 ">
                                <div class="nk-tb-list nk-tb-ulist">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span class="sub-text">List of Students</span></div>
                                        <div class="nk-tb-col tb-col-md text-center"><span class="sub-text">1st
                                                Quarter</span></div>
                                        <div class="nk-tb-col tb-col-lg text-center"><span class="sub-text">2nd
                                                Quarter</span></div>
                                        <div class="nk-tb-col tb-col-lg text-center"><span class="sub-text">3rd
                                                Quarter</span></div>
                                        <div class="nk-tb-col tb-col-md text-center"><span class="sub-text">4th
                                                Quarter</span></div>
                                        <div class="nk-tb-col tb-col-md text-center"><span class="text-dark">Final
                                                Grade</span></div>
                                    </div>

                                    @foreach ($response as $rw)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col">
                                                <a href="#">
                                                    <div class="user-card">
                                                        <div class="user-avatar {{ $box[$num++] }}"
                                                            style="text-transform: uppercase;">
                                                            <span>{{ Str::substr($rw->subj_title, 0, 2) }}</span>
                                                        </div>
                                                        <div class="user-info">
                                                            <span class="tb-lead">{{ $rw->subj_title }} <span
                                                                    class="dot dot-success d-md-none ms-1"></span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            @php
                                                $grade = 0;
                                                $gradex = [];
                                                for ($i = 1; $i <= 4; $i++) {
                                                    $grades = DB::table('t_grades')
                                                        ->where('gd_studentid', $studentid)
                                                        ->where('gd_subjid', $rw->subj_id)
                                                        ->where('gd_secid', $sectionid)
                                                        ->where('gd_quarter', $i)
                                                        ->first();

                                                    if ($grades) {
                                                        $gradex[$i] = $grades->gd_grade;
                                                    }
                                                }

                                                $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1]; 
                                                $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                                $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                                $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];

                                                if(empty($grade_Q1) || empty($grade_Q2) || empty($grade_Q3) || empty($grade_Q4)){
                                                    $avg = 0;
                                                }else{
                                                    $avg = ($grade_Q1 + $grade_Q2 + $grade_Q3 + $grade_Q4) / 4;
                                                }           
                                               
                                            @endphp
                                            <div class="nk-tb-col tb-col-md text-center">
                                                <b><span class="t">{{ $grade_Q1 }}</span></b>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg text-center">
                                                <b><span class="">{{ $grade_Q2 }}</span></b>
                                            </div>
                                            <div class="nk-tb-col tb-col-lg text-center">
                                                <b><span class="">{{ $grade_Q3 }}</span></b>
                                            </div>
                                            <div class="nk-tb-col tb-col-md text-center">
                                                <b><span class="">{{ $grade_Q4 }}</span></b>
                                            </div>
                                            <div class="nk-tb-col tb-col-md text-center">
                                                <b><span class="text-dark">{{ $avg }}</span></b>
                                            </div>
                                        </div>
                                        @php
                                            if ($num == 5) {
                                                $num = 0;
                                            }

                                            if ($bnum == 5) {
                                                $bnum = 0;
                                            }
                                        @endphp
                                    @endforeach
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
