<!DOCTYPE html>
<html lang="zxx" class="js">
<?php echo $__env->make('theme.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            <?php echo $__env->make('theme.sidemenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="nk-wrap ">
                <?php echo $__env->make('theme.header-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="nk-content ">
                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="/assets/js/bundle.js?ver=3.0.3"></script>
    <script src="/assets/js/scripts.js?ver=3.0.3"></script>
</body>
</html>

<?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\shs_sis_laravel_html\resources\views/layout/main.blade.php ENDPATH**/ ?>