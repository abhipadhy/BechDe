<?php 
session_start();
if(isset($_GET['message']))
if($_GET['message']=='logout')
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/payment.css">
    <title>Payment Successful</title>
    <link rel="icon" href="../Assets/logo1.png">
</head>
<body>
<nav class="navbar">
  <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
    <ul>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="viewcart.php">View Cart</a></li>
      <li><a href="login.php?message=logout&Message=Logged%20Out.">Logout</a></li>

    </ul>
</nav>

        <div class="right"> 
            <h2 style="text-align: center;color:#796FE9;text-transform:capitalize;font-size:30px; font-weight :600;display:block;margin-top:2%;" id="msg">
            <?php
                    if(isset($_GET['Message'])){
                        echo " $_GET[Message] ";
                    }else{
                        echo "";
                    }
            ?>

            </h2>
            <br>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_jhgfgv8n.json"  background="transparent"  speed="0.5"  style="width: 300px; height: 300px;margin-left:38%;"  loop  autoplay></lottie-player>
            <p style="text-align: center;text-transform:capitalize;font-size:20px">redirecting to cart page</p>
        </div>
    <footer style="margin-top:5%">
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>


</body>

<script>
    
    window.addEventListener('load',setTimeout(function(){
         window.location.href="viewcart.php";
        }, 3000));
</script>
</html>