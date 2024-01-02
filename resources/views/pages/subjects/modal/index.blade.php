<div class="card-inner">
    <span class="text-mute">Section : </span> <b>{{ $strands[0]->sec_name }}</b><br>

    <span class="text-mute">Adviser : </span>
    @if (!empty($adviser))
        <b style="color: green">{{ $adviser->tech_lname }},
            {{ $adviser->tech_fname }}</b>
    @else
        <b style="color: red"><i>No Adviser</i></b>
    @endif
    <br>
    <span class="text-mute">Strand : </span> <b>{{ $strands[0]->of_strands }}</b><br>
    <span class="text-mute">Subject : </span> <b>{{ $subject->subj_title }}</b><br>
    <span class="text-mute">School Year : </span> <b>{{ $strands[0]->sec_schoolyear }}</b><br>
    <hr>
    @for ($number = 1; $number <= 4; $number++)
        @if (!empty($subject_teacher->tech_id))
            @php
                $assign_subject = \App\Models\Assigned::join('t_subjects', 'subj_id', 'ass_subjid')
                    ->join('t_sections', 'sec_id', 'ass_secid')
                    ->join('t_teachers', 'tech_id', 'ass_teacherid')
                    ->where('ass_secid', $strands[0]->sec_id)
                    ->where('ass_subjid', $subject->subj_id)
                    ->where('ass_quarter', $number)
                    ->where('ass_type', 'subject')
                    ->first();

                if ($assign_subject) {
                    if ($number == 1) {
                        $quarter = '1st';
                    } elseif ($number == 2) {
                        $quarter = '2nd';
                    } elseif ($number == 3) {
                        $quarter = '3rd';
                    } elseif ($number == 4) {
                        $quarter = '4th';
                    }
                    echo '<span class="text-muted">( ' . $quarter . ' Quarter ) Subject Teacher :</span><b style="color: green">' . $assign_subject->tech_lname . ',' . $assign_subject->tech_fname . '</b><br>';
                } else {
                    // echo '<b style="color: red"><i>No Assignment</i></b>';
                }
            @endphp
        @else
            {{-- <b style="color: red"><i>No Assignment</i></b> --}}
        @endif
    @endfor

    <hr>
    <div class="row">
        <div class="col-md-4" style="display: none;">
            <div class="form-group">
                <label for="">Select Semester</label>
                <select name="semester" required class="form-control mt-1">
                    @if ($semester == 1)
                        <option value="1st" selected>1st Semester</option>
                    @else
                        <option value="2nd" selected>2nd Semester</option>
                    @endif

                </select>
                <input type="hidden" name="inp_secid" value="{{ $strands[0]->sec_id }}">
                <input type="hidden" name="inp_subjid" value="{{ $subject->subj_id }}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Select Subject Teacher</label>
                <select name="inp_teacherid" required class="form-control mt-1">
                    <option value="" disabled selected>--</option>
                    {{-- <option value="0">(No Subject Teacher)</option> --}}
                    @foreach ($teachers as $rw)
                        <option value="{{ $rw->tech_id }}">{{ $rw->tech_lname }},
                            {{ $rw->tech_fname }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="inp_secid" value="{{ $strands[0]->sec_id }}">
                <input type="hidden" name="inp_subjid" value="{{ $subject->subj_id }}">
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <button class="btn btn-round btn-primary" style="width: 100%">
            <em class="icon ni ni-save"></em>
            <span>Assign</span>
        </button>
    </div>
</div>
</div>
