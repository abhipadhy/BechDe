<?php 

include('connection.php');

session_start();
if(!$conn){
    echo "mysql error : " .$mysqli_error($conn);
}else{
    $sql1= "select user_id from product where prod_id =$_GET[prod_id];";
    if($r= mysqli_query($conn,$sql1)){
        $id= mysqli_fetch_assoc($r);
        if($_SESSION['uid']!= $id['user_id']){
            $sql = "insert into cart values ($_GET[prod_id],$_SESSION[uid],'$_GET[type]');";
            if($res=mysqli_query($conn,$sql)){
                $Message = urldecode('Product Added To The Cart');
                header("Location:viewcart.php?Message=$Message");
            }else{
                $str =mysqli_error($conn);
                if(str_contains($str,'Duplicate')){
                    $Message = urlencode('Product Already Added To The Cart');
                }else{
                    $Message = urlencode(mysqli_error($conn));
                }
                header("Location:viewcart.php?Message=$Message");    
            }
        }else{
            $Message = urlencode('Unable To Add Product To Cart listed By You');
            header("Location:viewcart.php?Message=$Message");  
        }
    }
   
}
mysqli_close($conn);
?>