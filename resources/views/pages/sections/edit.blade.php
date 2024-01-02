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
                            <a class="back-to" href="/sections/view/{{ $section->sec_id }}">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Section Details</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            @if (isset($_GET['s']))
                                <div class="alert alert-success">
                                    <b>Success!</b> Section has been updated.
                                </div>
                            @endif
                            <form action="{{ route('section.update') }}" class="pt-2" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Grade Level</label>
                                            <div class="d-flex gx-3 mb-3">
                                                <div class="g w-100">
                                                    <div class="form-control-wrap">
                                                        <select name="inp_gradelevel" id="" class="form-control">
                                                            <option value="{{ $section->sec_grade }}">Grade
                                                                {{ $section->sec_grade }}</option>
                                                            <option value="" disabled>--</option>
                                                            <option value="11">Grade 11</option>
                                                            <option value="12">Grade 12</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">School Year</label>
                                            <div class="d-flex gx-3 mb-3">
                                                <div class="g w-100">
                                                    <div class="form-control-wrap">
                                                        <select name="inp_schoolyear" id="" class="form-control">
                                                            <option value="{{ $section->sec_schoolyear }}">
                                                                {{ $section->sec_schoolyear }}</option>
                                                            <option value="" disabled>--</option>
                                                            @for ($i = date('Y'); $i >= 2020; $i--)
                                                                <option value="{{ $i }}-{{ $i + 1 }}">
                                                                    {{ $i }}-{{ $i + 1 }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Strand</label>
                                            <div class="form-control-wrap">
                                                <select name="inp_strand" class="form-select">
                                                    <option value="{{ $strand->of_id }}">{{ $strand->of_strands }}</option>
                                                    <option value="" disabled>--</option>
                                                    @foreach ($strands as $rw)
                                                        <option value="{{ $rw->of_id }}">{{ $rw->of_strands }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Section Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="inp_course" class="form-control" id="full-name"
                                                    value="{{ $section->sec_name }}" placeholder="e.g. Faithful">
                                                    <input type="hidden" name="id" value="{{ $section->sec_id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="inp_description" rows="3" name="description" id=""
                                            placeholder="Write Section Description"> {{ $section->sec_description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" name="update" class="btn btn-success">
                                            <em class="ni ni-save"></em> &ensp;
                                            Save Changes
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            onclick="confirmation({{ $section->sec_id }}, 'section')" name="delete"
                                            class="btn btn-danger">
                                            <em class="ni ni-trash"></em> &ensp;
                                            Remove Section
                                        </button>
                                    </li>
                                    <li>
                                        <a href="/sections/view/{{ $section->sec_id }}" class="link link-light">Cancel</a>
                                    </li>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
