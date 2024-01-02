<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
</head>

<body style="padding: 50px; background-color: #fff;">

    <div style="background-color: #fff; padding: 25px;">


        <h1><b>Reset Passsword</b></h1>
        <hr>
        <p>
            This is to inform you that the password for your account has been successfully reset. If you initiated this
            change, no further action is required.
        </p>
        <p>
            <b>Account Details</b> <br><br>
            &emsp;&emsp;&emsp; New Password : <b>{{ $data['password'] }}</b>
        </p>

        <p>
            If you did not request this password reset or have any concerns about the security of your account. Please ensure the security and confidentiality of your account information. If you have any questions or need further assistance regarding your account, please don't hesitate to contact our technical support team.
        </p>

    </div>

</body>

</html>
