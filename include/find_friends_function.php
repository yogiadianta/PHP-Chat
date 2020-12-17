<?php
    $conn = mysqli_connect("localhost", "root", "", "rivchat") or die("Connection was not established");
    // include("connection.php");
    // echo "123";
    function search_user(){
        global $conn;
        if(isset($_GET['search_btn'])){
            $search_query = htmlentities($_GET['search_query']);
            $get_user = "SELECT * FROM users WHERE user_name like '%$search_query%' OR user_country like '%$search_query'";
        }else{
            $get_user = "SELECT * FROM users ORDER BY user_country, user_name DESC LIMIT 5";
        }

        $run_user = mysqli_query($conn, $get_user);

        while($row_user = mysqli_fetch_array($run_user)){
            $user_name = $row_user['user_name'];
            $user_profile = $row_user['user_profile'];
            $country = $row_user['user_country'];
            $gender = $row_user['user_gender'];

            // Display suggested user

            echo "
                <div class='card'>
                    <img src='../$user_profile'>
                    <h1>$user_name</h1>
                    <p class='title'>$country</p>
                    <p>$gender</p>
                    <form method='POST'>
                        <p><button type='submit' name='add' >Chat with $user_name</button></p>
                    </form>
                </div><br><br>
            ";
            if(isset($_POST['add'])){
                echo "<script>window.open('../home.php?user_name=$user_name', '_self')</script>";
            }
        }
    }
?>