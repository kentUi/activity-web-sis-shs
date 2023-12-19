<div class="card-inner">
    <span class="text-mute">Section : </span> <b><?php echo e($strands[0]->sec_name); ?></b><br>

    <span class="text-mute">Adviser : </span>
    <?php if(!empty($adviser)): ?>
        <b style="color: green"><?php echo e($adviser->tech_lname); ?>,
            <?php echo e($adviser->tech_fname); ?></b>
    <?php else: ?>
        <b style="color: red"><i>No Adviser</i></b>
    <?php endif; ?>
    <br>
    <span class="text-mute">Strand : </span> <b><?php echo e($strands[0]->of_strands); ?></b><br>
    <span class="text-mute">Subject : </span> <b><?php echo e($subject->subj_title); ?></b><br>
    <span class="text-mute">School Year : </span> <b><?php echo e($strands[0]->sec_schoolyear); ?></b><br>
    <hr>
    <?php for($number = 1; $number <= 4; $number++): ?>
        <span class="text-muted">
            (
            <?php if($number == 1): ?>
                1st
            <?php elseif($number == 2): ?>
                2nd
            <?php elseif($number == 3): ?>
                3rd
            <?php elseif($number == 4): ?>
                4th
            <?php endif; ?>
            Quarter
            )
            Subject Teacher :
        </span>

        <?php if(!empty($subject_teacher->tech_id)): ?>
            <?php
                $assign_subject = \App\Models\Assigned::join('t_subjects', 'subj_id', 'ass_subjid')
                    ->join('t_sections', 'sec_id', 'ass_secid')
                    ->join('t_teachers', 'tech_id', 'ass_teacherid')
                    ->where('ass_secid', $strands[0]->sec_id)
                    ->where('ass_subjid', $subject->subj_id)
                    ->where('ass_quarter', $number)
                    ->where('ass_type', 'subject')
                    ->first();

                if ($assign_subject) {
                    echo '<b style="color: green">' . $assign_subject->tech_lname . ',' . $assign_subject->tech_fname . '</b>';
                } else {
                    echo '<b style="color: red"><i>No Assignment</i></b>';
                }
            ?>
        <?php else: ?>
            <b style="color: red"><i>No Assignment</i></b>
        <?php endif; ?>
        <br>
    <?php endfor; ?>

    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Select Quarter</label>
                <select name="inp_quarter" required class="form-control mt-1">
                    <option value="" disabled selected>--</option>
                    
                    <?php for($i = 1; $i <= 4; $i++): ?>
                        <option value="<?php echo e($i); ?>">
                            <?php if($i == 1): ?>
                                1st
                            <?php elseif($i == 2): ?>
                                2nd
                            <?php elseif($i == 3): ?>
                                3rd
                            <?php elseif($i == 4): ?>
                                4th
                            <?php endif; ?>
                            Quarter
                        </option>
                    <?php endfor; ?>
                </select>
                <input type="hidden" name="inp_secid" value="<?php echo e($strands[0]->sec_id); ?>">
                <input type="hidden" name="inp_subjid" value="<?php echo e($subject->subj_id); ?>">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Select Subject Teacher</label>
                <select name="inp_teacherid" required class="form-control mt-1">
                    <option value="" disabled selected>--</option>
                    
                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rw->tech_id); ?>"><?php echo e($rw->tech_lname); ?>,
                            <?php echo e($rw->tech_fname); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <input type="hidden" name="inp_secid" value="<?php echo e($strands[0]->sec_id); ?>">
                <input type="hidden" name="inp_subjid" value="<?php echo e($subject->subj_id); ?>">
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
<?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/subjects/modal/index.blade.php ENDPATH**/ ?>