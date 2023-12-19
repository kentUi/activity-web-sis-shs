<!DOCTYPE html>
<html>
<head>
    <title>Email Notification</title>
</head>
<body style="padding: 50px; background-color: #fff;">
    
    <div style="background-color: #fff; padding: 25px;">
        
        <p>
            Good Day <b><?php echo e($data['name']); ?></b>,
        </p>
        <p>
            I hope this email finds you well. We would like to provide you with your account details for your reference and records.
        </p>
        <p>
            <b>Account Details</b> <br><br>
            &emsp;&emsp;&emsp; Username : <b><?php echo e($data['email']); ?></b> <br>
            &emsp;&emsp;&emsp; Password : <b><?php echo e($data['password']); ?></b>
        </p>

        <p>
            Please ensure the security and confidentiality of your account information. If you have any questions or need further assistance regarding your account, please don't hesitate to contact our technical support team.
        </p>
        
    </div>
    
</body>
</html>
<?php /**PATH C:\Users\DEV.KENT\Documents\Software Development\_FlexifyDigitalServer64\www\caps_shs_sis_laravel_html\activity-web-sis-shs\resources\views/layout/email.blade.php ENDPATH**/ ?>