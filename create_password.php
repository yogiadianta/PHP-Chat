<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="./css/signin.css">
    <title>Login to your account</title>
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Create New Password</h2>
                <p>RivChat</p>
            </div>
            <div class="form-group">
                <label for="">Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="change">Change</button>
            </div>
        </form>
    </div>
    <?php
        session_start();
        include ("include/connection.php");

        if(isset($_POST['change'])){
            $user = $_SESSION['user_email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if($pass1 !== $pass2){
                echo "
                    <div class='alert alert-danger'>
                        <strong>Your new password didn't match with confirm password</strong>
                    </div>
                ";
            }
            if($pass1 < 8 OR $pass2 < 8){
                echo "
                    <div class='alert alert-danger'>
                        <strong>Use 8 or more characters</strong>
                    </div>
                ";
            }
            if($pass1==$pass2){
                
                // echo "<script>alert('$user and $pass1')</script>";
                $update= "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'";
                $update_pass = mysqli_query($conn, $update);
                session_destroy();

                echo "<script>alert('New password is ser. Go ahead and Sign in')</script>";
                echo "<script>window.open('signin.php', '_self')</script>";
            }
        }
    ?>  
</body>
</html>