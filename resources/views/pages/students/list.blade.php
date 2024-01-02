@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Manage Students</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                href="/students/register"><em class="icon ni ni-plus"></em><span>Register Student</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Contact Number</th>
                                        <th>Date Created</th>
                                        <th>Grade Level</th>
                                        <th>Assigned Section</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $user = session('info');
                                    @endphp
                                    @foreach ($response as $rw)
                                        @php
                                            if($rw->student_secid != 0){
                                                $section_info = DB::table('t_sections')
                                                ->where('sec_id', $rw->student_secid)
                                                ->get();
                                                $section_level = 'Grade ' . $section_info[0]->sec_grade;
                                                $section_name = $section_info[0]->sec_name;
                                            }else{
                                                $section_level = 'No Assign Section';
                                                $section_name = 'No Assign Section';
                                            }
                                           

                                            $section_list = DB::table('t_sections')
                                                ->where('sec_ict_id', $user['schoolid'])
                                                ->get();
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ $rw->student_lname }}, {{ $rw->student_fname }} {{ $rw->student_mnme }}
                                                {{ $rw->student_extname }}
                                            </td>
                                            <td>{{ $rw->student_gender }}</td>
                                            <td>{{ $rw->student_mobile }}</td>
                                            <td>{{ date_format(date_create($rw->created_at), 'M d. Y h:i A') }}</td>
                                            <td>
                                                 {{ $section_level }}
                                            </td>
                                            <td>
                                                <select name="" id="sec_{{ $rw->student_id }}" onclick="update_section({{ $rw->student_id }}, this.value)" class="form-control form-control-sm">
                                                    <option value="--" disabled selected>{{$section_name}}</option>
                                                    <option value="--" disabled>--</option>
                                                    @foreach ($section_list as $xrw)
                                                        <option value="{{ $xrw->sec_id }}">{{ $xrw->sec_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <script>
                                               
                                            </script>
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
                                                                        href="/generate/137/{{ $rw->student_id }}">
                                                                        <em class="icon ni ni-eye"></em>
                                                                        <span>Generate Form 137</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/students/details/{{ $rw->student_id }}">
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

    <script>
        function update_section(id, section){
            $.ajax({
                url: '/api/section',
                type: 'POST',
                data: { 
                    id: id, 
                    section: section
                },
                success: function(response){
                    document.getElementById('sec_' + id).style.borderColor = 'green';
                }
            });
        }
    </script>
@endsection
