<form action="<?php echo e(route('import.excel')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="file" name="excel_file">
    <button type="submit">Upload Excel</button>
</form><?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\School Management System\DepEd Senior High School\resources\views/import/test.blade.php ENDPATH**/ ?>