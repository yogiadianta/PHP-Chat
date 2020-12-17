<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="./css/signup.css">
    <title>Create New Account</title>
</head>
<body>
    <div class="signup-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>Fill out this form and start chatting with your friend.</p>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Example: Yogi" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="user_pass" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select class="form-control" name="user_country" id="">
                    <option value="" disabled>Select a country</option>
                    <option value="us">US</option>
                    <option value="japan">Japan</option>
                    <option value="canada">Canada</option>
                    <option value="germany">Germany</option>
                    <option value="french">French</option>
                    <option value="uk">UK</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" name="user_gender" id="">
                    <option value="" disabled>Select a Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="checkbox-inline"><input type="checkbox" name="" required>I accept the <a href="#">Terms and Condition</a> &amp; <a href="#">Privacy Policy</a></label>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign Up</button>
            </div>
            <?php include("signup_user.php"); ?>
        </form>
        <div class="text-center small" style="color: #674288;">Already have an account <a href="signin.php">Sign In Here</a></div>
    </div>
</body>
</html>