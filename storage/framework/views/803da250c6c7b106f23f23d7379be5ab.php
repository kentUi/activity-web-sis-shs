<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Manage Subjects</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                href="/subject/register"><em class="icon ni ni-plus"></em><span>Create Subject</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Subject Name</th>
                                        <th>Grade Level</th>
                                        <th>Date Created</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($rw->subj_title); ?>

                                            </td>
                                            <td>Grade <?php echo e($rw->subj_gradelevel); ?></td>
                                            <td><?php echo e(date_format(date_create($rw->created_at), 'M d. Y h:i A')); ?></td>
                                            <td>
                                                <li>
                                                    <div class="drodown" style="">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger p-0"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="/subject/view/<?php echo e($rw->subj_id); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/subjects/list.blade.php ENDPATH**/ ?>