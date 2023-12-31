<?php
    $user = session('info');
?>
<?php $__env->startSection('content'); ?>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Welcome! <?php echo e($user['fname']); ?> <?php echo e($user['lname']); ?></h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                    class="icon ni ni-menu-alt-r"></em></a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block ">
                <div class="row g-gs">
                    <div class="col-md-3">
                        <div class="card is-dark h-100">
                            <div class="nk-ecwg nk-ecwg1">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Total No. of Schools</h6>
                                        </div>
                                    </div>
                                    <?php
                                        use App\Models\User;
                                        use App\Models\Schools;
                                        $users = User::count();
                                        $schools = Schools::count();
                                    ?>
                                    <br><br>
                                    <center>
                                        <h1><B class="text-white"><?php echo e($schools); ?> </B></h1>
                                    </center>
                                </div>
                            </div><!-- .nk-ecwg -->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <a href="/teacher/students/" class="d-flex align-items-center">
                                        <div class="user-avatar sq bg-primary">
                                            <span style="text-transform: uppercase;">
                                                <em class="ni ni-users"></em>
                                            </span>
                                        </div>
                                        <div class="ms-3">
                                            No. of Registered Accounts
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <center>
                                <h1><B><?php echo e($users); ?></B></h1>
                            </center>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="card h-100">
                            <div class="card-inner pb-1" style="min-height: 50px">
                                <center>
                                    <img src="/deped seal.webp" alt="" height="130">
                                    <hr>
                                    <h5 style="letter-spacing: 2px;">SCHOOL YEAR : <b>2023-2024</b></h5>
                                </center>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card h-100">
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
                                        <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($rw->sc_id); ?></td>
                                                <td><?php echo e($rw->sc_name); ?></td>
                                                <td><?php echo e($rw->sc_region); ?></td>
                                                <td><?php echo e($rw->sc_address); ?></td>
                                                <td>
                                                    <center>
                                                        <a href="/admin/schools?ict&id=<?php echo e($rw->sc_id); ?>"
                                                            class="btn btn-info btn-xs">
                                                            <em class="icon ni ni-eye"></em>
                                                        </a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function quarter(type) {
                $.ajax({
                    url: '/api/quarter',
                    type: 'POST',
                    data: {
                        push_type: type
                    },
                    success: function(data) {
                        console.log(data);
                        //window.location.href = data;
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>