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
                            <a class="back-to" href="/students">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Register Students</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            @if (isset($_GET['s']))
                                <div class="alert alert-success">
                                    <b>Success!</b> New Student Added.
                                </div>
                            @endif
                            <form action="{{ route('student.confirm') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="full-name">Learner Reference Number (LRN) </label>
                                    <input required name="inp_lrn" type="text" class="form-control" id="full-name"
                                        value="" placeholder="Enter Learner Reference Number here..">
                                </div>
                                <div class="row gy-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">First Name</label>
                                            <input required name="inp_fname" type="text" class="form-control" id="full-name"
                                                value="" placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Last Name</label>
                                            <input required name="inp_lname" type="text" class="form-control" id="display-name"
                                                value="" placeholder="Enter Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Middle Name <small>(Optional)</small></label>
                                            <input name="inp_mname" type="text" class="form-control" id="display-name"
                                                placeholder="Enter Middle name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Extension Name <small>(Optional)</small></label>
                                            <input name="inp_extname" type="text" class="form-control" id="display-name"
                                                placeholder="Enter Extension name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="form-control-wrap">
                                                <select required name="inp_gender" class="form-select js-select2"
                                                    data-placeholder="Select multiple options">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Date of Birth</label>
                                            <input required name="inp_birth" type="text" class="form-control date-picker"
                                                id="birth-day" value="{{ date('m/d/Y') }}" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Email Address (<i>Username</i>)</label>
                                            <input required name="inp_email" type="text" class="form-control" id="phone-no"
                                                value="" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number </label>
                                            <input required name="inp_mobile" type="text" class="form-control" id="phone-no"
                                                value="" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label">Assign Section</label>
                                            <div class="form-control-wrap">
                                                <select required name="inp_section" id="inp_section" class="form-control"
                                                    data-placeholder="--">
                                                    <option value="0" selected>--</option>
                                                    @foreach ($response as $rw)
                                                        <option value="{{ $rw->sec_id }}">{{ $rw->sec_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if (isset($_GET['section']))
                                            <script>
                                                document.getElementById('inp_section').value = "{{ $_GET['section'] }}";
                                            </script>
                                        @endif
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Complete Address <small>(Optional)</small></label>
                                            <input name="inp_address" type="text" class="form-control"
                                                placeholder="Enter Complete Address here..">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-primary">Confirm and Submit</button>
                                            </li>
                                            <li>
                                                <a href="/user" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
