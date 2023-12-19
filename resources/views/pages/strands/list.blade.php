@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/user">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Manage Strands</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                href="/strand/register"><em class="icon ni ni-plus"></em><span>Create Strand</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Strand Name</th>
                                        <th>Date Created</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($response as $rw)
                                        <tr>
                                            <td>
                                                {{ $rw->of_strands }}
                                            </td>
                                            <td>{{ date_format(date_create($rw->created_at), 'M d. Y h:i A') }}</td>
                                            <td>
                                                <li>
                                                    <div class="drodown" style="">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger "
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="/strand/details/{{ $rw->of_id }}">
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
