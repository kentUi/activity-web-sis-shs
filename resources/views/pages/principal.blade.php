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
                            <h3 class="nk-block-title page-title">School Information</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                            <div class="card-inner">
                                @if (isset($_GET['s']))
                                    <div class="alert alert-success">
                                        <b>Success!</b> New School Added.
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('update.school') }}" autocomplete="off"
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
                                                        name="inp_id" value="{{$schools->sc_id}}" required id="default-01" placeholder="Write here..">
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
                                                        name="inp_name" value="{{$schools->sc_name}}" required id="default-01" placeholder="Write here..">
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
                                                        name="inp_region" required id="default-01" value="{{$schools->sc_region}}"
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
                                                        name="inp_address" required id="default-01" value="{{$schools->sc_address}}"
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
                                                        name="inp_principal" required id="default-01" value="{{$schools->sc_principal}}"
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
                                                    <input type="text" class="form-control form-control-lg" value="{{$schools->sc_pr_rank}}"
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
                                                class="form-control form-control-lg" name="inp_logo"
                                                id="default-01" placeholder="Enter your mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Update Information</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
