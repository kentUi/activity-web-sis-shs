<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="./logo.png">
    <title>Login | Student Information System</title>
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=3.0.3">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=3.0.3">
</head>

<body class="nk-body bg-white npc-general pg-auth bg">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head text-center" style="padding-bottom: 0;">
                                    <div class="brand-logo pb-4 text-center">

                                        <img class="logo-dark" style="height: 120px !important" src="./logo.png"
                                            srcset="./logo.png 3x" alt="logo-dark">
                                    </div>
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Student Information System</h4>
                                        <div class="nk-block-des">
                                            <p>
                                                Account Registration. Also, You can <a href="/">login here</a>
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($_GET['s'])): ?>
                                    <div class="alert alert-success alert-dismissible alert-icon">
                                        <em class="icon ni ni-check-circle"></em> <strong>Success</strong>!
                                        Account Registration completed. <button class="close"
                                            data-bs-dismiss="alert"></button>
                                    </div>
                                <?php endif; ?>
                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="alert alert-danger alert-dismissible alert-icon">
                                            <em class="icon ni ni-cross-circle"></em> <strong>Error</strong>!
                                            <?php echo e($error); ?> <button class="close" data-bs-dismiss="alert"></button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('register')); ?>" autocomplete="off">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">First Name</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_fname" required id="default-01"
                                                        placeholder="Enter your first name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label" for="default-01">Last Name</label>
                                                </div>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg"
                                                        name="inp_lname" required id="default-01"
                                                        placeholder="Enter your last name">
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
                                            <input type="email" class="form-control form-control-lg" name="inp_email"
                                                required id="default-01"
                                                placeholder="Enter your email address or username">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg"
                                                data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg"
                                                id="password" required name="inp_password"
                                                placeholder="Enter your password">
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
    </div>
    <script src="./assets/js/bundle.js?ver=3.0.3"></script>
    <script src="./assets/js/scripts.js?ver=3.0.3"></script>

</html>
<?php /**PATH /home/kent/Development/SIS-SENIORHIGHSCHOOL/resources/views/auth/register.blade.php ENDPATH**/ ?>