<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/user">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">Subjects</h3>
                        </div>
                    </div>
                    <?php if(isset($_GET['s'])): ?>
                        <div class="alert alert-success">
                            <b>Success!</b> New Subject Added.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block">
                        <div class="row g-gs">

                            <div class="card">
                                <div class="card-inner">
                                    <table class="datatable-init table">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th width="150">Quarter</th>
                                                <th width="200">Date Assigned</th>
                                                <th width="50">Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($rw->subj_title); ?>

                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $number = $rw->ass_quarter;
                                                        ?>
                                                        <?php if($number == 1): ?>
                                                            1st
                                                        <?php elseif($number == 2): ?>
                                                            2nd
                                                        <?php elseif($number == 3): ?>
                                                            3rd
                                                        <?php elseif($number == 4): ?>
                                                            4th
                                                        <?php endif; ?>
                                                        Quarter
                                                    </td>
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
                                                                        <li><a href="/teacher/students/<?php echo e($rw->sec_id); ?>/<?php echo e($rw->subj_id); ?>/<?php echo e($number); ?>"><em
                                                                                    class="icon ni ni-edit"></em><span>
                                                                                        Upload Grade</span></a></li>
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
    </div>

    <div class="modal fade" id="modalCreate" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close"> <em
                        class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title">Create Course</h5>
                    <form action="<?php echo e(route('create.course')); ?>" class="pt-2" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Course Name</label>
                            <div class="form-control-wrap">
                                <input type="text" name="inp_course" class="form-control" id="full-name"
                                    placeholder="e.g. Mathematics">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <div class="form-control-wrap">
                                <textarea class="form-control" name="inp_description" rows="3" name="description" id=""
                                    placeholder="Write Category Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label class="form-label">Section</label>
                            <div class="d-flex gx-3 mb-3">
                                <div class="g w-100">
                                    <div class="form-control-wrap">
                                        <input type="text" value="<?php echo e(0); ?>" name="inp_section"
                                            class="form-control" placeholder="e.g. Fairness">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/pages/teachers/subjects.blade.php ENDPATH**/ ?>