

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
<body style="text-align: center;">

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
        a:hover{
            /* color: rgba(255, 166, 0, 1); */
            text-shadow: 0 0 10px rgb(254, 166, 0), 0 0 10px rgb(255, 166, 0), 0 0 10px rgb(255, 166, 0);
            transition: 0.5s ease;
            text-decoration: none;
        }
    </style>
    <!-- <h3>My form</h3> -->

        <h3>Register Form</h3>

        <form id="register" action="registeration.php" method="post">
            <input type="text" name="uname" placeholder="Enter Username" required><br><br>
            <input type="password" name="pass" placeholder="Enter Password" required><br><br>
            <input type="password" name="confpass" placeholder="Confirm your password" required><br><br>
            <input class="button" type="submit" name="submit" value="Register">

            <p style="font-size: 20px;font-weight:600;">Already have account? <a href="../login.php">Login</a></p>
        </form>



    

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $conn= mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['uname']) && isset($_POST['pass'])){
            $name= $_POST['uname'];
            $pass= $_POST['pass'];
            $confpass= $_POST['confpass'];

            if($pass == $confpass){
                $sql= "INSERT INTO `users` (`username`,`pass`) VALUES ('$name','$pass')";
                // $sqlsaving = "INSERT INTO `saving` (`camt`) VALUES (0);";
                $sqlsaving = "INSERT INTO `saving` (`username`,`camt`) VALUES ('$name',0);";
                // $sqlcredit = "INSERT INTO `credit` (`camt`) VALUES (0);";
                $sqlcredit = "INSERT INTO `credit` (`username`,`camt`) VALUES ('$name',0);";
                // CREATE TABLE saving (id int AUTO_INCREMENT PRIMARY KEY, camt int);
    
                $query = mysqli_query($conn,$sql);
                $query2 = mysqli_query($conn,$sqlsaving);
                $query3 = mysqli_query($conn,$sqlcredit);
                /*'mysqli_query' it is a function which 'accepts a string value' representing a query as one of parameters and
                    performs the 'given query' on the database.
                */

                if($query && $query2){
                    // echo 'Entry Successfull';
                    header("Location:login.php");
                }
                else {
                    // echo 'Error Occurred';
                    echo '<script type = "text/javascript">';
                    echo 'alert("Error Occurred");';
                    echo 'window.location.href = "registeration.php"';
                    echo '</script>';
                }
            } else{
                echo '<script type = "text/javascript">';
                echo 'alert("Your password is not matching!");';
                echo 'window.location.href = "registeration.php"';
                echo '</script>';
            }

        }
    }
?>

</body>
</html>