
<?php
    $user = session('info');
    if (isset($_GET['edit'])) {
        $edit = '';
    } else {
        $edit = 'disabled';
    }
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
                        <h3 class="nk-block-title page-title">Students Details</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['s'])): ?>
                                <div class="alert alert-success">
                                    <b>Success!</b> Student Record has been updated.
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('student.update')); ?>" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="row gy-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Student LRN.</label>
                                            <input <?= $edit ?> name="inp_lrn" type="text" class="form-control"
                                                id="full-name" value="<?php echo e($details->student_lrd); ?>"
                                                placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">First Name</label>
                                            <input <?= $edit ?> name="inp_fname" type="text" class="form-control"
                                                id="full-name" value="<?php echo e($details->student_fname); ?>"
                                                placeholder="Enter First name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Last Name</label>
                                            <input <?= $edit ?> name="inp_lname" type="text" class="form-control"
                                                id="display-name" value="<?php echo e($details->student_lname); ?>"
                                                placeholder="Enter Last name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Middle Name</label>
                                            <input <?= $edit ?> name="inp_mname" type="text"
                                                value="<?php echo e($details->student_mname); ?>" class="form-control" id="display-name"
                                                placeholder="Enter Middle name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Extension Name</label>
                                            <input <?= $edit ?> name="inp_extname" type="text"
                                                value="<?php echo e($details->student_extname); ?>" class="form-control"
                                                id="display-name" placeholder="Enter Extension name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <div class="form-control-wrap">
                                                <select <?= $edit ?> name="inp_gender" class="form-select js-select2"
                                                    data-placeholder="Select multiple options">
                                                    <option value="<?php echo e($details->student_gender); ?>" selected>
                                                        <?php echo e($details->student_gender); ?></option>
                                                    <option value="" disabled>---</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="birth-day">Date of Birth</label>
                                            <input <?= $edit ?> name="inp_birth" type="text"
                                                class="form-control date-picker" id="birth-day"
                                                value="<?php echo e(date_format(date_create($details->student_birthdate), 'm/d/Y')); ?>"
                                                placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Email Address (<i>Username</i>)</label>
                                            <input <?= $edit ?> name="inp_email" type="text" class="form-control"
                                                id="phone-no" value="<?php echo e($details->student_email); ?>"
                                                placeholder="Enter Email Address">
                                            <input type="hidden" name="inp_email_org"
                                                value="<?php echo e($details->student_email); ?>">
                                            <input type="hidden" name="id" value="<?php echo e($details->student_id); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Phone Number</label>
                                            <input <?= $edit ?> name="inp_mobile" type="text" class="form-control"
                                                id="phone-no" value="<?php echo e($details->student_mobile); ?>"
                                                placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">Assign Section</label>
                                            <div class="form-control-wrap">
                                                <select <?= $edit ?> name="inp_section" class="form-control"
                                                    data-placeholder="--">
                                                    <option value="<?php echo e($details->student_secid); ?>" selected>
                                                        <?php echo e($section_name->sec_name); ?></option>
                                                    <option value="--" disabled>--</option>
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
                                            <input <?= $edit ?> name="inp_address" type="text" class="form-control"
                                                value="<?php echo e($details->student_address); ?>"
                                                placeholder="Enter Complete Address here..">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">

                                            <?php if(isset($_GET['edit'])): ?>
                                                <li>
                                                    <button type="submit" name="update" class="btn btn-success">
                                                        <em class="ni ni-save"></em> &ensp;
                                                        Save Changes
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button"
                                                        onclick="confirmation(<?php echo e($details->student_id); ?>, 'student')" name="delete"
                                                        class="btn btn-danger">
                                                        <em class="ni ni-trash"></em> &ensp;
                                                        Remove Student
                                                    </button>
                                                </li>
                                                <li>
                                                    <a href="?" class="link link-light">Cancel</a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a href="?edit" class="btn btn-warning">
                                                        <em class="ni ni-edit"></em>
                                                        &ensp; Edit Information
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/students" class="link link-light">Cancel</a>
                                                </li>
                                            <?php endif; ?>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\shs_sis_laravel_html\resources\views/pages/students/edit.blade.php ENDPATH**/ ?>