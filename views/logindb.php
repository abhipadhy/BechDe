<?php

$conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select user_id,name,univ,email,pass from user_data where email='$_REQUEST[email]' " ;
$result =mysqli_query($conn, $sql);

if (mysqli_num_rows($result)!=0) {
    
    $row = mysqli_fetch_assoc($result); 
    if (password_verify($_REQUEST['pass'], $row['pass']) ) {
        
        session_start();                        //session starts here
        $_SESSION['uid']=$row['user_id'];       //user_id stored in session
        $_SESSION['name']=$row['name'];         //user_name stored in session
        $_SESSION['univ']=$row['univ'];         //user_university stored in session

        header("location:home.php");
    } else {
        $Message = urlencode("Invalid password ");
        header("Location:login.php?Message=".$Message);
        die;
    }

} else {
    $Message = urlencode("User Does not exist");
    header("Location:login.php?Message=".$Message);
    die;
}
mysqli_close($conn);
?>