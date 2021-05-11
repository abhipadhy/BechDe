<?php

include('connection.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE from product where prod_id = $_GET[prod_id];" ;
$result =mysqli_query($conn, $sql);

if (!$result) {
    $Message = urldecode(mysqli_error($conn));
    header("Location:profile.php?Message=".$Message);
    die;
} else {
    $Message = urlencode("Product Removed ");
    header("Location:profile.php?Message=".$Message);
    die;
}
mysqli_close($conn);
?>