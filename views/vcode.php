<?php

    $code = $_REQUEST['vcode'];
    session_start();
    if($_SESSION['code'] == $code ){
        header("location: newpass.php");
    }else{
        $Message = urlencode("Entered code is incorrect");
        header("Location:forpass2.php?Message=".$Message);
        die;
    }

?>





