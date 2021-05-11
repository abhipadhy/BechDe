<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up</title>
    <link rel="icon" href="../Assets/logo1.png">
    <link rel="stylesheet" href="../css/sign.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
   
  
</head>
<body>
    <nav class="navbar">
    <a href="home.php" style="text-decoration: none; margin-left:5%;"><h1>BechDe</h1></a>
      <ul>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>


    
 <div class="left">
    <img
    src="../Assets/default.png"
    alt=""
    loading="lazy"
    id="blah"
    style=" border: 2px solid #bbaff06a;"
  /><br />

  <input
    type="file"
    onchange="readURL(this);"
    id="upload"
    accept="image/*"
    hidden
  />
  <br>
  <label for="upload" id="upload-btn" >Choose Image</label>
  <br><br>
  <p style="text-align: center;margin-left: 5%;text-transform:capitalize">Image size should be less than 1 Mb</p>
 </div>

 <div class="right">
    <p style="text-align: left;color:red;text-transform:capitalize;font-size:90% ;margin-left:5%; display:block" id="msg">
                <?php
                        if(isset($_GET['Message'])){
                            echo " $_GET[Message] ";
                        }else{
                            echo "";
                        }
                ?>
                </p>
    <div class="form">
      <form method="POST" action="signdb.php">
        <p>Username :</p>
        <input type="text" id="input1" required placeholder="Enter Username" name="input1"/>
        <p>Email :</p>
        <input type="text" id="email" required placeholder="Enter Email" name="input2"/>
        <p>Mobile Number :</p>
        <input type="text" id="mob" required placeholder="Enter Mobile Number" class="phone" style="width: 100%;" name="input3" />
        <p>Hostel Block Name :</p>
        <input type="text" id="input2" required placeholder="Enter Hostel Block Name" name="input4" autocomplete="off"/>
        <p>University Name :</p>

        <select name="input5" id="univ" required  >
            <option value="" disabled selected style="color: opacity=0.5;">Select From The Univeristy</option>

            <?php
                include('connection.php');
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "select name from univ order by name ASC";
                    $result =mysqli_query($conn, $sql);
                    
                    if (mysqli_num_rows($result)!=0) {
                        
                        while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                            echo "<option value='$row[0]' style='text-transform:capitalize;'>$row[0]</option>" ;
                        } 
                       
                      
                    
                    } 
              mysqli_close($conn);
            ?>

        </select>
        <br />

        <p>Password :</p>
        <input type="password" id="input3" required placeholder="Enter Password" name="input6"/><br />
        <input type="text" id="input5" value="" hidden name="input7" />
        <button type="submit" id="signup">Signup</button>
      </form>
    </div>
  </div>

  <footer>
    <h1 style="text-align: center; text-transform: capitalize;color: #26133F;margin-left: 0;">bechde</h1>
    <p style="text-align: center; text-transform: capitalize;color: #000000;">Copyright © 2021 bechde. All rights reserved</p>
</footer>
</body>
<script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        if(input.files[0].size > 1000000){
          alert("file size too big");
        }
        else{
          var reader = new FileReader();
          
          reader.onload = function (e) {
            $("#blah").attr("src", e.target.result);
            $("#input5").attr("value", e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        }
       
      }
    }
  </script>

  <script>
   const inp = document.querySelectorAll('input');
    
    for(i=0;i<inp.length;i++){
        inp[i].addEventListener('input',()=>{
            var hold = document.querySelector("#msg").innerHTML;
                if(hold != ''){
                    document.querySelector("#msg").innerHTML = '';
                    document.querySelector("#msg").style.transition = "0.4s"; 
                    document.getElementById("email").style.borderColor = "#bbaff09a";
                    document.getElementById("mob").style.borderColor = "#bbaff09a";
                }
                
        });
    }

  </script>

  <script type="text/javascript">
  
  window.addEventListener('load',  ()=>{
    var p = document.querySelector("#msg").innerHTML;
    p = (p.trim) ? p.trim() : p.replace(/^\s+/,'');
    
        if(p != ''){
            var msg = document.querySelector("#msg").innerHTML;
            if(msg.includes('email')==true){
              document.getElementById("email").style.borderColor = "#ff565e";
              document.querySelector("#email").style.transition = "0.4s";
            }else if(msg.includes('Mobile')==true){
              document.getElementById("mob").style.borderColor = "#ff565e";
              document.querySelector("#mob").style.transition = "0.4s";
            }else{
              document.getElementById("email").style.borderColor = "#ff565e";
              document.querySelector("#email").style.transition = "0.4s";
              document.getElementById("mob").style.borderColor = "#ff565e";
              document.querySelector("#mob").style.transition = "0.4s";
            }
        }
    });

  </script>
 
</html>