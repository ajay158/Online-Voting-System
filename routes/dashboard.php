<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if ($_SESSION['userdata']['status'] == 0) {
    $status = '<b style = "color:red" > Not Voted </b>';
} else {
    $status = '<b style = "color:green"> Voted </b>';
}

?>

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

        #votebtn {
            background-color: #3498db;
            color: white;
        }

        #mainpanel {
            padding: 10px;
        }

        #voted {
            background-color: green;
            color: white;
            /* border-radius: 5px; */
        }
    </style>

    <div id="mainSection">
        <center>
            <div id="headerSection">
                <a href="../"><button class="backbtn" id="loginbtn"> Back</button></a>
                <a href="logout.php"> <button class="logoutbtn" id="loginbtn"> Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
        </center>
        <hr>
        <div id="mainpanel">

            <div id="profile">
                <center> <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"> </center><br><br>
                <b>Name: </b> <?php echo $userdata['name'] ?><br><br>
                <b>Mobile: </b> <?php echo $userdata['password'] ?><br><br>
                <b>Address: </b> <?php echo $userdata['address'] ?><br><br>
                <b>Status: </b> <?php echo $status ?><br><br>

            </div>
            <div id="Group">
                <?php
                if ($_SESSION['groupsdata']) {
                    for ($i = 0; $i < count($groupsdata); $i++) {
                ?>
                        <div>
                            <img style="float: right;" src="../uploads/ <?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
                            <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?> <br><br>
                            <b>Votes: </b> <?php echo $groupsdata[$i]['votes'] ?> <br><br>
                            <form action="../api/vote.php" method="POST">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php
                                if ($_SESSION['userdata']['status'] == 0) {
                                ?>
                                    <input type="submit" name="votebtn" value="vote" id="votebtn" id="loginbtn">
                                <?php
                                } else {
                                ?>
                                    <button disabled type="button" name="votebtn" value="vote" id="voted" id="loginbtn">Voted</button>
                                <?php
                                }
                                ?>
                            </form>
                        </div>
                        <hr>
                <?php
                    }
                } else {
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>