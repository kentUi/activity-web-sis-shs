
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
                            <a class="back-to" href="/strands">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Strand Details</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner">
                            <?php if(isset($_GET['u'])): ?>
                            <div class="alert alert-success">
                                <b>Success!</b> Strand has been updated.
                            </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('strand.update')); ?>" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="row gy-4">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Strad Code Name</label>
                                            <input name="inp_code" type="text" class="form-control" id="full-name"
                                                value="<?php echo e($data->of_code); ?>" placeholder="Ex: ABM, STEM, etc..">
                                                <input type="hidden" value="<?php echo e($data->of_id); ?>" name="inp_id">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label" for="display-name">Strand Description</label>
                                            <input name="inp_name" type="text" class="form-control" id="display-name"
                                                value="<?php echo e($data->of_strands); ?>" placeholder="Enter Description here..">
                                        </div>
                                    </div> 
                                    <hr>
                                    <div class="col-md-12">
                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn btn-success">Save Changes</button>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/strands/edit.blade.php ENDPATH**/ ?>