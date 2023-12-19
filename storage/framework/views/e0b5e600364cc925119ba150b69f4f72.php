
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
                            <a class="back-to" href="/teachers">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Teacher Details</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <?php if(isset($_GET['advisory'])): ?>
                                        <?php echo $__env->make('pages.teachers.details.advisory', [
                                            'advisory' => $advisory,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php elseif(isset($_GET['assigned'])): ?>
                                        <?php echo $__env->make('pages.teachers.details.subjects', [
                                            'advisory' => $assign_subject,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php elseif(isset($_GET['settings'])): ?>
                                        <?php echo $__env->make('pages.teachers.details.settings', [
                                            'advisory' => $assign_subject,
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <div class="nk-block-head nk-block-head-lg">
                                            <?php if(isset($_GET['s'])): ?>
                                                <div class="alert alert-success" style="width: 100%;">
                                                    <b><em class="icon ni ni-check"></em> Success!</b> Teacher Informationn
                                                    has been updated.
                                                </div>
                                                <hr>
                                            <?php endif; ?>
                                            <div class="nk-block-between">
                                                <div class="nk-block-head-content">
                                                    <h4 class="nk-block-title">Personal Information</h4>
                                                    <div class="nk-block-des">
                                                        <p>Basic info, like your name and address, that you use on teaching.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="nk-block-head-content align-self-start d-lg-none">
                                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                        data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nk-block">
                                            <div class="nk-data data-list">
                                                <div class="data-head">
                                                    <h6 class="overline-title">Basics</h6>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Full Name</span>
                                                        <span class="data-value">
                                                            <?php echo e($personal_info->tech_lname); ?>,
                                                            <?php echo e($personal_info->tech_fname); ?>

                                                            <?php echo e($personal_info->tech_mnme); ?>

                                                            <?php echo e($personal_info->tech_extname); ?>

                                                        </span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Gender</span>
                                                        <span class="data-value"><?php echo e($personal_info->tech_gender); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Civil Status</span>
                                                        <span
                                                            class="data-value"><?php echo e($personal_info->tech_civilStatus); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Email</span>
                                                        <span class="data-value"><?php echo e($personal_info->tech_email); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"><span class="data-more disable"><em
                                                                class="icon ni ni-lock-alt"></em></span></div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Phone Number</span>
                                                        <span class="data-value"><?php echo e($personal_info->tech_phone); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                                <div class="data-item">
                                                    <div class="data-col">
                                                        <span class="data-label">Date of Birth</span>
                                                        <span
                                                            class="data-value"><?php echo e(date_format(date_create($personal_info->tech_birthdate), 'M. d, Y')); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                                <div class="data-item" data-tab-target="#address">
                                                    <div class="data-col">
                                                        <span class="data-label">Address</span>
                                                        <span class="data-value"><?php echo e($personal_info->tech_address); ?></span>
                                                    </div>
                                                    <div class="data-col data-col-end"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                    data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                                    data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-dark">
                                                    <em class="ni ni-user"></em>
                                                </div>
                                                <div class="user-info" style="text-transform: uppercase;">
                                                    <span class="lead-text">
                                                        <?php echo e($personal_info->tech_lname); ?>, <?php echo e($personal_info->tech_fname); ?>

                                                        <?php echo e($personal_info->tech_mnme); ?> <?php echo e($personal_info->tech_extname); ?>

                                                    </span>
                                                    <span class="sub-text"><?php echo e($personal_info->tech_email); ?></span>
                                                </div>
                                                <div class="user-action">
                                                    <div class="dropdown">
                                                        <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown"
                                                            href="#"><em class="icon ni ni-more-v"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li data-bs-toggle="modal" data-bs-target="#profile-edit">
                                                                    <a href="#"><em
                                                                            class="icon ni ni-edit-fill"></em><span>Update
                                                                            Profile</span></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li>
                                                    <a href="?"><em
                                                            class="icon ni ni-user-fill-c"></em><span>Personal
                                                            Infomation</span></a>
                                                </li>
                                                <li><a href="?assigned"><em class="icon ni ni-home"></em><span>Subject
                                                            Assigned</span></a>
                                                </li>
                                                <li><a href="?advisory"><em class="icon ni ni-users"></em><span>Class
                                                            Advisory</span></a>
                                                </li>
                                                <li><a href="?settings"><em
                                                            class="icon ni ni-lock-alt-fill"></em><span>Security
                                                            Settings</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-xl">
                    <h5 class="title">Update Details</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personal">Personal Information</a>
                        </li>
                    </ul>
                    <div class="row gy-4 mt-1">
                        <form action="<?php echo e(route('teacher.update')); ?>" method="POST" autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <div class="row gy-4">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">First Name</label>
                                        <input name="inp_fname" type="text" class="form-control" id="full-name"
                                            value="<?php echo e($personal_info->tech_fname); ?>" placeholder="Enter First name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Last Name</label>
                                        <input name="inp_lname" type="text" class="form-control" id="display-name"
                                            value="<?php echo e($personal_info->tech_lname); ?>" placeholder="Enter Last name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Middle Name</label>
                                        <input name="inp_mname" type="text" value="<?php echo e($personal_info->tech_mname); ?>"
                                            class="form-control" id="display-name" placeholder="Enter Middle name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Extension Name</label>
                                        <input name="inp_extname" type="text" class="form-control" id="display-name"
                                            value="<?php echo e($personal_info->tech_extname); ?>"
                                            placeholder="Enter Extension name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label>
                                        <div class="form-control-wrap">
                                            <select name="inp_gender" class="form-select js-select2"
                                                data-placeholder="Select multiple options">
                                                <option value="<?php echo e($personal_info->tech_gender); ?>" selected>
                                                    <?php echo e($personal_info->tech_gender); ?></option>
                                                <option disabled>----</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Civil Status</label>
                                        <div class="form-control-wrap">
                                            <select name="inp_civil" class="form-select js-select2"
                                                data-placeholder="Select multiple options">
                                                <option value="<?php echo e($personal_info->tech_civilStatus); ?>" selected>
                                                    <?php echo e($personal_info->tech_civilStatus); ?></option>
                                                <option disabled>----</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Separated">Separated</option>
                                                <option value="Widow">Widow</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <input name="inp_birth" type="text" class="form-control date-picker"
                                            id="birth-day"
                                            value="<?php echo e(date_format(date_create($personal_info->tech_birthdate), 'm/d/Y')); ?>"
                                            placeholder="Date of Birth">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Phone Number</label>
                                        <input name="inp_mobile" value="<?php echo e($personal_info->tech_phone); ?>" type="text"
                                            class="form-control" id="phone-no" placeholder="Enter Phone Number here..">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Complete Address</label>
                                        <input type="hidden" name="Y7cbdb3e4ebb" value="<?php echo e($personal_info->tech_id); ?>">
                                        <input name="inp_address" type="text"
                                            value="<?php echo e($personal_info->tech_address); ?>" class="form-control"
                                            placeholder="Enter Complete Address here..">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-success"><em
                                                    class="ni ni-save"></em>&ensp; Save Changes</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                onclick="confirmation(<?php echo e($personal_info->tech_id); ?>, 'teacher')"
                                                name="delete" class="btn btn-danger">
                                                <em class="ni ni-trash"></em> &ensp;
                                                Remove Teacher
                                            </button>
                                        </li>
                                        <li>
                                            <a href="/#" data-bs-dismiss="modal" class="link link-light">Cancel</a>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\shs_sis_laravel_html\resources\views/pages/teachers/details.blade.php ENDPATH**/ ?>