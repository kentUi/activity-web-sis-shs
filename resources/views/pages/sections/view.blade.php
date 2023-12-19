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
                            <a class="back-to" href="/sections">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">View Details</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="#"
                                                class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">
                                                <em class="d-none d-sm-inline icon ni ni-setting"></em>
                                                <span>Settings</span> </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">                                                    
                                                    <li>
                                                        <a href="/students/register?section={{ $strands[0]->sec_id }}">
                                                            <em class="d-none d-sm-inline icon ni ni-plus"></em> <span>
                                                                Add Student
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/sections/edit/{{ $strands[0]->sec_id }}">
                                                            <em class="d-none d-sm-inline icon ni ni-edit"></em> <span>
                                                                Edit Section
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/sections/import/{{ $strands[0]->sec_id }}">
                                                            <em class="d-none d-sm-inline icon ni ni-download"></em>
                                                            <span>Import Students</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .toggle-wrap -->
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row">

                    <div class="col-md-7">
                        <div class="card" style="min-height: 425px">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Section Information</h4>
                                            <div class="nk-block-des">
                                                <p>Basic information, like your students and subjects.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="nk-data data-list" style="width: 100%">
                                        <div class="data-head">
                                            <h6 class="overline-title">Details</h6>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Section</span>
                                                <span class="data-value">{{ $strands[0]->sec_name }}</span>
                                            </div>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Description</span>
                                                <span class="data-value">{{ $strands[0]->sec_description }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <h1 class="text-center">
                                        {{ $count }}
                                    </h1>
                                    <p class="text-center">Total Students</p>
                                    <hr>
                                    <span class="text-mute">Section : </span> <b>{{ $strands[0]->sec_name }}</b><br>

                                    <span class="text-mute">Adviser : </span>
                                    @if (!empty($adviser))
                                        <b style="color: green">{{ $adviser->tech_lname }},
                                            {{ $adviser->tech_fname }}</b>
                                    @else
                                        <b style="color: red"><i>No Adviser</i></b>
                                    @endif

                                    <br>
                                    <span class="text-mute">Strand : </span> <b>{{ $strands[0]->of_strands }}</b>
                                    <hr> 
                                    <div class="row">
                                        <form action="{{ route('teacher.assign') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Assign Adviser</label>
                                                <select name="inp_teacherid" id="" class="form-control mt-1">
                                                    <option value="" disabled selected>--</option>
                                                    @foreach ($teachers as $rw)
                                                        <option value="{{ $rw->tech_id }}">{{ $rw->tech_lname }},
                                                            {{ $rw->tech_fname }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="inp_secid" value="{{ $strands[0]->sec_id }}">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-round btn-primary" style="width: 100%">
                                                    <em class="icon ni ni-save"></em>
                                                    <span>Assign Adviser</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="card">
                            <div class="card-inner-group">
                                <div class="card-inner">
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
                                                <th>LRN</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Email Address</th>
                                                <th>Contact Number</th>
                                                <th width="50">Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $rw)
                                                <tr>
                                                    <td>{{ $rw->student_lrd }}</td>
                                                    <td>
                                                        {{ $rw->student_lname }}, {{ $rw->student_fname }}
                                                        {{ $rw->student_mnme }} {{ $rw->student_extname }}
                                                    </td>
                                                    <td>{{ $rw->student_gender }}</td>
                                                    <td>{{ $rw->student_email }}</td>
                                                    <td>{{ $rw->student_mobile }}</td>
                                                    </td>
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
                                                                            <a target="_blank"
                                                                                href="/students/details/{{ $rw->student_id }}">
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
    @endsection
