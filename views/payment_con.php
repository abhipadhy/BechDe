<?php
    session_start();
    include("connection.php");
    $prid = array();// array to hold prod_id

    
    require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
    require("../vendor/phpmailer/phpmailer/src/SMTP.php");

    require '../vendor/autoload.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP
    global $row;

    if(!$conn){
        echo "mysqli_error($conn)";
    }else{
        $sql = "insert into order_data values ('$_GET[pid]','$_GET[oid]','$_GET[sig]',$_SESSION[uid]);";
        if(mysqli_query($conn,$sql)){
           $sql1= "select * from cart where user_id = $_SESSION[uid];";
           $res = mysqli_query($conn,$sql1);
           while($row =mysqli_fetch_assoc($res)){
               $sql2= "insert into purchased_prod values ($row[prod_id],$row[user_id],'$row[type]');";
               $sql9= "select name,email,pname from product,user_data where product.user_id = user_data.user_id AND product.prod_id=$row[prod_id];";

               $col =mysqli_fetch_assoc(mysqli_query($conn,$sql9));

               if($col){
                        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->IsSMTP(); // enable SMTP
            
                        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                        $mail->SMTPAuth = true; // authentication enabled
                        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465; // or 587
                        $mail->IsHTML(true);
                        $mail->Username = "bechde101@gmail.com";
                        $mail->Password = "ospproject";
                        $mail->SetFrom("bechde101@gmail.com",'Bechde');
                        $mail->Subject = "Your Product Has Been Sold";

                        if($row['type']=="sell"){
                            $mail->Body = $col['name']. ' your Product : ' .$col['pname']. ' has been sold';
                        }else {
                            $mail->Body = $col['name']. ' your Product : ' .$col['pname']. ' has been rented';
                        }
                      
                        $mail->AddAddress($col['email']);
            
                        if(!$mail->Send()) {
                            echo "Mailer Error: " ;
                        } 
               }

               if(mysqli_query($conn,$sql2)){
                   $sql3= "delete from cart where prod_id =$row[prod_id]  AND user_id =$row[user_id] ;";
                    if(mysqli_query($conn,$sql3)){
                            $sql4 = "update product SET stat ='sold' where prod_id = $row[prod_id];";
                            mysqli_query($conn,$sql4);
                    }
                    
               }
           }
        }
        

        $Message=urlencode('Payment Sucessful');
        header("Location:success.php?Message=$Message");
        die;
    }
    mysqli_close($conn);
?>