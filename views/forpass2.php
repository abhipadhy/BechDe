<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Pass</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<nav class="navbar">
        <h1>BechDe</h1>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="sign.php">Sign-Up</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>

    <div class="container"  style="height: 55%;">
        <div class="right"> 
            <h2>Forgot Password</h2>
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
                <form method="POST" action="vcode.php">
                    <p>Enter Verfication Code  :</p>
                    <input type="text" id="input3" required placeholder="Enter Your Code" name="vcode"><br>
                    <button type="submit" id="login">Verify</button>
                </form>
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