<?php
    $user = session('info');
?>
<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="/logo.png" srcset="/logo.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="/logo.png" srcset="/logo.png 2x" alt="logo-dark">
                </a>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    <?php
                                        if ($user['type'] == 'ICT'){
                                            $role = 'ICT Administrator';
                                        }elseif ($user['type'] == 'teacher'){
                                            $role = 'Faculty';
                                        }elseif ($user['type'] == 'student'){
                                            $role = 'Student User';
                                        }elseif ($user['type'] == 'admin'){
                                            $role = 'Super Admin';
                                        }
                                    ?>

                                    <div class="user-status user-status-active" style="text-transform: uppercase">ROLE: <?php echo e($role); ?></div>
                                    <div class="user-name dropdown-indicator" style="text-transform: uppercase">
                                        <?php echo e($user['name']); ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php echo e($user['name']); ?></span>
                                        <span class="sub-text"><?php echo e($user['email']); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/lms/admin-profile.html"><em
                                                class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\shs_sis_laravel_html\resources\views/theme/header-top.blade.php ENDPATH**/ ?>