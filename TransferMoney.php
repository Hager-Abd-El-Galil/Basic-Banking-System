<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System | Transfer Money</title>
    <link rel = "icon" href = "images/icon.jpg" type = "image/x-icon"><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/d435b084ae.js" crossorigin="anonymous"></script>
    <link href="Style.css" rel="stylesheet">
    <script src="Script.js"></script>
    <style>
        .transfersystem{clear: both;padding:15%;background-image: url("bg.jpg");font-family: montserrat, sans-serif;height: 85vh;}
        .Transferbtn .sendbtn{background-color: #fff;border-radius: 30px;border: black solid;width: 100px;height: 35px;margin:3%;margin-left:40%;color: black;font-size: medium;font-weight: 300;transition: all 0.8s;cursor: pointer;}
        .Transferbtn .sendbtn:hover{background-color:  rgba(0, 0, 0, 0.75);color: white;border: white solid}
        
    </style>
</head>

<body>
    <!--Nav bar-->
    <nav>
        <ul>
            <li class="Home" onclick="TOHome()">Home</li>
            <li onclick="TOAbout()"> About</li>
            <li onclick="TOContact()"> Contact</li>
        </ul>
        <img src="images/logo.png" width=50px height=50px>
        <h1>The Sparks Foundation</h1>
    </nav>

    <!--MYSQL Database Connection & Transfer System-->
    <?php 
    include "connect.php";
    $quary="SELECT * FROM user ";
    $sender_id = $_GET['id'];
    $sender_data = $conn->query("SELECT * FROM user where id=$sender_id")->fetchAll(PDO::FETCH_ASSOC);
    $customers = $conn->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_POST['submit'])) {
        $to = $_POST['to'];
        $selected = $conn->query("SELECT `balance` FROM `user` WHERE id=$to")->fetch();
        $sender = $conn->query("SELECT `balance` FROM `user` WHERE id=$sender_id")->fetch();
        $sender_name = $conn->query("SELECT `name` FROM `user` WHERE id=$sender_id")->fetch();
        $selected_name = $conn->query("SELECT `name` FROM `user` WHERE id=$to")->fetch();
        $amount = $_POST['amount'];
        $receiverBalance = $selected[0] + $amount;
        $senderBalance = $sender[0] - $amount;
        if ($amount <= 0) {
            echo '<script> alert("The Amount is NEGATIVE or ZERO")</script>';
        } elseif ($amount > $sender[0]) {
            echo '<script> alert("Your Balance is not ENOUGH")</script>';
        } else {
            $senderUpdate = " UPDATE user
            SET `balance` = $senderBalance
            WHERE `id` =$sender_id";
            $conn->exec($senderUpdate);
            $receiverUpdate = " UPDATE user
            SET `balance` = $receiverBalance
            WHERE `id` =$to";
            $conn->exec($receiverUpdate);
            $sql = "INSERT INTO transfer_money (sender,receiver,balance) VALUES('$sender_name[0]','$selected_name[0]','$amount')";
            $conn->exec($sql);
            header("location:TransferHistory.php");
        }
        $amount = 0;
    }
    ?>

    <!--Transfer Money Form-->
    <div class="transfersystem">
        <form class="Frame" method="POST" style=" margin-left:20%;margin-top:4%;width:60%; outline:2px solid black;border-radius:40px;">
        <div class="entername">
            <label for="formGroupExampleInput"style="font-size: large;margin-left:27%;margin-top:3%;"><i><b>Transfer to:</b></i></label>
            <select style="outline:1px solid rgb(122, 122, 233);margin-top:3%" class="form-control" id="formGroupExampleInput" name="to" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                    foreach ($customers as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>">
                    <?php
                    $receiver_name = $row['name'];
                    $receiver_balance = $row['balance'];
                    echo "{$receiver_name} (balance:{$receiver_balance})";
                    ?>
                    </option> 
                    <?php
                    }
                    ?>
            </select>
        </div>
        
        <div class="Enteramount">
                <label for="inputEmail4" class="form-label" style="font-size: large;margin-left:27%;margin-top:3%"><i><b>Amount:</i></b></label>
                <input style="outline:1px solid rgb(122, 122, 233);margin-top:3%" name="amount" type="text" required class="form-control" id="inputEmail4">
        </div>

        <div class="Transferbtn">
                <button name="submit" type="submit" class="sendbtn">Transfer</button>
        </div>
    </form>
    </div>

    <!--footer-->
    <footer>
            <div class="footer">
                <div class="icon">
                    <ul>
                        <li><i class="fab fa-facebook"></i></li>
                        <li><i class="fab fa-linkedin-in"></i></li>
                        <li><i class="fab fa-pinterest"></i></li>
                        <li><i class="fab fa-twitter"></i></li>
                    </ul>
                </div>
                <p>2019 - 2022 © Hager. Design by SRBThemes.</p>
            </div>
    </footer>     
</body>

</html>