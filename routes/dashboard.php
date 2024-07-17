<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

?>

$userdata = $_SESSION['userdata'];

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>

    <style>
        .backbtn {
            float: left;
            margin-top: 22px;
            margin-left: 60px;
        }

        .logoutbtn {
            float: right;
            margin-top: 22px;
            margin-right: 60px;
        }

        #profile {
            background-color: white;
            width: 40%;
            padding: 15px;
            float: left;
        }

        #Group {
            background-color: white;
            width: 50%;
            padding: 15px;
            float: right;
        }
    </style>

    <div id="mainSection">
        <center>
            <div id="headerSection">
                <button class="backbtn" id="loginbtn">Back</button>
                <button class="logoutbtn" id="loginbtn">Logout</button>
                <h1>Online Voting System</h1>
            </div>
        </center>
        <hr>
        <div id="profile">
            <center> <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"> </center><br><br>
            <b>Name: </b> <?php echo $userdata['name'] ?><br><br>
            <b>Mobile: </b> <?php echo $userdata['mobile'] ?><br><br>
            <b>Address: </b> <?php echo $userdata['address'] ?><br><br>
            <b>Status: </b> <?php echo $userdata['status'] ?><br><br>

        </div>
        <div id="Group">
            if($_SESSION['groupdata'];){

            }
        </div>
    </div>

</body>

</html>