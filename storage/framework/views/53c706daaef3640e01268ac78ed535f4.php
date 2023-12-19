<?php $__env->startSection('content'); ?>
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <div class="nk-block-head-sub">
                        <a class="back-to" href="/user">
                            <em class="icon ni ni-arrow-left"></em><span>Back</span>
                        </a>
                    </div>
                    <h3 class="nk-block-title page-title">Students</h3>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="more-options">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-search"></em>
                                        </div>
                                        <input type="text" class="form-control" id="default-04" placeholder="Search by name">
                                    </div>
                                </li>
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Settings</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><span>Copy Invitation link</span></a></li>
                                                <li><a href="#"><span>View Assigned Teachers</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="nk-block-tools-opt">
                                    <a class="btn btn-icon btn-primary d-md-none" data-bs-toggle="modal" href="#student-add"><em class="icon ni ni-plus"></em></a>
                                    <a class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal" href="#student-add"><em class="icon ni ni-plus"></em><span>Send Invitation</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                <div class="nk-tb-col tb-col-md text-center"><span class="sub-text">1st Quarter</span></div>
                                <div class="nk-tb-col tb-col-lg text-center"><span class="sub-text">2nd Quarter</span></div>
                                <div class="nk-tb-col tb-col-lg text-center"><span class="sub-text">3rd Quarter</span></div>
                                <div class="nk-tb-col tb-col-md text-center"><span class="sub-text">4th Quarter</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                            <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <a href="html/lms/students-details.html">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                <span style="text-transform: uppercase">
                                                <?php echo e(Str::substr($rw->student_lname, 0, 1)); ?><?php echo e(Str::substr($rw->student_fname, 0, 1)); ?>

                                                </span>
                                            </div>
                                            <div class="user-info" style="text-transform: uppercase">
                                                <span class="tb-lead">
                                                    <?php echo e($rw->student_lname); ?>, <?php echo e($rw->student_fname); ?> <?php echo e($rw->student_mnme); ?> <?php echo e($rw->student_extname); ?>.
                                                    <small><span class="badge bg-info">/</span></small>
                                                     <span class="dot dot-success d-md-none ms-1"></span>
                                                    </span>
                                                <span>LRN : <?php echo e($rw->student_lrd); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-md text-center">
                                    <b><span class="text-dark">80</span></b>
                                </div>
                                <div class="nk-tb-col tb-col-lg text-center">
                                    <b><span class="text-dark">80</span></b>
                                </div>
                                <div class="nk-tb-col tb-col-lg text-center">
                                    <b><span class="text-dark">80</span></b>
                                </div>
                                <div class="nk-tb-col tb-col-md text-center">
                                    <b><span class="text-dark">80</span></b>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools ">
                                        <li>
                                            <div class="drodown" style="float: right;">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger " data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="html/lms/students-details.html"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </div><!-- .nk-tb-list -->
                    </div>
                </div>
            </div>
        </div><!-- .nk-block -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/pages/teachers/students.blade.php ENDPATH**/ ?>