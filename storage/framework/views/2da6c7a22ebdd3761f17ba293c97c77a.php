

<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Assign Subject Teachers</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['s'])): ?>
                                <?php
                                $section = session('section');
                                $subject = session('subject');
                                $teacher = session('teacher');
                                ?>
                                <div class="alert alert-success" style="width: 100%;">
                                    <b><em class="icon ni ni-check"></em> <?php echo e($subject->subj_title); ?></b> has been assigned to <b><?php echo e($teacher->tech_lname); ?>, <?php echo e($teacher->tech_fname); ?></b> in section <b><?php echo e($section->sec_name); ?></b>
                                </div>
                                <hr>
                            <?php endif; ?>
                            <table class="datatable-init table">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>School Year</th>
                                        <th>Subject</th>
                                        <th>Teacher</th>
                                        <th width="50">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($rw->sec_name); ?></td>
                                            <td><?php echo e($rw->sec_schoolyear); ?></td>
                                            <td><?php echo e($rw->subj_title); ?></td>
                                            <td>Grade <?php echo e($rw->subj_gradelevel); ?></td>
                                            <td>
                                                <center>
                                                    <li>
                                                        <div class="drodown" style="">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger "
                                                                style="padding: 0" data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li>
                                                                        <a href="#"
                                                                            onclick="assign(<?php echo e($rw->sec_id); ?>, <?php echo e($rw->subj_id); ?>)"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#assign-teacher">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Assign Teacher</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </center>
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
    <div class="modal fade" role="dialog" id="assign-teacher">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-xl">
                    <h5 class="title">Assign Teacher</h5>
                    <div class="row ">
                        <form action="<?php echo e(route('assign.subject')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div id="assgin_teacher"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function assign(id, sid) {
            var avg = 0;
            $.ajax({
                url: '/api/assign',
                type: 'POST',
                data: {
                    section: id,
                    subject: sid
                },
                success: function(data) {
                    $('#assgin_teacher').html(data)
                },
                error: function(err) {
                    $('#assgin_teacher').html(err)
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/subjects/assigned.blade.php ENDPATH**/ ?>