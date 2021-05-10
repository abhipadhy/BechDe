<?php

include('connection.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$domain = $_REQUEST['domain']; 

$sql = "insert into univ (name,domain) values ('$_REQUEST[name]','$domain') " ;

if (mysqli_query($conn, $sql)) {
    header("location:login.php");
}else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>