@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Manage Teachers</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                href="/teachers/register"><em class="icon ni ni-plus"></em><span>Register Teacher</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th>Date Created</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($response as $rw)
                                        <tr>
                                            <td>
                                                {{ $rw->tech_lname }}, {{ $rw->tech_fname }}
                                                {{ $rw->tech_mnme }} {{ $rw->tech_extname }}
                                            </td>
                                            <td>{{ $rw->tech_gender }}</td>
                                            <td>{{ $rw->tech_email }}</td>
                                            <td>{{ $rw->tech_phone }}</td>
                                            <td>{{ date_format(date_create($rw->created_at), 'M d. Y h:i A') }}</td>
                                            <td>
                                                <li>
                                                    <div class="drodown" style="">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger p-0"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="/teacher/details/{{ $rw->tech_id }}">
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
@endsection
