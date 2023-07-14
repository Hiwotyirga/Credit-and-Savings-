


<?php

session_start();
// $conn = mysqli_connect('localhost', 'root', '', 'webproject') or die ('Unable to connect');


// $select = mysqli_query($conn, "SELECT * FROM saving");
// $row = mysqli_fetch_array($select);


// $camount= $row['camt'];
// echo $camount;
    // $_SESSION["uname"] = $row['camt'];
// if(isset($_SESSION["uname"])){
//     header("Location:selection.php");
// }

if(!isset($_SESSION['username'])){ //if login in session is not set
    header("Location: ../User/logout.php");
}

?>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $conn= mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['submit'])){
            $myname = $_SESSION['uname'];
            // $name = $myname;
            // $dept= (int)$_POST['deposite'];

            // $newamt = $camount + $dept;
            // $int_cast = (int)$dept;
            // $id = $_POST[1];
            // $pass= $_POST['pass'];

            // $select = mysqli_query($conn, "SELECT * FROM saving");
            $select = mysqli_query($conn, "SELECT * FROM saving WHERE username='$myname'");
            $row = mysqli_fetch_array($select);
            // $sql= "INSERT INTO `saving` (`id`,`camt`) VALUES (1,'$dept')";
            // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";
            $camount= $row['camt'];

            // $query = mysqli_query($conn,$sql);
            // if($query){
            //     // echo 'Entry Successfull';
            //     header("Location:savingacc.php");
            // }
            // else {
            //     echo 'Error Occurred';
            // }
        }
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
        <a href="selectionadmin.php">&#8592; Back</a>
        </div>

        <div class="card-body">
            <form action="savingaccadmin.php" method="POST">
                <p><input class="button" type="submit" value="View" name="submit"> <span class="view" style="font-size: 20px;font-weight: 600;"><?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){ echo "&#36;".$camount;}?></span></p>
            </form>

            <form action="savingaccadmin.php" method="POST">
                <input type="text" placeholder="Enter the amount" name="deposite" required><br><br>
                <input class="button" type="submit" value="Deposite" name="deposit">
            </form>

            <br><br>
            <form action="savingaccadmin.php" method="POST">
                <input type="text" placeholder="Enter the amount" name="withdraw" required><br><br>
                <input class="button" type="submit" value="Withdraw" name="Withdraw">
            </form><br>
        </div>
    </div>




<?php   
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deposit'])){
        $conn= mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['deposit'])){
            $dept= (int)$_POST['deposite'];
            $myname = $_SESSION['uname'];

            // $select = mysqli_query($conn, "SELECT * FROM saving");
            $select = mysqli_query($conn, "SELECT * FROM saving WHERE username='$myname'");
            $row = mysqli_fetch_array($select);
            // $sql= "INSERT INTO `saving` (`id`,`camt`) VALUES (1,'$dept')";
            // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";
            $camount= $row['camt'];
            // $myname = $_SESSION['uname'];
            // $name = $myname;


            if($dept <0){
                // echo "There is no such input";
                echo '<script type = "text/javascript">';
                echo 'alert("Invalid Credential");';
                echo 'window.location.href = "savingaccadmin.php"';
                echo '</script>';
            }
            elseif($dept ==0){
                // echo "The is no such input";
                echo '<script type = "text/javascript">';
                echo 'alert("There is no such input");';
                echo 'window.location.href = "savingaccadmin.php"';
                echo '</script>';
            }
            else{
                $newamt = $camount + $dept;

                // $_SESSION['userid'] = $user['id'];
                $data = "SELECT * FROM saving where username='$myname'";
                $sql = "UPDATE saving set camt='$newamt' WHERE username='$myname' ";

                $query1 = mysqli_query($conn,$data);
                $query = mysqli_query($conn,$sql);
                if($query){
                    // echo 'Entry Successfull';
                    header("Location:savingaccadmin.php");
                }
                else {
                    echo '<script type = "text/javascript">';
                    echo 'alert("Error Occurred");';
                    echo 'window.location.href = "savingaccadmin.php"';
                    echo '</script>';
                    // echo 'Error Occurred';
                }
            }
            // $newamt = $camount + $dept;
            // $int_cast = (int)$dept;
            // $id = $_POST[1];
            // $pass= $_POST['pass'];

            // $sql= "INSERT INTO `saving` (`id`,`camt`) VALUES (1,'$dept')";
            // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";

            // $query = mysqli_query($conn,$sql);
            // if($query){
            //     // echo 'Entry Successfull';
            //     header("Location:savingacc.php");
            // }
            // else {
            //     echo 'Error Occurred';
            // }
        }
    }
?>


<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Withdraw'])){
        $conn= mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['Withdraw'])){
            $with= (int)$_POST['withdraw'];
            $myname = $_SESSION['uname'];

            // $select = mysqli_query($conn, "SELECT * FROM saving");
            $select = mysqli_query($conn, "SELECT * FROM saving WHERE username='$myname'");
            $row = mysqli_fetch_array($select);
            // $sql= "INSERT INTO `saving` (`id`,`camt`) VALUES (1,'$dept')";
            // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";
            $camount= $row['camt'];

            if($with < 0){
                echo '<script type = "text/javascript">';
                echo 'alert("Invalid Credential");';
                echo 'window.location.href = "savingaccadmin.php"';
                echo '</script>';
            }
            elseif($with ==0){
                echo '<script type = "text/javascript">';
                echo 'alert("There is no such input");';
                echo 'window.location.href = "savingaccadmin.php"';
                echo '</script>';
            }
            elseif($with >$camount){
                echo '<script type = "text/javascript">';
                echo 'alert("Balance can not be negative!");';
                echo 'window.location.href = "savingaccadmin.php"';
                echo '</script>';
            }
            else{
                $newamt = $camount - $with;

                // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";
                $sql = "UPDATE saving set camt='$newamt' WHERE username='$myname' ";

    
                $query = mysqli_query($conn,$sql);
                if($query){
                    // echo 'Entry Successfull';
                    header("Location:savingaccadmin.php");
                }
                else {
                    echo '<script type = "text/javascript">';
                    echo 'alert("Error Occurred");';
                    echo 'window.location.href = "savingaccadmin.php"';
                    echo '</script>';
                    // echo 'Error Occurred';
                }
            }
            // $newamt = $camount - $with;
            // // $int_cast = (int)$dept;
            // // $id = $_POST[1];
            // // $pass= $_POST['pass'];

            // // $sql= "INSERT INTO `saving` (`id`,`camt`) VALUES (1,'$dept')";
            // $sql = "UPDATE `saving` set `camt`='$newamt' where `id`=1";

            // $query = mysqli_query($conn,$sql);
            // if($query){
            //     // echo 'Entry Successfull';
            //     header("Location:savingacc.php");
            // }
            // else {
            //     echo 'Error Occurred';
            // }
        }
    }
?>


</body>
</html>