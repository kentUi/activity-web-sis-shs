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
                    <div class="nk-block-head-sub">
                        <a class="back-to" href="/sections/view/{{ $secid }}">
                            <em class="icon ni ni-arrow-left"></em><span>Back</span>
                        </a>
                    </div>
                    <h3 class="nk-block-title page-title">Import Students</h3>
                </div>
                <div class="nk-block-head-content">
                    <a href="{{ asset('source/template.xlsx') }}" download class="btn btn-primary"><em
                            class="icon ni ni-linux-server"></em><span>Download Template</span>
                    </a>
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
                        <div class="card-inner pb-1" style="min-height: 50px; 
                                background-position:center; background-size: cover; padding: 20px;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <a href="/teacher/students/" class="d-flex align-items-center">
                                    <div class="user-avatar sq bg-success">
                                        <span style="text-transform: uppercase;">
                                            <em class="ni ni-download"></em>
                                        </span>
                                    </div>
                                    <div class="ms-3">

                                    </div>

                                </a>
                            </div>
                        </div>

                        <div class="p-4">

                            <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="file" required name="excel_file" class="form-control"
                                            id="customFile">
                                        <input type="hidden" name="secid" value="{{ $secid }}">
                                        <!-- <label class="form-file-label" for="xcustomFile">Choose file</label> -->
                                        <!-- <div class="form-groupx">
                                                <div class="form-control-wrapx">
                                                    <div class="form-filex">
                                                        
                                                    </div>
                                                </div>
                                            </div> -->
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                            <em class="ni ni-download-cloud"></em>&ensp; Import Students
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            @if (isset($_GET['s']))
                            <div class="alert alert-success">
                                <b><em class="ni ni-check-circle"></em> Success!</b> New Student Added.
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="20">#</td>
                                        <td>Student Name</td>
                                        <td>Gender</td>
                                        <td>Contact No.</td>
                                        <td>Email Address</td>
                                        <td width="120" class="text-center">-</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $list = session('imported');
                                    @endphp
                                    @for ($i = 6; $i <= count($list); $i++) 
                                        @if(!empty($list[$i]['student_lname']))
                                        <tr>
                                        <td>{{ $i }}.</td>
                                        <td>
                                            {{ $list[$i]['student_lname'] }}, {{ $list[$i]['student_fname'] }}
                                            {{ $list[$i]['student_mname'] }} {{ $list[$i]['student_extname'] }}.
                                        </td>
                                        <td>{{ $list[$i]['student_gender'] }}</td>
                                        <td>{{ $list[$i]['student_mobile'] }}</td>
                                        <td>{{ $list[$i]['student_email'] }}</td>
                                        <td>
                                            @if ($list[$i]['status'] == 'Saved')
                                            <b class="text-success"><em class="ni ni-user-check"></em>
                                                {{ $list[$i]['status'] }}</b>
                                            @else
                                            <b class="text-danger"><em class="ni ni-user-remove"></em>
                                                {{ $list[$i]['status'] }}</b>
                                            @endif
                                        </td>
                                        </tr>
                                        @endif
                                        @endfor
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection