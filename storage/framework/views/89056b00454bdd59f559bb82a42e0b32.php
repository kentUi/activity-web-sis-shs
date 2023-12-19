
<?php
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">

                        <?php if(isset($_GET['register'])): ?>
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/admin/schools">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">Register School</h3>
                            <?php elseif(isset($_GET['ict'])): ?>
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/admin/schools">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">School ICT`s</h3>
                        <?php else: ?>
                            <div class="nk-block-head-sub">
                                <a class="back-to" href="/user">
                                    <em class="icon ni ni-arrow-left"></em><span>Back</span>
                                </a>
                            </div>
                            <h3 class="nk-block-title page-title">List of School</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <?php if(isset($_GET['register'])): ?>
                            <div class="card-inner">
                                <?php if(isset($_GET['s'])): ?>
                                    <div class="alert alert-success">
                                        <b>Success!</b> New School Added.
                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('register.school')); ?>" autocomplete="off"
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School ID <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_id" required id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School Name <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_name" required id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Region <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_region" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">School Address <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_address" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Principal Complete name <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_principal" required id="default-01"
                                                        placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Principal Rank <b
                                                            class="text-danger">*</b></label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_rank" required id="default-01" placeholder="Write here..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">School Logo <b
                                                    class="text-danger">*</b></label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="file" accept=".png, .PNG, .jpg, .JPEG, .JPG"
                                                class="form-control form-control-lg" name="inp_logo" required
                                                id="default-01" placeholder="Enter your mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Submit Registration</button>
                                    </div>
                                </form>
                            </div>
                        <?php elseif(isset($_GET['ict'])): ?>
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>School ID</th>
                                            <th>Complete name</th>
                                            <th>Mobile No.</th>
                                            <th>Username / Email Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($rw->user_schoolid); ?></td>
                                                <td><?php echo e($rw->user_lname); ?>, <?php echo e($rw->user_fname); ?></td>
                                                <td><?php echo e($rw->user_mobile); ?></td>
                                                <td><?php echo e($rw->email); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="card-inner">
                                <a class="btn btn-primary d-none d-md-inline-flex" style="float: right"
                                    href="/admin/schools?register"><em class="icon ni ni-plus"></em><span>Register
                                        School</span></a>
                                <table class="datatable-init table">
                                    <thead>
                                        <tr>
                                            <th>School ID</th>
                                            <th>School Name</th>
                                            <th>School Region</th>
                                            <th>School Address</th>
                                            <th width="100">
                                                <center>...</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($rw->sc_id); ?></td>
                                                <td><?php echo e($rw->sc_name); ?></td>
                                                <td><?php echo e($rw->sc_region); ?></td>
                                                <td><?php echo e($rw->sc_address); ?></td>
                                                <td>
                                                    <center>
                                                        <a href="/admin/schools?ict&id=<?php echo e($rw->sc_id); ?>" class="btn btn-info btn-xs">
                                                            <em class="icon ni ni-eye"></em>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/admin/schools.blade.php ENDPATH**/ ?>