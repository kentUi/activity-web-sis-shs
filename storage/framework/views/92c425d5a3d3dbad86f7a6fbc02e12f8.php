<script>
    function confirmation(id, type) {
        var userResponse = confirm("Are you sure?\nOnce deleted, you will not be able to recover this record!");
        if (userResponse) {
            $.ajax({
                url: '/api/delete',
                type: 'POST',
                data: {
                    push_id: id,
                    push_type: type
                },
                success: function(data) {
                    window.location.href = data;
                },
                error: function(err) {
                   alert(err);
                }
            });
        } else {
          
        }
    }
</script>
<div class="nk-footer">
    <div class="container-fluid">
        <div class="nk-footer-wrap">
            <div class="nk-footer-copyright"> &copy; 2023 Development Team.
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\resources\views/theme/footer.blade.php ENDPATH**/ ?>