<?php
    session_start();
    include("find_friends_function.php");

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
    <link rel="stylesheet" href="../css/find_people.css">
    <title>Search For Friend</title>
</head>
<body>
    <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark"> -->
    <nav class="navbar navbar-inverse" style="border-radius:0px">
        <a href="#" class="navbar-brand">
            <?php
                $user = $_SESSION['user_email'];
                $get_user = "SELECT * FROM users WHERE user_email='$user'";
                $run_user = mysqli_query($conn, $get_user);
                $row = mysqli_fetch_array($run_user);

                $user_name = $row['user_name'];
                echo "<a class='navbar-brand' href='../home.php?user_name=$user_name'>RivChat</a>";

            ?>
        </a>
        <ul class="nav navbar-nav"> 
            <li><a style="color:white; text-decoration:none; font-size: 20px" href="../account_settings.php">Setting</a></li>
        </ul>
    </nav><br>
    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <form class="search_form" action="">
                <input type="text" name="search_query" placeholder="Search Friend" autocomplete="off" required>
                <button class="btn" type="submit" name="search_btn">Search</button>
            </form>
        </div>
        <div class="col-sm-4">
        </div>
    </div><br><br>
    <?php
        search_user();
    ?>
</body>
</html>
    <?php }?>