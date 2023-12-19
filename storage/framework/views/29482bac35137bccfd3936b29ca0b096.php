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
                            <a class="back-to" href="/sections/view/<?php echo e($secid); ?>">
                                <em class="icon ni ni-arrow-left"></em><span>Back</span>
                            </a>
                        </div>
                        <h3 class="nk-block-title page-title">Import Students</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                        <a class="btn btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-linux-server"></em><span>Download Template</span></a>
                                    </li>
                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                        <a class="btn btn-icon btn-primary" data-bs-toggle="modal" href="#modalCreate"><em
                                                class="icon ni ni-linux-server"></em></a>
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
                    <div class="col-sm-12 col-lg-12 col-xxl-12">
                        <div class="card h-100">
                            <div class="card-inner pb-1"
                                style="min-height: 50px;background-image: url(&quot;<?php echo e('/' . $cover[2]); ?>&quot;); 
                                background-position:center; background-size: cover; padding: 20px;">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="/teacher/students/" class="d-flex align-items-center">
                                        <div class="user-avatar sq bg-success">
                                            <span style="text-transform: uppercase;">
                                                <em class="ni ni-download"></em>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            Import Students via template. Download the template now
                                        </div>

                                    </a>
                                </div>
                            </div>

                            <div class="p-4">
                                <?php if(isset($_GET['s'])): ?>
                                <div class="alert alert-success">
                                    <b><em class="ni ni-check-circle"></em> Success!</b> New Student Added.
                                </div>
                            <?php endif; ?>
                                <form action="<?php echo e(route('import.excel')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input type="file" required name="excel_file" class="form-file-input"
                                                            id="customFile">
                                                            <input type="hidden" name="secid" value="<?php echo e($secid); ?>">
                                                        <label class="form-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary" style="width: 100%">
                                                <em class="ni ni-download-cloud"></em>&ensp; Import Students
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/pages/sections/import.blade.php ENDPATH**/ ?>