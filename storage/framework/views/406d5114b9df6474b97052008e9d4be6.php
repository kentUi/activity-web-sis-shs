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
                            <a class="back-to" href="/sections">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Create Section</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['s'])): ?>
                                <div class="alert alert-success">
                                    <b>Success!</b> New Section Added.
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('create.section')); ?>" class="pt-2" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">School Year</label>
                                            <div class="d-flex gx-3 mb-3">
                                                <div class="g w-100">
                                                    <div class="form-control-wrap">
                                                        <select name="inp_schoolyear" id="" class="form-control">
                                                            <option value="" selected disabled>--</option>
                                                            <?php for($i = date('Y'); $i >= 2020; $i--): ?>
                                                                <option value="<?php echo e($i); ?>-<?php echo e($i + 1); ?>">
                                                                    <?php echo e($i); ?>-<?php echo e($i + 1); ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Select Strand</label>
                                            <div class="form-control-wrap">
                                                <select name="inp_strand" class="form-select js-select2"
                                                    data-placeholder="--">
                                                    <option value="">--</option>
                                                    <?php $__currentLoopData = $strands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($rw->of_id); ?>"><?php echo e($rw->of_strands); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Section Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" name="inp_course" class="form-control" id="full-name"
                                                    placeholder="e.g. Faithful">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="description">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="inp_description" rows="3" name="description" id=""
                                            placeholder="Write Section Description"></textarea>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/sections/registration.blade.php ENDPATH**/ ?>