<?php
    $user = session('info');
?>
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="/logo.png" srcset="/logo.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="/logo.png" srcset="/logo.png 2x" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="/logo.png" srcset="/logo.png 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading pt-0">
                        <h6 class="overline-title text-primary-alt">menu</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/user" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <?php if($user['type'] == 'student'): ?>
                        
                    <?php elseif($user['type'] == 'ICT'): ?>
                    
                    <li class="nk-menu-heading pt-3">
                        <h6 class="overline-title text-primary-alt">Information Management</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/teachers" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-network"></em></span>
                            <span class="nk-menu-text">Manage Teachers</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/students" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Manage Students</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/sections" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-property"></em></span>
                            <span class="nk-menu-text">Manage Sections</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/subjects" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-thumb-alt"></em></span>
                            <span class="nk-menu-text">Manage Subjects</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/strands" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Manage Strands</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading pt-3">
                        <h6 class="overline-title text-primary-alt">Subject Teacher</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/assign/teacher" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-edit-alt"></em></span>
                            <span class="nk-menu-text">Assign Teacher</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading pt-3">
                        <h6 class="overline-title text-primary-alt">Template Settings</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="html/lms/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-book"></em></span>
                            <span class="nk-menu-text">Form 137/138 - Template</span>
                        </a>
                    </li>                    
                    <li class="nk-menu-item">
                        <a href="html/lms/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                            <span class="nk-menu-text">School Header - Template</span>
                        </a>
                    </li>
                    <?php elseif($user['type'] == 'admin'): ?>
                    <li class="nk-menu-item">
                        <a href="/strands" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                            <span class="nk-menu-text">Manage Strands</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/subjects" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-thumb-alt"></em></span>
                            <span class="nk-menu-text">Manage Subjects</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                            <span class="nk-menu-text">Manage Schools</span>
                        </a>
                    </li>
                    <?php elseif($user['type'] == 'teacher'): ?>
                    <li class="nk-menu-heading pt-3">
                        <h6 class="overline-title text-primary-alt">Teacher Menu</h6>
                    </li>
                    
                    <li class="nk-menu-item has-sub">
                        <a href="/teacher/advisory" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-edit-alt"></em></span>
                            <span class="nk-menu-text">Assigned Advisory</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <li class="nk-menu-heading pt-3">
                        <h6 class="overline-title text-primary-alt">Settings</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Account Settings</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="/logout" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-power"></em></span>
                            <span class="nk-menu-text">Sign Out</span>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\resources\views/theme/sidemenu.blade.php ENDPATH**/ ?>