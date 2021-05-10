<?php 

include('connection.php');

session_start();
if(!$conn){
    echo "mysql error : " .$mysqli_error($conn);
}else{
    $sql = "select * from product,cart where product.prod_id = cart.prod_id AND cart.user_id = $_SESSION[uid]; ";
    if($res=mysqli_query($conn,$sql)){
            $flag=0;
            $msg='Product : ';
            while($row = mysqli_fetch_assoc($res)){

                if($row['stat']!= 'available'){
                    $flag++;
                    $msg  = $msg . $row['pname'] . ' , ';
                }
            }

            if($flag!=0){
                $msg = urlencode($msg . 'not available for checkout . Kindly remove from cart');
                header("Location:viewcart.php?Message=$msg");
                die;
            }
        
    }
}
mysqli_close($conn);
?>