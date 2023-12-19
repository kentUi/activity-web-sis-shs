<div class="nk-block-head nk-block-head-lg">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Assgined Subject</h4>
            <div class="nk-block-des">
                <p>View Teachers Subjects</p>
            </div>
        </div>
        <div class="nk-block-head-content align-self-start d-lg-none">
            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                    class="icon ni ni-menu-alt-r"></em></a>
        </div>
    </div>
</div>
<div class="nk-block">
    <table class="datatable-init table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>-</th>
                <th width="50">Tools</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $advisory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($rw->subj_title); ?> </td>
                    <td><small>Grade <?php echo e($rw->sec_grade); ?> / <?php echo e($rw->sec_schoolyear); ?></small></td>
                    <td>
                        <li>
                            <div class="drodown" style="">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger "
                                    data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="/sections/view/<?php echo e($rw->sec_id); ?>" target="_blank">
                                                <em class="icon ni ni-eye"></em>
                                                <span>View Students</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/teachers/details/subjects.blade.php ENDPATH**/ ?>