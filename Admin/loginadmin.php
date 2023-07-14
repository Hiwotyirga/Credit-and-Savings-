

<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'webproject') or die ('Unable to connect');

if(!isset($_SESSION['username'])){ //if login in session is not set
    header("Location: checkadmin.php");
}

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
    <!-- <style>
        .contain{
            text-align: center;
        }
    </style> -->
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
            <!-- <a href="admin.php">&#8592; Back</a> -->
            <h3>Users Info</h3>
            <a href="logoutadmin.php"><button class="button"> logout</button></a> 
        </div>

        <div class="card-body">
            <form class="contain" action="loginadmin.php" method="post">
                <input type="text" name="uname" placeholder="Enter the users name" required><br><br>
                <!-- <input type="password" name="pass" required><br><br> -->
                <input class="button" type="submit" name="login" value="Login">

                <p style="font-size: 20px;font-weight:600;">Do you want register more admins? <a href="registerationadmin.php"> Click here</a></p>
            </form>
        </div>
    </div>




<?php
    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        // $pass = $_POST['pass'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $row = mysqli_fetch_array($select);
    

    if(is_array($row)){
        $_SESSION["uname"] = $row['username'];
        // $_SESSION["pass"] = $row['pass'];
    } else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password");';
        echo 'window.location.href = "loginadmin.php"';
        echo '</script>';
    }
    }
    if(isset($_SESSION["uname"])){
        header("Location:selectionadmin.php");
    }
?>

</body>
</html>