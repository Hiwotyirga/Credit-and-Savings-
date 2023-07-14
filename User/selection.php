


<?php
session_start();

if(!isset($_SESSION['uname'])){ //if login in session is not set
//isset is the function which used to determine whether a 'variable' is 'set' or not
    header("Location: logout.php");
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

    <style>
        /* .contain{
            text-align: center;
        } */


        /* Embeded styling */
        body{
            background-image: url(../css/images/orange-modern2.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 95vh;
        }
        .container{
            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(../css/images/orange-modern2.jpg);
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
            <h3>Welcome <?php echo ucfirst($_SESSION['uname']); ?></h3>
            <!-- being 'uppercase' the 'first latter'  -->
            <a href="logout.php"><button class="button"> logout</button></a>
        </div>

        <div class="card-body">
            <a href="savingacc.php"><button class="button">Saving account</button></a><br><br>
            <a href="creditacc.php"><button class="button">Credit account</button></a>
        </div>
    </div>



</body>
</html>