


<?php
session_start();

if(!isset($_SESSION['username'])){ //if login in session is not set
    header("Location: ../User/logout.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
            <h3>Admin Accessing User <span style="text-decoration:underline;"><?php echo ucfirst($_SESSION['uname']); ?></span></h3>
            <a href="logoutlogin.php"><button class="button"> logout</button></a>
            <!-- <a href="logoutadmin.php"><button class="button"> logout</button></a> &#8592; Back-->
        </div>


        <div class="card-body">
                <a href="savingaccadmin.php"><button class="button">Saving account</button></a><br><br>
                <a href="creditaccadmin.php"><button class="button">Credit account</button></a>
        </div>
    </div>





</body>
</html>