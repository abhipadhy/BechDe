<?php


    $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

   if(isset($_SESSION['uid'])){
        $sql1="insert into product (user_id,pname,rent,sell,descp,tag,img1,img2,img3) values ('$_SESSION[uid]','$_REQUEST[pname]','$_REQUEST[rent]','$_REQUEST[sell]','$_REQUEST[descp]','$_REQUEST[tag]','$_REQUEST[img1]','$_REQUEST[img2]','$_REQUEST[img3]');";
        $result = mysqli_query($conn, $sql1);

        if($result){
            $Message = urlencode("Product added");
            header("Location:home.php?Message=".$Message);
            die;
        }else{
            $Message = urlencode("Unable to list product");
            header("Location:sell.php?Message=".$Message);
            die;
        }
   }else{
        $Message = urlencode("Please login to Continue");
        header("Location:login.php?Message=".$Message);
        die;
   }
mysqli_close($conn);
?>