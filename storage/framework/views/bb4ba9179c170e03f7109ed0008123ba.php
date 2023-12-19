

<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="/teacher/students/<?php echo e($response[0]->student_secid); ?>/<?php echo e($subjects->subj_id); ?>/<?php echo e($quarter); ?>">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Student Attendance</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-1">
                        <table class="table table-bordered" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>List of Students</th>
                                    <?php for($i = 1; $i <= date('m'); $i++): ?>
                                        <?php
                                            $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            $formattedDate = date('Y-m-d', strtotime("Y-$i-$day"));
                                            $month = date_format(date_create(date("Y-$i-$day")), 'M.');
                                        ?>
                                        <th class="text-center" style="width: 50px">
                                            <?php echo e($month); ?>

                                        </th>
                                    <?php endfor; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 1;
                                ?>
                                <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($num++); ?>.</td>
                                        <td>
                                            <?php echo e($rw->student_lname); ?>, <?php echo e($rw->student_fname); ?>

                                            <?php echo e($rw->student_mnme); ?> <?php echo e($rw->student_extname); ?>

                                        </td>
                                        <?php for($i = 1; $i <= date('m'); $i++): ?>
                                            <td style="padding: 0;">
                                                <input type="number" placeholder="0" class="form-control text-center"
                                                    style="border: none; border-bottom: 2px solid #eee;">
                                            </td>
                                        <?php endfor; ?>
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
            document.getElementById('status_' + id).style.display = 'none';
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
                    document.getElementById('input_' + id + '_1').style.borderColor = 'green';
                    document.getElementById('status_' + id).style.display = 'block';
                    for (i = 1; i <= 4; i++) {
                        avg = Number(avg) + Number(document.getElementById('input_' + id + '_' + i).value);
                    }

                    document.getElementById('avg_' + id).innerHTML = avg / 4;
                },
                error: function(err) {
                    document.getElementById('input_' + id + '_1').style.borderColor = 'red';
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/teachers/attendance.blade.php ENDPATH**/ ?>