<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Passowrd</title>
    <link rel="icon" href="../Assets/logo1.png">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <nav class="navbar">
    <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="sign.php">Sign-Up</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

    <div class="container">
        <div class="right"> 
            <h2>Update Password</h2>

            <p style="text-align: center;color:red;text-transform:capitalize;font-size:90%; display:block" id="msg">
            
            <?php
                    if(isset($_GET['Message'])){
                        echo " $_GET[Message] ";
                    }else{
                        echo "";
                    }
            ?>
            <div class="form">
                <form method="POST" action="passupt.php">
                    <p>Enter New Password :</p>
                    <input type="text" id="input2" required placeholder="Enter New Password" name="pass1">
                    <p>Confirm Password :</p>
                    <input type="text" id="input3" required placeholder="Re-enter New Password" name="pass2"><br>
                    <button type="submit" id="login">Update Password</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>
</html>