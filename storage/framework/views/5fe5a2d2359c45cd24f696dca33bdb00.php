
<?php
    $user = session('info');
?>
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
                        <h3 class="nk-block-title page-title">ICT Accounts</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['s'])): ?>
                                <div class="alert alert-success">
                                    <b>Success!</b> New IT Account Added.
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('register')); ?>" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Select School</label>
                                            <div class="form-control-wrap">
                                                <select name="inp_schoolid" required class="form-select js-select2"
                                                    data-placeholder="--">
                                                    <option value="">--</option>
                                                    <?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($rw->sc_id); ?>"><?php echo e($rw->sc_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo csrf_field(); ?>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="default-01">First Name</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" name="inp_fname"
                                                    required id="default-01" placeholder="Enter your first name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label class="form-label" for="default-01">Last Name</label>
                                            </div>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" name="inp_lname"
                                                    required id="default-01" placeholder="Enter your last name">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Mobile Number</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control form-control-lg" name="inp_mobile"
                                            required id="default-01" placeholder="Enter your mobile number">
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <div class="form-label-group">
                                        <label class="form-label" for="default-01">Email or Username</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control form-control-lg" name="inp_email" required
                                            id="default-01" placeholder="Enter your email address or username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Password (<small>Default: 12345!</small>)</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                            data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" id="password" required
                                            name="inp_password" value="12345!" placeholder="Enter your password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/admin/ict.blade.php ENDPATH**/ ?>