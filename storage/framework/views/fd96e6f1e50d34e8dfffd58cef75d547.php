

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
                        <h3 class="nk-block-title page-title">List of Students</h3>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-3">
                        <h4 class="text-dark">Section : <span class="text-danger"><?php echo e($sec_name->sec_name); ?></span></h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th width="20" class="text-center">#</th>
                                        <th>List of Students</th>
                                        <th>Gender</th>
                                        <th>Contact Number</th>
                                        <th width="50">Tools</th>
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

                                                                <?php echo e($rw->student_mnme); ?> <?php echo e($rw->student_extname); ?>

                                                                <span class="dot dot-success d-md-none ms-1"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><?php echo e($rw->student_gender); ?></td>
                                            <td>+63 <?php echo e($rw->student_mobile); ?></td>
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
                                                                    <a href="/teacher/students/">
                                                                        <em class="icon ni ni-download-cloud"></em>
                                                                        <span> Generate Form 137</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/teacher/students/">
                                                                        <em class="icon ni ni-download-cloud"></em>
                                                                        <span> Generate Form 138</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </td>
                                            <?php
                                                // $grade = 0;
                                                // $gradex = [];
                                                // for ($i = 1; $i <= 4; $i++) {
                                                //     $grades = DB::table('t_grades')
                                                //         ->where('gd_studentid', $rw->student_id)
                                                //         ->where('gd_secid', $response[0]->student_secid)
                                                //         ->where('gd_quarter', $i)
                                                //         ->first();

                                                //     if ($grades) {
                                                //         $gradex[$i] = $grades->gd_grade;
                                                //     }
                                                // }

                                                // $grade_Q1 = empty($gradex[1]) ? 0 : $gradex[1];
                                                // $grade_Q2 = empty($gradex[2]) ? 0 : $gradex[2];
                                                // $grade_Q3 = empty($gradex[3]) ? 0 : $gradex[3];
                                                // $grade_Q4 = empty($gradex[4]) ? 0 : $gradex[4];

                                                // $avg = ($grade_Q1 + $grade_Q2 + $grade_Q3 + $grade_Q4) / 4;
                                            ?>
                                            
                                            
                                            
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
            var avg = 0;
            $.ajax({
                url: '/api/upload/grades',
                type: 'POST',
                data: {
                    subject_quarter: quarter,
                    student_id: id,
                    student_grade: grade,
                    section_id: <?php echo e($response[0]->student_secid); ?>,
                },
                success: function(data) {
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'green';
                    document.getElementById('status_' + id).style.display = 'block';
                    for (i = 1; i <= 4; i++) {
                        avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                    }

                    document.getElementById('avg_' + id).innerHTML = avg / 4;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_' + quarter).style.borderColor = 'red';
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/teachers/advisorylist.blade.php ENDPATH**/ ?>