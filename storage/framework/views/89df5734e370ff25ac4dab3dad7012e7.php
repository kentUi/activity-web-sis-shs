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
                            <div class="nk-block-des text-soft">
                                <p>You can create subject here.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#"
                                                    class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                    data-bs-toggle="dropdown">
                                                    <em class="d-none d-sm-inline icon ni ni-setting"></em>
                                                    <span>Settings</span> </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#">
                                                                <em class="d-none d-sm-inline icon ni ni-copy"></em> <span>Copy Invitation link</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="">
                                                                <em class="d-none d-sm-inline icon ni ni-user-add"></em> <span>View Assigned Teachers</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/user/teacher/import/<?php echo e($sectionid); ?>">
                                                                <em class="d-none d-sm-inline icon ni ni-download"></em> <span>Import Students</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a class="btn btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                    class="icon ni ni-plus"></em><span>Create 
                                                    Subject</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a class="btn btn-icon btn-primary" data-bs-toggle="modal"
                                                href="#modalCreate"><em class="icon ni ni-plus"></em></a>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a class="btn btn-icon btn-primary d-md-none" data-bs-toggle="modal"
                                                href="#student-add"><em class="icon ni ni-plus"></em></a>
                                            <a class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal"
                                                href="#student-add"><em class="icon ni ni-send"></em><span>Send
                                                    Invitation</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                    <hr>
                    <?php if(isset($_GET['s'])): ?>
                        <div class="alert alert-success">
                            <b>Success!</b> New Subject Added.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="nk-block nk-block-lg">
                    <div class="nk-block">
                        <div class="row g-gs">
                            <?php
                                $box = ['bg-purple', 'bg-success', 'bg-info', 'bg-danger', 'bg-warning'];
                                $cover = ['course-bg6.png', 'course-bg2.png', 'course-bg.png', 'course-bg4.png', 'course-bg5.png'];
                                $num = 0;
                                $bnum = 0;
                            ?>
                            <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-lg-6 col-xxl-4">
                                    <div class="card h-100">
                                        <div class="card-inner pb-1"
                                            style="min-height: 50px;background-image: url(&quot;<?php echo e('/' . $cover[$bnum++]); ?>&quot;); 
                                        background-position:center; background-size: cover; padding: 20px;">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <a href="/teacher/students/<?php echo e($rw->subj_id); ?>"
                                                    class="d-flex align-items-center">
                                                    <div class="user-avatar sq <?php echo e($box[$num++]); ?>">
                                                        <span style="text-transform: uppercase;">
                                                            <?php echo e(Str::substr($rw->subj_title, 0, 2)); ?>

                                                        </span>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="title mb-1">
                                                            <?php echo e(Str::substr($rw->subj_title, 0, 36)); ?>

                                                            <?php if(Str::length($rw->subj_title) >= 36): ?>
                                                                ...
                                                            <?php endif; ?>
                                                        </h6>

                                                        <span class="sub-text text-dark">
                                                            <?php echo e(Str::substr($rw->subj_description, 0, 36)); ?>

                                                            <?php if(Str::length($rw->subj_description) >= 36): ?>
                                                                ...
                                                            <?php endif; ?>
                                                        </span>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>

                                        <a href="/teacher/students/<?php echo e($rw->subj_id); ?>" class="btn btn-wider ">
                                            <span class="text-center" style="text-transform: uppercase">
                                                &emsp13;(Grade <?php echo e($rw->sec_grade); ?>) | SECTION : <?php echo e($rw->sec_name); ?>

                                            </span>
                                            <em class="icon ni ni-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                    if ($num == 5) {
                                        $num = 0;
                                    }

                                    if ($bnum == 5) {
                                        $bnum = 0;
                                    }
                                ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <input type="text" value="<?php echo e($sectionid); ?>" name="inp_section"
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/pages/teachers/subjects.blade.php ENDPATH**/ ?>