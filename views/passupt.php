<?php
     $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }

    $pass1 = $_REQUEST['pass1'];
    $pass2 = $_REQUEST['pass2'];
    
    if($pass1 == $pass2){
        $pass = password_hash($pass1, PASSWORD_DEFAULT); // hashing the entered password 
        session_start();
        $sql = "update user_data SET pass = '$pass' where email= '$_SESSION[uemail]';";

        if($res=mysqli_query($conn,$sql)){
            $Message = urlencode("Password Updated!");
            header("Location:login.php?Message=".$Message);
            die;
        }else{
            $Message = urlencode("Password Can't be updated");
            header("Location:newpass.php?Message=". $Message);
            die;
        }
      
    }else{
        $Message = urlencode("Password Do not match");
        header("Location:newpass.php?Message=".$Message);
        die;
    }
   
?>