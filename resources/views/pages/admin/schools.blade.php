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

                        @if (isset($_GET['register']))
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/admin/schools">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">Register School</h3>
                            @elseif (isset($_GET['ict']))
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/admin/schools">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">School ICT`s</h3>
                        @else
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/user">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">List of School</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        @if (isset($_GET['register']))
                            <div class="card-inner">
                                @if (isset($_GET['s']))
                                    <div class="alert alert-success">
                                        <b>Success!</b> New School Added.
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('register.school') }}" autocomplete="off"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School ID <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_id" required id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School Name <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_name" required id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Region <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_region" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School Address <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_address" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Principal Complete name <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_principal" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Principal Rank <small>(Optional)</small></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_rank"  id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">School Logo <b
                                                    class="text-danger">*</b></label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="file" accept=".png, .PNG, .jpg, .JPEG, .JPG"
                                                class="form-control form-control-lg" name="inp_logo" required
                                                id="default-01" placeholder="Enter your mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Submit Registration</button>
                                    </div>
                                </form>
                            </div>
                        @elseif (isset($_GET['ict']))
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>School ID</th>
                                            <th>Complete name</th>
                                            <th>Mobile No.</th>
                                            <th>Username / Email Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $rw)
                                            <tr>
                                                <td>{{ $rw->user_schoolid}}</td>
                                                <td>{{ $rw->user_lname}}, {{ $rw->user_fname}}</td>
                                                <td>{{ $rw->user_mobile}}</td>
                                                <td>{{ $rw->email}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card-inner">
                                <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                    href="/admin/schools?register"><em class="icon ni ni-plus"></em><span>Register
                                        School</span></a>
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>School ID</th>
                                            <th>School Name</th>
                                            <th>School Region</th>
                                            <th>School Address</th>
                                            <th width="100">
                                                <center>...</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $rw)
                                            <tr>
                                                <td>{{ $rw->sc_id }}</td>
                                                <td>{{ $rw->sc_name }}</td>
                                                <td>{{ $rw->sc_region }}</td>
                                                <td>{{ $rw->sc_address }}</td>
                                                <td>
                                                    <center>
                                                        <a href="/admin/schools?ict&id={{$rw->sc_id}}" class="btn btn-info btn-xs">
                                                            <em class="icon ni ni-eye"></em>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
