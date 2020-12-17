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
                <h2>Forgot Password</h2>
                <p>RivChat</p>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Recovery Password Answer</label>
                <input type="text" class="form-control" name="ans" placeholder="Recovery" autocomplete="off" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
            </div>
        </form>
        <div class="text-center small" style="color: #674288;">Back to Sign In?<a href="signin.php">Click Here</a></div>
    </div>
    <?php
        session_start();
        include("include/connection.php");

        if(isset($_POST['submit'])){
            $email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
            $ans = htmlentities(mysqli_real_escape_string($conn, $_POST['ans']));

            $select = "SELECT * FROM users WHERE user_email = '$email' AND forgotten_answer = '$ans'";
            $query = mysqli_query($conn, $select);

            $check_user = mysqli_num_rows($query);

            if($check_user == 1){
                $_SESSION['user_email'] = $email;
                echo "<script>window.open('create_password.php', '_self')</script>";
            }else{
                echo "<script>alert('Your email or recovery answer is incorrect.')</script>";
                echo "<script>window.open('forgot_pass.php', '_self')</script>";
            }
        }
    ?>
</body>
</html>