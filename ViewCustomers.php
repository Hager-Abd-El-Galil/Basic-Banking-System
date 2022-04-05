<!DOCTYPE >
<html>
    <head>
        <title>Basic Banking System | View Customers</title>
        <link rel = "icon" href = "images/icon.jpg" type = "image/x-icon"><meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/d435b084ae.js" crossorigin="anonymous"></script>
        <link href="Style.css" rel="stylesheet">
        <script src="Script.js"></script>
        <style>
            .customersystem{clear: both;background-image: url("bg.jpg");font-family: montserrat, sans-serif;height: 170vh;}
            .Viewcustomers h5{padding-top: 13%;font: 2.5em sans-serif;color:rgb(122, 122, 233);padding-bottom: 5%;}
            thead{background-color:rgb(198, 179, 255);}
            th{padding:1.2%;}
            tbody{background-color:rgb(234, 233, 236);}
            .Transfermoney{padding-left: 43%;padding-top: 4%;}
            .send-money-btn{border-radius: 30px;width: 110px;height: 35px;margin: 4%;background-color: rgba(0, 0, 0, 0.55);color: white;border: white solid;font-size: small;font-weight: 300;transition: all 0.8s;cursor: pointer;}
            .send-money-btn:hover{background-color: white;color: black;border: rgb(198, 179, 255) solid;}
            
        </style>
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

        <!--Customer System-->
        <div class="customersystem">
        <div class="Viewcustomers" align="center">
            <h5><b>Our Customers</b></h5>
            <?php 
            $conn=mysqli_connect("basicbankingsystem","root","","bankingsystem");
                if (! $conn){
                    echo mysqli_connect_error();
                    exit;
                }
                $quary="SELECT * FROM user ";
                $result=mysqli_query($conn,$quary);
            ?> 
            <!--Customer Table-->
            <table width=45% style="text-align: center;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th colspan="2">Name</th>
                    <th colspan="2">Email</th>
                    <th colspan="2">Balance</th>
                    <th colspan="3">Transfer Money</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td colspan="2"><?=$row['name']?></td>
                        <td colspan="2"><?=$row['email']?></td>
                        <td colspan="2"><?=$row['balance']?></td>
                        <td colspan="3"><a href="TransferMoney.php?id= <?php echo $row['id']; ?>"> <button class="send-money-btn">SEND MONEY</button></a></td>
                        </tr>
                <?php } ?>
            </tbody>
            </table>
         </div>
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
    
