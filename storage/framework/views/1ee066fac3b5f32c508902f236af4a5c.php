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
                            <a class="back-to" href="/students">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Register Students</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['s'])): ?>
                            <div class="alert alert-success">
                                <b>Success!</b> New Student Added.
                            </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('student.confirm')); ?>" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="row gy-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">First Name</label>
                                            <input name="inp_fname" type="text" class="form-control" id="full-name"
                                                value="" placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Last Name</label>
                                            <input name="inp_lname" type="text" class="form-control" id="display-name"
                                                value="" placeholder="Enter Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Middle Name</label>
                                            <input name="inp_mname" type="text" class="form-control" id="display-name"
                                                placeholder="Enter Middle name">
                                        </div> 
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Extension Name</label>
                                            <input name="inp_extname" type="text" class="form-control" id="display-name"
                                                placeholder="Enter Extension name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="form-control-wrap">
                                                <select name="inp_gender" class="form-select js-select2"
                                                    data-placeholder="Select multiple options">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Date of Birth</label>
                                            <input name="inp_birth" type="text" class="form-control date-picker" id="birth-day"
                                                value="<?php echo e(date('m/d/Y')); ?>" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Email Address (<i>Username</i>)</label>
                                            <input name="inp_email" type="text" class="form-control" id="phone-no"
                                                value="" placeholder="Enter Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number</label>
                                            <input name="inp_mobile" type="text" class="form-control" id="phone-no"
                                                value="" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Assign Section</label>
                                            <div class="form-control-wrap">
                                                <select name="inp_section" class="form-control"
                                                    data-placeholder="--">
                                                    <option value="--" disabled selected>--</option>
                                                    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($rw->sec_id); ?>"><?php echo e($rw->sec_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Complete Address</label>
                                            <input name="inp_address" type="text" class="form-control"
                                                placeholder="Enter Complete Address here..">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-primary">Confirm and Submit</button>
                                            </li>
                                            <li>
                                                <a href="/user" class="link link-light">Cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/students/registration.blade.php ENDPATH**/ ?>