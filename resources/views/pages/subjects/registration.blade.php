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
                        <a class="back-to" href="/subjects">
                            <em class="icon ni ni-arrow-left"></em><span>Back</span>
                        </a>
                    </div>
                    <h3 class="nk-block-title page-title">Create Subject</h3>
                </div>
            </div>
        </div>
        <div class="nk-block ">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner">
                        @if (isset($_GET['s']))
                        <div class="alert alert-success">
                            <b>Success!</b> New Subject Added.
                        </div>
                        @endif
                        <form action="{{ route('create.course') }}" class="pt-2" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label">Select Strand</label>
                                        <div class="form-control-wrap">
                                            <select name="inp_strand" required class="form-select js-select2"
                                                data-placeholder="--">
                                                <option value="">--</option>
                                                @foreach ($strands as $rw)
                                                <option value="{{ $rw->of_id }}">{{ $rw->of_strands }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Grade Level</label>
                                        <div class="d-flex gx-3 mb-3">
                                            <div class="g w-100">
                                                <div class="form-control-wrap">
                                                    <select name="inp_gradelevel" required id="" class="form-control">
                                                        <option value="" selected disabled>--</option>
                                                        <option value="11">Grade 11</option>
                                                        <option value="12">Grade 12</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="full-name">Subject Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" required name="inp_course" class="form-control" id="full-name"
                                        placeholder="e.g. Mathematics">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">Subject Description</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control" name="inp_description" rows="3" name="description"
                                        id="" placeholder="Write Subject Description"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Subject Type</label>
                                        <div class="d-flex gx-3 mb-3">
                                            <div class="g w-100">
                                                <div class="form-control-wrap">
                                                    <select name="inp_type" required id="" class="form-control">
                                                        <option value="" selected disabled>--</option>
                                                        <option value="Applied">Applied</option>
                                                        <option value="Core">Core</option>
                                                        <option value="Specialized">Specialized</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Semester</label>
                                        <div class="d-flex gx-3 mb-3">
                                            <div class="g w-100">
                                                <div class="form-control-wrap">
                                                    <select name="inp_semester" required id="" class="form-control">
                                                        <option value="" selected disabled>--</option>
                                                        <option value="1">1st Semester</option>
                                                        <option value="2">2nd Semester</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-primary">Confirm and Submit</button>
                                    </li>
                                    <li>
                                        <a href="/subjects" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection