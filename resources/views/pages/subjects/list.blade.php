@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Manage Subjects</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">

                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <ul class="nav nav-tabs">

                                @php
                                    use App\Models\Strand;
                                    use App\Models\Subject;

                                    $user = session('info');
                                    $sid = $user['schoolid'];

                                    $strands = new Strand();
                                    $strand_list = $strands::where('of_schoolid', $sid)->get();

                                    $num = 1;
                                    $num_1 = 1;

                                @endphp
                                @foreach ($strand_list as $item)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $num++ == 1 ? 'active' : '' }}" data-bs-toggle="tab"
                                            href="#tabItem{{ $item->of_id }}">
                                            {{ $item->of_strands }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                            @foreach ($strand_list as $item)
                                    <div class="tab-pane {{ $num_1++ == 1 ? 'active' : '' }}"
                                        id="tabItem{{ $item->of_id }}">
                                        <br>
                                        <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                            href="/subject/register"><em class="icon ni ni-plus"></em><span>Create
                                                Subject</span>
                                        </a>
                                        {{-- <select name="" id="" onclick="window.location.href = 'subjects' + this.value" class="form-select" style="float: right; width: 150px; margin-right: 10px">
                                            <option value="" selected disabled>-- Options --</option>
                                            <option value="?grade=11&sem=1">Grade 11 | 1st Semester</option>
                                            <option value="?grade=11&sem=2">Grade 11 | 2nd Semester</option>
                                            <option value="?grade=12&sem=1">Grade 12 | 1st Semester</option>
                                            <option value="?grade=12&sem=2">Grade 12 | 2nd Semester</option>
                                        </select> --}}
                                        <table id="example" class="datatable-init table">
                                            <thead>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Grade Level</th>
                                                    <th>Semester</th>
                                                    <th>Date Created</th>
                                                    <th width="50">Tools</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $subjects = new Subject();
                                                    $response = $subjects
                                                        ::where('subj_schoolid', $sid)
                                                        ->where('subj_strand', $item->of_id)
                                                        ->join('t_strands', 'of_id', 'subj_strand')
                                                        ->orderBy('subj_title', 'ASC')
                                                        ->get();
                                                @endphp
                                                @foreach ($response as $rw)
                                                    <tr>
                                                        <td>
                                                            {{ $rw->subj_title }}
                                                        </td>
                                                        <td>Grade {{ $rw->subj_gradelevel }}</td>
                                                        @if ($rw->subj_semester == 1)
                                                            <td>{{ $rw->subj_semester }}st Semester</td>
                                                        @else
                                                            <td>{{ $rw->subj_semester }}nd Semester</td>
                                                        @endif
                                                        <td>{{ date_format(date_create($rw->created_at), 'M d. Y h:i A') }}
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
                                                                                <a
                                                                                    href="/subject/view/{{ $rw->subj_id }}">
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
                            @endforeach
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
