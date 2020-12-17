<?php
    session_start();
    include("include/connection.php");
    include("include/header.php");

    if(!isset($_SESSION['user_email'])){
        header("Location: signin.php");
    }
    else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
    <title>Change Profile Picture</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active"><h2>Change Password</h2></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Current Password</td>
                        <td>
                            <input type="password" name="current_pass" id="mypass" class="form-control" required placeholder="Current Password">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">New Password</td>
                        <td>
                            <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="New Password">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Confirm Password</td>
                        <td>
                            <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="Confirm Password">
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" name="change" value="Change" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['change'])){
                    $c_pass = $_POST['current_pass'];
                    $pass1 = $_POST['u_pass1'];
                    $pass2 = $_POST['u_pass2'];

                    $user = $_SESSION['user_email'];
                    $get_user = "SELECT * FROM users WHERE user_email='$user'";
                    $run_user = mysqli_query($conn, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_password = $row['user_pass'];

                    if($c_pass !== $user_password){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Your old password didn't match</strong>
                            </div>
                        ";
                    }
                    if($pass1 !== $pass2){
                        echo"
                            <div class='alert alert-danger'>
                                <strong>Your new pasowrd didn't match with the confirm password</strong>
                            </div>
                        ";
                    }
                    if($pass1 < 8 AND $pass2 < 8){
                        echo "
                            <div class='alert alert-danger'>
                                <strong>Use 8 or more than 8  characters</strong>
                            </div>
                        ";
                    }
                    if($pass1 == $pass2 AND $c_pass == $user_password){
                        $update = "UPDATE users SET user_pass = '$pass1' WHERE user_email = '$user'";
                        $update_pass = mysqli_query($conn, $update);
                        echo "
                            <div class='alert alert-success'>
                                <strong>Your Password has changed</strong>
                            </div>
                        ";
                    }
                }
            ?>
        </div>
        <div class="col-sm-2">
        </div>
    </div>
</body>
</html>
    <?php }?>