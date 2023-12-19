

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
                        <h3 class="nk-block-title page-title">Generate Form 137</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="#"
                                                class="dropdown-toggle btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">
                                                <em class="d-none d-sm-inline icon ni ni-download"></em>
                                                <span>Generate All Form 137</span> </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>List of Students</th>
                                        <th width="250" class="">Date Registered</th>
                                        <th width="250" class="text-center">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $grade = 0;
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <div class="user-card">
                                                        <div class="user-avatar bg-primary">
                                                            <span style="text-transform: uppercase">
                                                                <?php echo e(Str::substr($rw->student_lname, 0, 1)); ?><?php echo e(Str::substr($rw->student_fname, 0, 1)); ?>

                                                            </span>
                                                        </div>
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
                                            <td class="">
                                                <?php echo e(date_format(date_create( $rw->updated_at), 'F d, Y h:i A')); ?>

                                            </td>
                                            <td class="text-center">
                                                <a href="/generate/137" target="_blank" class="btn btn-sm btn-primary">Generate</a>
                                                <a href="" class="btn btn-sm btn-warning">Attendance</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/teachers/form-137.blade.php ENDPATH**/ ?>