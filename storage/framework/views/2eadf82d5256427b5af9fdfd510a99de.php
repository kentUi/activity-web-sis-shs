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
                    <div class="col-md-4">
                        <div class="card is-dark h-100">
                            <div class="nk-ecwg nk-ecwg1">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Total Students</h6>
                                        </div>
                                        <div class="card-tools">
                                            <a href="#" class="link">View List</a>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="amount">958</div>
                                    </div>
                                    <div class="data">
                                        <h6 class="sub-title">Teachers</h6>
                                        <div class="data-group">
                                            <div class="amount">1,338</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-ecwg -->
                        </div>
                    </div>
                    <?php
                        $box = ['bg-purple', 'bg-success', 'bg-info', 'bg-danger', 'bg-warning'];
                        $cover = ['course-bg6.png', 'course-bg2.png', 'course-bg.png', 'course-bg4.png', 'course-bg5.png'];
                        $num = 0;
                        $bnum = 0;
                    ?>
                    <div class="col-sm-8">
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
                                            Current Activities
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="px-4 pt-2 pb-2 ">
                                <br><br><br><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 g-gs">
                    <div class="col-md-12">
                    <div class="card card-bordered">
                        <div class="card-inner card-inner-lg">
                            <div class="align-center flex-wrap flex-md-nowrap g-4">
                                <div class="nk-block-image w-120px flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 118">
                                        <path d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z" transform="translate(0 -1)" fill="#f6faff"></path>
                                        <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff"></rect>
                                        <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                        <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                        <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                        <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                        <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                                        <path d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z" transform="translate(0 -1)" fill="#798bff"></path>
                                        <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="#6576ff"></path>
                                        <path d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z" transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2"></path>
                                        <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                        <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                        <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                        <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                        <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round" stroke-linejoin="round"></line>
                                        <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                                        <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                                    </svg>
                                </div>
                                <div class="nk-block-content">
                                    <div class="nk-block-content-head px-lg-4">
                                        <h5>We’re here to help you!</h5>
                                        <p class="text-soft">Ask a question or file a support ticket, manage request, report an issues. Our team support team will get back to you by email.</p>
                                    </div>
                                </div>
                                <div class="nk-block-content flex-shrink-0">
                                    <a href="#" class="btn btn-lg btn-outline-primary">Get Support Now</a>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/pages/ict/dashboard.blade.php ENDPATH**/ ?>