<nav class="navbar navbar-inverse" style="border-radius:0px">
    <a href="#" class="navbar-brand">
        <?php
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user'";
            $run_user = mysqli_query($conn, $get_user);
            $row = mysqli_fetch_array($run_user);
            $user_name = $row['user_name'];
            echo "<a class='navbar-brand' href='home.php?user_name=$user_name'>RivChat</a>";
        ?>
    </a>
    <ul class="nav navbar-nav"> 
        <li><a style="color:white; text-decoration:none; font-size: 20px" href="account_settings.php">Setting</a></li>
    </ul>
</nav><br>  