

<?php

session_start();


if(!isset($_SESSION['uname'])){ //if login in session is not set
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
            <a href="savingacc.php">&#8592; Back</a>
            <h3 style=" margin-top: 30px;">Transfer Balance From <span style="text-decoration:underline;"> <?php echo ucfirst($_SESSION['uname']); ?></span> </h3>
            <!-- <h3 style="flex: auto; margin-top: 30px;">Transfer Balance From <span style="text-decoration:underline;"> <?php echo ucfirst($_SESSION['uname']); ?></span> </h3> -->
        </div>


        <div class="card-body">
            <form action="transfer.php" method="POST">
                <input type="text" placeholder="Enter the Username" name="utran" required><br><br>
                <input type="number" placeholder="Enter the amount" name="utranamt" required><br><br>
                <input class="button" type="submit" value="Transfer" name="Transfer">
            </form>
        </div>
    </div>



<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Transfer'])){
    $conn= mysqli_connect('localhost', 'root', '', 'webproject') or die("Connection Failed:" .mysqli_connect_error());
    if(isset($_POST['Transfer'])){
        $trans= $_POST['utran'];
        $transamt= $_POST['utranamt'];

        if($_SESSION['uname'] == $trans){
                echo '<script type = "text/javascript">';
                echo 'alert("ILLEGAL ACTION!");';
                echo 'window.location.href = "transfer.php"';
                echo '</script>';
        }else{
       
            // $myname= $_SESSION['uname'];
    
            $select = mysqli_query($conn, "SELECT * FROM users WHERE username='$trans'");
            $row = mysqli_fetch_array($select);

            if(is_array($row)){
                //'is_array' is the function which returns boolean value if the variable is an array(return 'TRUE')
                header("Location:confirm.php");

            //Save on session to reminde the confirmation page.
            $_SESSION["utran"] = $row['username'];
            $_SESSION["utranamt"] = $transamt;
            }else{
                echo '<script type = "text/javascript">';
                echo 'alert("There is no such username!");';
                echo 'window.location.href = "transfer.php"';
                echo '</script>';
            }
    
        }


        // // $ucamount= $row['camt'];

        // if(is_array($row)){
        //     // $_SESSION["uname"] = $row['username'];
        //     // $_SESSION["pass"] = $row['pass'];

        //     $select = mysqli_query($conn, "SELECT * FROM saving WHERE username='$myname'");
        //     $rows = mysqli_fetch_array($select);

        //     $camount= $rows['camt'];


        //     //The users reader the account balance
        //     $selects = mysqli_query($conn, "SELECT * FROM saving WHERE username='$trans'");
        //     $row = mysqli_fetch_array($selects);
    
        //     $ucamount= $row['camt'];

        //     if($transamt <0){
        //         echo '<script type = "text/javascript">';
        //         echo 'alert("Invalid Credential");';
        //         echo 'window.location.href = "transfer.php"';
        //         echo '</script>';
        //     }elseif($transamt ==0){
        //         echo '<script type = "text/javascript">';
        //         echo 'alert("There is no such input");';
        //         echo 'window.location.href = "transfer.php"';
        //         echo '</script>';
        //     }elseif($transamt >$camount){
        //         echo '<script type = "text/javascript">';
        //         echo 'alert("You have not enough balance!");';
        //         echo 'window.location.href = "transfer.php"';
        //         echo '</script>';
        //     }else{
        //         $newamt = $camount - $transamt;
        //         $unewamt = $ucamount + $transamt;

        //         $sql = "UPDATE saving set camt='$newamt' WHERE username='$myname' ";
        //         $usql = "UPDATE saving set camt='$unewamt' WHERE username='$trans' ";

        //         $query = mysqli_query($conn,$sql);
        //         $query = mysqli_query($conn,$usql);
        //         if($query){
        //             // echo 'Entry Successfull';
        //             header("Location:savingacc.php");
        //         }
        //         else {
        //             echo 'Error Occurred';
        //         }
        //     }



        // } else{
        //     echo '<script type = "text/javascript">';
        //     echo 'alert("There is no such username!");';
        //     echo 'window.location.href = "transfer.php"';
        //     echo '</script>';
        // }

    }
}
?>

</body>
</html>