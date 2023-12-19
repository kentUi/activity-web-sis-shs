<?php
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Welcome! <?php echo e($user['fname']); ?></h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="drodown">
                                            <a href="#"
                                                class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                data-bs-toggle="dropdown">School Year</a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>S.Y : 2023-2024</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-plus"></em><span>Create Section</span></a>
                                    </li>
                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                        <a class="btn btn-icon btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-plus"></em></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row g-gs">
                    <?php
                        $box = ['bg-purple', 'bg-success', 'bg-info', 'bg-danger', 'bg-warning'];
                        $cover = ['course-bg6.png', 'course-bg2.png', 'course-bg.png', 'course-bg4.png', 'course-bg5.png'];
                        $num = 0;
                        $bnum = 0;
                    ?>
                    <div class="col-sm-12 col-lg-12 col-xxl-4">
                        <div class="card h-100">
                            <div class="card-inner pb-1"
                                style="min-height: 50px;background-image: url(&quot;<?php echo e('/' . $cover[2]); ?>&quot;); 
                                background-position:center; background-size: cover; padding: 20px;">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="/teacher/students/" class="d-flex align-items-center">
                                        <div class="user-avatar sq bg-info">
                                            <span style="text-transform: uppercase;">
                                                <em class="ni ni-folder"></em>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            You can now create your sections
                                        </div>

                                    </a>
                                </div>
                            </div>
                            <div class="px-4 pt-2 pb-2 ">
                                <div class="nk-tb-list nk-tb-ulist">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span class="sub-text">Sections</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Grade Level</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Date Created</span></div>
                                        <div class="nk-tb-col tb-col-md text-center"><span class="sub-text">Tools</span>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col">
                                                    <a href="/user/teacher/section/<?php echo e($rw->sec_id); ?>">
                                                        <div class="user-card">
                                                            <div class="user-avatar <?php echo e($box[$num++]); ?>">
                                                                <span><?php echo e(Str::substr($rw->sec_name, 0, 2)); ?></span>
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="tb-lead text-dark">&ensp; <?php echo e($rw->sec_name); ?>

                                                                    <span
                                                                        class="dot dot-success d-md-none ms-1"></span></span>
                                                                <span><a href="#">&ensp;
                                                                        <?php echo e($rw->sec_description); ?></a></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="">Grade <?php echo e($rw->sec_grade); ?></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-lg ">
                                                    <span
                                                        class=""><?php echo e(date_format(date_create($rw->created_at), 'F d, Y h:i: A')); ?></span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md text-center">
                                                    <a href="/user/teacher/section/<?php echo e($rw->sec_id); ?>"
                                                        class="btn btn-sm btn-default">
                                                        <em class="ni ni-eye"></em> &ensp; View
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
                                    <br>
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
                    <h5 class="title">Create Section</h5>
                    <form action="<?php echo e(route('create.section')); ?>" class="pt-2" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="form-label" for="full-name">Section Name</label>
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
                        <div class="form-group">
                            <label class="form-label">Grade Level</label>
                            <div class="d-flex gx-3 mb-3">
                                <div class="g w-100">
                                    <div class="form-control-wrap">
                                        <select name="inp_gradelevel" id="" class="form-control">
                                            <option value="" selected disabled>--</option>
                                            <option value="11">Grade 11</option>
                                            <option value="12">Grade 12</option>
                                        </select>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/pages/teachers/dashboard.blade.php ENDPATH**/ ?>