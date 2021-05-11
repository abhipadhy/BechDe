<?php 
session_start();
if(isset($_GET['message']))
if($_GET['message']=='logout')
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <link rel="icon" href="../Assets/logo1.png">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/login.css'>
</head>

<body>
    <nav class="navbar">
    <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
      <ul>
        <li><a href="sign.php">SignUp</a></li>
        <li><a href='reguni.php'>Register university</a></li>
      </ul>
    </nav>

    <div class="container">
        <div class="right"> 
            <h2>Sign-in</h2>
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
                <form method="POST" action="logindb.php">
                    <p>Email :</p>
                    <input type="text" id="input2" required placeholder="Enter Email Address" name="email" > 
                    <p>Password :</p>
                    <input type="password" id="input3" required placeholder="Enter Password" name="pass" ><br>
                    <button type="submit" id="login">Sign-In</button>
                </form>
                <p  id="forgot"><a href="forpass1.php" style="text-decoration: none;">forgot password ?</a></p>
            </div>
        </div>
    </div>

    <footer>
        <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0%;">bechde</h1>
        <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
    </footer>
</body>

<script type="text/javascript">
    const inp = document.querySelectorAll('input');
    
    for(i=0;i<inp.length;i++){
        inp[i].addEventListener('input',()=>{
            var hold = document.querySelector("#msg").innerHTML;
                if(hold != ''){
                    document.querySelector("#msg").innerHTML = '';
                    document.querySelector("#msg").style.transition = "0.4s";
                }
                
        });
    }
  
</script>

</html>


