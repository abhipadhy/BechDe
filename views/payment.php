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
    <title>Razorpay</title>
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

<div class="container"  style="height: 45%;margin-top:5%;">
        <div class="right"> 
            <h2>Payment</h2>
            <p style="text-align: center;color:red;text-transform:capitalize;font-size:90%; display:block" id="msg">

            <?php
                    if(isset($_GET['Message'])){
                        echo " $_GET[Message] ";
                    }else{
                        echo "";
                    }
            ?>

            </p>
            <div class="form">
                    <p style="margin-top:10%;">Proceed to Payment Gateway  :</p>
                    <button id="rzp-button1" class="login"><?php echo "Pay  ₹ " .$_SESSION['amount']*0.01;?></button>
               
            </div>
        </div>
    </div>
    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
<?php

echo "
var arr={};
var options = {
    'key': 'rzp_test_0aOn4w2JmEZpWt', // Enter the Key ID generated from the Dashboard
    'amount':$_SESSION[amount] , 
    'currency': 'INR',
    'name': 'BechDe',
    'image': '../Assets/logo.png',
    'order_id': '$_SESSION[order_id]',
    'handler': function (response){
     window.location.href='payment_con.php?pid='+response.razorpay_payment_id+'&oid='+response.razorpay_order_id+'&sig='+response.razorpay_signature;
    },
   
    'notes': {
        'address': 'Razorpay Corporate Office'
    },
    'theme': {
    'color': '#26133F'
    }
};
";

?>
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        document.getElementById('msg').innerHTML= 'response.error.description';
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
</body>
</html>