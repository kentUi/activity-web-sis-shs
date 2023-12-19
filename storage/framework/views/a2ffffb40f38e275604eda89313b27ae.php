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
                    <h3 class="nk-block-title page-title">Manage Subjects</h3>
                </div>
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
                                        <input type="text" onkeypress="handleKeyPress(event)" class="form-control" id="default-04" placeholder="Search by section">
                                    </div>
                                </li>
                                <li class="nk-block-tools-opt">
                                    <a class="btn btn-icon btn-danger d-md-none" href="/subjects/register"><em class="icon ni ni-plus"></em></a>
                                    <a class="btn btn-danger d-none d-md-inline-flex"  href="/subjects/register"><em class="icon ni ni-plus"></em><span>Create Subject</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">List of Subjects</span></div>
                                <div class="nk-tb-col tb-col-lg text-right"><span class="sub-text">Grade Level</span></div>
                                <div class="nk-tb-col tb-col-lg text-right"><span class="sub-text">Date Created</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <a href="#">
                                        <div class="user-card">
                                            <div class="user-avatar bg-danger">
                                                <span style="text-transform: uppercase">
                                                <?php echo e(Str::substr($rw->subj_title, 0, 1)); ?>

                                                </span>
                                            </div>
                                            <div class="user-info" style="text-transform: uppercase">
                                                <span class="tb-lead">
                                                    <?php echo e($rw->subj_title); ?>

                                                    
                                                     <span class="dot dot-success d-md-none ms-1"></span>
                                                    </span>
                                                <span><?php echo e($rw->of_strands); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="nk-tb-col tb-col-lg text-right">
                                    <b><span class="text-dark">Grade <?php echo e($rw->subj_gradelevel); ?></span></b>
                                </div>
                                <div class="nk-tb-col tb-col-lg text-right">
                                    <b><span class="text-dark"><?php echo e(date_format(date_create($rw->created_at), 'M d. Y h:i A')); ?></span></b>
                                </div>
                                <div class="nk-tb-col nk-tb-col-tools ">
                                        <li>
                                            <div class="drodown" style="">
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
                            <script>
                                function handleKeyPress(event) {
                                    if (event.keyCode === 13) {
                                        if (event.target.value === "") {
                                            window.location.href = '/subjects';
                                        } else {
                                            window.location.href = '/subjects/search/' + event.target.value;
                                        }
                                    }
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/subjects/list.blade.php ENDPATH**/ ?>