<?php 
include('connection.php');
require '../vendor/razorpay/razorpay/src/Api.php';
require '../vendor/autoload.php';
use Razorpay\Api\Api;
$api = new Api("rzp_test_0aOn4w2JmEZpWt", "JSV6FZiHVEOcaBTV7boY9YxX");


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
            else{
                if($res=mysqli_query($conn,$sql)){
                    $cart_total =0;
                    while($row = mysqli_fetch_assoc($res)){
                        if($row['type']=='buy'){
                            $cart_total=$cart_total+$row['sell'];
                        }
                        else
                        $cart_total=$cart_total+$row['rent'];
                    }
                    $order = $api->order->create(array(  'amount' =>$cart_total*100,  'currency' => 'INR' ));
                    $_SESSION['order_id']=$order['id'];
                    $_SESSION['amount']=$order['amount'];
                  header("Location:payment.php");
                }
                
            }
        
    }
}
mysqli_close($conn);
?>