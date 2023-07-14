

<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'webproject') or die ('Unable to connect');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Roboto+Mono:wght@500&family=Russo+One&display=swap" rel="stylesheet">
    <title>Ocean Service</title>
</head>
<body>

<style>
        body{
            background-image: url(../css/images/photo-.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 95vh;
        }
        .container{
            background-image: url(../css/images/photo-.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            /* height: 80vh; */
        }
        a:hover{
            /* color: rgba(255, 166, 0, 1); */
            text-shadow: 0 0 10px rgb(254, 166, 0), 0 0 10px rgb(255, 166, 0), 0 0 10px rgb(255, 166, 0);
            transition: 0.5s ease;
            text-decoration: none;
        }
</style>
    

    <div class="container">
        <div class="header-bar">
        <a href=" ../User/logout.php">&#8592; Back</a>
            <h3>Please Login As Admin.</h3>
        </div>

        <div class="card-body">
            <form class="contain" action="checkadmin.php" method="post">
                <input type="text" name="username" placeholder="Enter Username" required><br><br>
                <input type="password" name="pass" placeholder="Enter Password" required><br><br>
                <input class="button" type="submit" name="login" value="Login">
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];

    $select = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username' AND password = '$pass' ");
    $row = mysqli_fetch_array($select);
    

    if(is_array($row)){
        $_SESSION["username"] = $row['username'];
        $_SESSION["pass"] = $row['password'];
    } else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password");';
        echo 'window.location.href = "checkadmin.php"';
        echo '</script>';
    }
    }
    if(isset($_SESSION["username"])){
        header("Location:loginadmin.php");
    }
    //----------------------------------------------
    // if(isset($_SESSION['username'])){
    //     session_regenerate_id(FALSE);
    //     session_unset();
    // }

?>

</body>
</html>