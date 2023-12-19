<?php $__env->startSection('content'); ?>
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Manage Sections</h3>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="nk-tb-list nk-tb-ulist">
                            <a class="btn btn-primary d-none d-md-inline-flex"  style="float: right" href="/sections/register"><em class="icon ni ni-plus"></em><span>Create Section</span></a>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Section Name</th>
                                        <th>Grade Level</th>
                                        <th>School Year</th>
                                        <th>Date Created</th>
                                        <th width="50">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($rw->sec_name); ?>

                                            </td>
                                            <td>Grade <?php echo e($rw->sec_grade); ?></td>
                                            <td><?php echo e($rw->sec_schoolyear); ?></td>
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
                            <script>
                                function handleKeyPress(event) {
                                    if (event.keyCode === 13) {
                                        if (event.target.value === "") {
                                            window.location.href = '/sections';
                                        } else {
                                            window.location.href = '/sections/search/' + event.target.value;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\resources\views/pages/sections/list.blade.php ENDPATH**/ ?>