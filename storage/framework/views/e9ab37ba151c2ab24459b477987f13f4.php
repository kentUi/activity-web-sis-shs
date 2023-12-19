<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/teacher/section/<?php echo e($response[0]->student_secid); ?>">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Student Grades</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="/teacher/attendance/<?php echo e($response[0]->student_secid); ?>/<?php echo e($subjects->subj_id); ?>"
                                                class="btn btn-light bg-white">
                                                <em class="d-none d-sm-inline icon ni ni-edit-alt"></em>
                                                <span>Upload Attendance </span>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="btn btn-success">
                                                <em class="d-none d-sm-inline icon ni ni-check"></em>
                                                <span>Post Grade</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-3">
                        <h6><?php echo e($subjects->subj_title); ?></h6>
                        <p><?php echo e($subjects->subj_description); ?></p>
                    </div>
                </div>
            </div>
            <?php
                $quarter = 1;
                $current_quarter = $quarter;
                use App\Models\Quarter;
                $quarter_data = Quarter::where('q_id', 1)->first();
                $quarter_monitor = [$quarter_data->q_1st, $quarter_data->q_2nd, $quarter_data->q_3rd, $quarter_data->q_4th];
            ?>

            <?php if($quarter_monitor[$current_quarter - 1] == 'false'): ?>
                <div class="alert alert-warning alert-icon mt-2">
                    <em class="icon ni ni-alert-circle"></em>
                    <b>
                        <?php if($current_quarter == 1): ?>
                            1st
                        <?php elseif($current_quarter == 2): ?>
                            2nd
                        <?php elseif($current_quarter == 3): ?>
                            3rd
                        <?php elseif($current_quarter == 4): ?>
                            4th
                        <?php endif; ?>
                        Quarter
                    </b> is not yet ready. If you have concern please contact the
                    <b>ICT Administrator</b>.
                    Thank you.
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="20" class="text-center">#</th>
                                    <th>List of Students</th>
                                    <th width="120" class="text-center">
                                        1st Quarter
                                    </th>
                                    <th width="120" class="text-center">
                                        2nd Quarter
                                    </th>
                                    <th width="120" class="text-center">
                                        Final Grade
                                    </th>
                                    <th width="120" class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 1;
                                ?>
                                <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $grade = 0;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo e($num++); ?>.
                                        </td>
                                        <td>
                                            <a href="#">
                                                <div class="user-card">
                                                    <div class="user-info text-dark" style="text-transform: uppercase">
                                                        <span class="tb-lead">
                                                            <?php echo e($rw->student_lname); ?>, <?php echo e($rw->student_fname); ?>

                                                            <?php echo e($rw->student_mname); ?> <?php echo e($rw->student_extname); ?>.
                                                            <span class="dot dot-success d-md-none ms-1"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <?php
                                            $grade = 0;
                                            $gradex = [];
                                            for ($i = 1; $i <= 4; $i++) {
                                                $grades = DB::table('t_grades')
                                                    ->where('gd_studentid', $rw->student_id)
                                                    ->where('gd_subjid', $subjects->subj_id)
                                                    ->where('gd_secid', $response[0]->student_secid)
                                                    ->where('gd_quarter', $i)
                                                    ->first();

                                                if ($grades) {
                                                    $gradex[$i] = $grades->gd_grade;
                                                }
                                            }

                                            $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1];
                                            $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                            $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                            $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];
                                            
                                            $avg = round(($grade_Q1 + $grade_Q2) / 2);

                                        ?>
                                        <td class="text-center">
                                            <input id="input_<?php echo e($rw->student_id); ?>_1" value="<?php echo e($grade_Q1); ?>"
                                                maxlength="3" max="100" type="number"
                                                onkeyup="uploadGrades(<?php echo e($rw->student_id); ?>, this.value, 1)"
                                                class="form-control text-center" value="0">
                                        </td>
                                        <td class="text-center">
                                            <input id="input_<?php echo e($rw->student_id); ?>_1" value="<?php echo e($grade_Q2); ?>"
                                                maxlength="3" max="100" type="number"
                                                onkeyup="uploadGrades(<?php echo e($rw->student_id); ?>, this.value, 2)"
                                                class="form-control text-center" value="0">
                                        </td>
                                        <td style="padding-top: 15px">
                                            <center>
                                                <b style="font-size: 15px;" class="text-dark">
                                                    <?php echo e($avg); ?>

                                                </b>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <b style="font-size: 21px;" class="text-warning">
                                                    <em class="ni ni-clock"></em>
                                                </b>
                                            </center>
                                        </td>

                                        

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function uploadGrades(id, grade, quarter) {
            //document.getElementById('status_' + id).style.display = 'none';
            var avg = 0;
            $.ajax({
                url: '/api/upload/grades',
                type: 'POST',
                data: {
                    subject_quarter: quarter,
                    student_id: id,
                    student_grade: grade,
                    section_id: <?php echo e($response[0]->student_secid); ?>,
                    subject_id: <?php echo e($subjects->subj_id); ?>,
                },
                success: function(data) {
                    console.log(data);
                    // document.getElementById('input_' + id + '_1').style.borderColor = 'green';
                    // document.getElementById('status_' + id).style.display = 'block';
                    // for (i = 1; i <= 4; i++) {
                    //     avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                    // }

                    // document.getElementById('avg_' + id).innerHTML = avg / 4;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_1').style.borderColor = 'red';
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/teachers/grade.blade.php ENDPATH**/ ?>