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
                        <h3 class="nk-block-title page-title">Manage Strands</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                href="/subjects/register"><em class="icon ni ni-plus"></em><span>Create Strand</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Strand Name</th>
                                        <th>Date Created</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($rw->of_strands); ?>

                                            </td>
                                            <td><?php echo e(date_format(date_create($rw->created_at), 'M d. Y h:i A')); ?></td>
                                            <td>
                                                <li>
                                                    <div class="drodown" style="">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger "
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li>
                                                                    <a href="/sections/view/<?php echo e($rw->sec_id); ?>">
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\shs_sis_laravel_html\resources\views/pages/strands/list.blade.php ENDPATH**/ ?>