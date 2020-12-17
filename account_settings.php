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
    <title>Account Settings</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-2">
        </div>
        <?php
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user'";
            $run_user = mysqli_query($conn, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_profile = $row['user_profile'];
            $user_country = $row['user_country'];
            $user_gender = $row['user_gender'];
            // print_r($row);

        ?>
        <div class="col-sm-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table table-bordered-table-hover">
                    <tr align="center">
                        <td colspan="6" class="active"><h2>Change Account Settings</h2></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Change Your Usename</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required value="<?php echo $user_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="upload.php" class="btn btn-default"><i class="fa fa-user" aria-hidden="true"></i> Change Profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Change your Email</td>
                        <td>
                            <input type="email" name="u_email" class="form-control" required value="<?php echo $user_email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Country</td>
                        <td>
                            <select name="u_country" class="form-control">
                                <option value="<?php echo $user_country; ?>"><?php echo $user_country; ?></option>
                                <option value="us">US</option>
                                <option value="japan">Japan</option>
                                <option value="canada">Canada</option>
                                <option value="germany">Germany</option>
                                <option value="french">French</option>
                                <option value="uk">UK</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold">Gender</td>
                        <td>
                            <select name="u_gender" class="form-control">
                                <option value="<?php echo $user_gender; ?>"><?php echo $user_gender; ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Forgotten Password</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Forgotten Password</button>

                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id; ?>" method="POST" id="f">
                                                <strong>What is your recovery answer?</strong>
                                                <textarea class="form-control" name="content" id="" cols="60" rows="4" placeholder="Answer"></textarea><br>
                                                <input type="submit" class="btn btn-default" name="sub" value="Submit" style="width:100px;"><br><br>
                                                <pre>Answer the above question we will ask you this question if you forgot your <br> Password.</pre> <br><br>
                                            </form>
                                            <?php
                                                if(isset($_POST['sub'])){
                                                    $ans = htmlentities($_POST['content']);
                                                    if($ans == ''){
                                                        echo "<script>alert('Please Enter Answer.')</script>";
                                                        echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        exit();
                                                    }else{
                                                        $update = "UPDATE users set forgotten_answer='$ans' WHERE user_email='$user'";
                                                        $run = mysqli_query($conn, $update);

                                                        if($run){
                                                            echo "<script>alert('Recovery Answer is Set.')</script>";
                                                            echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        }else{
                                                            echo "<script>alert('Error Updating Recovery Answer.')</script>";
                                                            echo "<script>window.open('account_settings.php', '_self')</script>";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </div>

                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="change_password.php" class="btn btn-default" style="text-decoration:none; font-size: 15px"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</a></td>
                    </tr>
                    <tr align="center">
                        <td colspan="6">
                            <input type="submit" value="Update" name="update" class="btn btn-info">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($_POST['update'])){
                    $user_name = htmlentities($_POST['u_name']);
                    $email = htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update = "UPDATE users SET user_name = '$user_name', user_email = '$email', user_country = '$u_country', user_gender = '$u_gender' WHERE user_email = '$email'";
                    $run =mysqli_query($conn, $update);

                    if($run){
                        echo "<script>window.open('account_settings.php', '_self')</script>";
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