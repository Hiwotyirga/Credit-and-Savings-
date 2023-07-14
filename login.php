

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
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Roboto+Mono:wght@500&family=Russo+One&display=swap" rel="stylesheet">
    <title>Ocean Service</title>
</head>
<body>
    <style>
        /* .contain{
            text-align: center;
        } */


        /* Embeded styling */
        body{
            background-image: url(./css/images/orange-modern2.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 95vh;
        }
        .container{
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(./css/images/orange-modern2.jpg);
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
            <h3>Please login</h3>
            <p>Login As Admin <a href="Admin/checkadmin.php"> Click here</a></p>
        </div>

        <div class="card-body">
            <form class="contain" action="login.php" method="post">
                <input type="text" name="uname" placeholder="Enter Username" required><br><br>
                <input type="password" name="pass" placeholder="Enter Password" required><br><br>
                <input class="button" type="submit" name="login" value="Login">

                <p style="font-size: 20px;font-weight:600;">you have not account yet? <a href="User/registeration.php">Register</a></p>
            </form>
        </div>
    </div>

<!-- <span class="icon"><img src="sign-out.svg" alt="signin"></span> -->



<?php
    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        $pass = $_POST['pass'];

    $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND pass = '$pass' ");
    $row = mysqli_fetch_array($select);//what is this
    //it is a function which is returns the array, which 'holds' the current row of results. It returns NULL if there is no 'row'
    

    // if($username =='admin' && $pass == 'admin'){
    //     header("Location:Admin/admin.php");
    // }
    if(is_array($row)){
        $_SESSION["uname"] = $row['username'];
        $_SESSION["pass"] = $row['pass'];
    } else{
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password");';
        echo 'window.location.href = "login.php"';
        echo '</script>';
    }
    }
    
    if(isset($_SESSION["uname"])){
        header("Location:User/selection.php");
    }
?>

</body>
</html>