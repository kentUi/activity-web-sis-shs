<?php
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Welcome! <?php echo e($user['fname']); ?> <?php echo e($user['lname']); ?></h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="#"
                                                class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">School Year</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>S.Y : 2023-2024</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row g-gs">
                    <div class="col-md-3">
                        <div class="card is-dark h-100">
                            <div class="nk-ecwg nk-ecwg1">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Total Students</h6>
                                        </div>
                                    </div>
                                    <?php
                                        use App\Models\Student;
                                        use App\Models\Teacher;
                                        $teacher = Teacher::where('tech_ict_id', $user['id'])->first();
                                        $student = Student::where('student_ict_id', $user['id'])->first();
                                    ?>
                                    <div class="data">
                                        <div class="amount"><?php echo e($student->count()); ?></div>
                                    </div>
                                    <div class="data">
                                        <h6 class="sub-title">Teachers</h6>
                                        <div class="data-group">
                                            <div class="amount"><?php echo e($teacher->count()); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-ecwg -->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="/teacher/students/" class="d-flex align-items-center">
                                        <div class="user-avatar sq bg-primary">
                                            <span style="text-transform: uppercase;">
                                                <em class="ni ni-folder"></em>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            Control Each Quarter here.
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                                use App\Models\Quarter;
                                $quarter_data = Quarter::where('q_id', 1)->first();
                                $quarter_monitor = [$quarter_data->q_1st, $quarter_data->q_2nd, $quarter_data->q_3rd, $quarter_data->q_4th];

                                $checked_1 = '';
                                $checked_2 = '';
                                $checked_3 = '';
                                $checked_4 = '';

                                if ($quarter_monitor[0] == 'true') {
                                    $checked_1 = 'checked';
                                }

                                if ($quarter_monitor[1] == 'true') {
                                    $checked_2 = 'checked';
                                }

                                if ($quarter_monitor[2] == 'true') {
                                    $checked_3 = 'checked';
                                }

                                if ($quarter_monitor[3] == 'true') {
                                    $checked_4 = 'checked';
                                }

                            ?>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(1)"
                                        <?php echo e($checked_1); ?> id="first">
                                    <label class="custom-control-label" for="first">(1) <b>First Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(2)"
                                        <?php echo e($checked_2); ?> id="second">
                                    <label class="custom-control-label" for="second">(2) <b>Second Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" onchange="quarter(3)"
                                        <?php echo e($checked_3); ?> id="third">
                                    <label class="custom-control-label" for="third">(3) <b>Third Quarter</b></label>
                                </div>
                            </div>
                            <div class="px-4 pt-0 pb-0 ">
                                <div class="custom-control custom-switch checked mt-2">
                                    <input type="checkbox" class="custom-control-input" <?php echo e($checked_4); ?>

                                        onchange="quarter(4)" id="fourth">
                                    <label class="custom-control-label" for="fourth">(4) <b>Fourth Quarter</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <center>
                                    <img src="/deped seal.webp" alt="" height="130">
                                    <hr>
                                    <h5 style="letter-spacing: 2px;">SCHOOL YEAR : <b>2023-2024</b></h5>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Students Information</h4>
                                        <div class="nk-block-des">
                                            <p>List of Students are here. Search student information</p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Contact Number</th>
                                            <th>Date Created</th>
                                            <th width="50">Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $students = Student::where('student_ict_id', $user['id'])->get();
                                        ?>
                                        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($rw->student_lname); ?>, <?php echo e($rw->student_fname); ?>

                                                    <?php echo e($rw->student_mnme); ?> <?php echo e($rw->student_extname); ?>

                                                </td>
                                                <td><?php echo e($rw->student_gender); ?></td>
                                                <td><?php echo e($rw->student_mobile); ?></td>
                                                <td><?php echo e(date_format(date_create($rw->created_at), 'M d. Y h:i A')); ?></td>
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
                                                                        <a href="/students/details/<?php echo e($rw->student_id); ?>">
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function quarter(type) {
            $.ajax({
                url: '/api/quarter',
                type: 'POST',
                data: {
                    push_type: type
                },
                success: function(data) {
                    console.log(data);
                    //window.location.href = data;
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/ict/dashboard.blade.php ENDPATH**/ ?>