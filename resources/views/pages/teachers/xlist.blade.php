@extends('layout.main')

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">

                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Transaction List - Compact</h4>
                            <p>Subject : <code>.is-compact</code> Section :<code>.table-tranx</code>
                            </p>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <table class="table table-tranx is-compact">
                            <thead>
                                <tr class="tb-tnx-head">
                                    <th class="tb-tnx-id text-center" width="80"><span class="">#</span></th>
                                    <th class="tb-tnx-id" width="100"><span class="">ID
                                            Number</span></th>
                                    <th class="tb-tnx-info">
                                        <span class="tb-tnx-desc d-none d-sm-inline-block">
                                            <span>Students</span>
                                        </span>
                                    </th>
                                    <th class="tb-tnx-id" width="150"><span class="">Mobile
                                            Number</span></th>
                                    <th class="tb-tnx-amount" width="150">
                                        <span class="tb-tnx-total text-center">Grade</span>
                                        <span class="tb-tnx-status d-none d-md-inline-block text-center">Status</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Grade;
                                    $grade = new Grade();
                                    $box = ['bg-purple', 'bg-warning', 'bg-success', 'bg-info', 'bg-danger'];
                                    $num = 0;
                                @endphp
                                @foreach ($response as $rw)
                                    <tr class="tb-tnx-item">
                                        <td class="tb-tnx-id">
                                            <center>
                                                <a href="#">
                                                    <div class="user-avatar {{ $box[$num++] }}">
                                                        <span style="text-transform: uppercase;">
                                                            {{ Str::substr($rw->student_fname, 0, 1) }}{{ Str::substr($rw->student_lname, 0, 1) }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </center>
                                        </td>
                                        <td class="tb-tnx-id">
                                            <a href="#">
                                                <span>{{ $rw->student_id }}</span>
                                            </a>
                                        </td>
                                        <td class="tb-tnx-info">
                                            <div class="tb-tnx-desc">
                                                <span class="title" style="text-transform: uppercase;">
                                                    {{ $rw->student_lname }},
                                                    {{ $rw->student_fname }}
                                                    {{ Str::substr($rw->student_mname, 0, 1) }}.</span>
                                            </div>
                                        </td>
                                        <td class="tb-tnx-id">
                                            {{ $rw->student_mobile }}
                                        </td>
                                        @php
                                            $grade = '';
                                            $status = '<span id="status_' . $rw->student_id . '"><span class="badge badge-dot text-warning">Pending</span></span>';
                                            $grades = DB::table('t_grades')
                                                ->where('gd_studentid', $rw->student_id)
                                                ->where('gd_subjstrandid', $rw->en_strandid)
                                                ->where('gd_teacherid', $rw->ass_teacherid)
                                                ->where('gd_quarter', $rw->ass_quarter)
                                                ->first();

                                            if ($grades) {
                                                $grade = $grades->gd_grade;
                                                $status = '<span id="status_' . $rw->student_id . '"><span class="badge badge-dot text-success">Saved</span></span>';
                                            }
                                        @endphp

                                        <td class="tb-tnx-amount">
                                            <div class="tb-tnx-total">
                                                <center>
                                                    <input type="number" class="form-control"
                                                        style="text-align: center; width: 50%" placeholder="--"
                                                        value="{{ $grade }}" maxlength="3" max="100"
                                                        type="number"
                                                        onkeyup="uploadGrade({{ $rw->student_id }}, this.value)" />
                                                </center>
                                            </div>
                                            <div class="tb-tnx-status text-center">
                                                <?= $status ?>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        if ($num == 4) {
                                            $num = 0;
                                        }
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
