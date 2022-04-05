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
        .transferhistorysystem{clear: both;padding:10%;background-image: url("bg.jpg");font-family: montserrat, sans-serif;height: 120vh;}
        thead{background-color:rgb(198, 179, 255);}
        th{padding:1.2%;}
        td{padding:1.2%;}
        tbody{background-color:rgb(234, 233, 236);}
        .view-customers-btn{border-radius: 30px;width: 180px;height: 40px;margin: 4%;margin-left:41%;background-color: rgba(0, 0, 0, 0.75);color: white;border: white solid;font-size: small;font-weight: 300;transition: all 0.8s;cursor: pointer;}
        .view-customers-btn:hover{background-color: white;color: black;border: rgb(198, 179, 255) solid;}     
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

    <?php
    include "connect.php";
    $history = $conn->query("SELECT * FROM transfer_money")->fetchAll(PDO::FETCH_ASSOC);
    ?>
      
    <!--Transfer History System-->
    <div class="transferhistorysystem">
    <button class="view-customers-btn" onclick="TOviewCustomers()">VIEW CUSTOMERS</button>
        <table width=50% style="text-align: center;margin-left:25%">
            <thead>
               <tr>
                    <th colspan="3">Sender</th>
                    <th colspan="3">Receiver</th>
                    <th colspan="3">Amount (in Rs.)</th>
                    <th colspan="5">Time</th>
               </tr>
            </thead>
            <tbody>
            <?php
                foreach ($history as $row) {
            ?>
                   <tr>
                        <td colspan="3"><?php echo $row['sender'] ?></td>
                        <td colspan="3"><?php echo $row['receiver'] ?></td>
                        <td colspan="3"><?php echo $row['balance'] ?></td>
                        <td colspan="5"><?php echo $row['time'] ?></td>
                   </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
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