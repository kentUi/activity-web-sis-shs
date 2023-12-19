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
                            <a class="back-to" href="/strands">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Strand Details</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            @if(isset($_GET['u']))
                            <div class="alert alert-success">
                                <b>Success!</b> Strand has been updated.
                            </div>
                            @endif
                            <form action="{{ route('strand.update') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Strad Code Name</label>
                                            <input name="inp_code" type="text" class="form-control" id="full-name"
                                                value="{{$data->of_code}}" placeholder="Ex: ABM, STEM, etc..">
                                                <input type="hidden" value="{{$data->of_id}}" name="inp_id">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Strand Description</label>
                                            <input name="inp_name" type="text" class="form-control" id="display-name"
                                                value="{{$data->of_strands}}" placeholder="Enter Description here..">
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="col-md-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-success">Save Changes</button>
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
