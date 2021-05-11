<?php
        include_once('connection.php');
        session_start();
        require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
        require("../vendor/phpmailer/phpmailer/src/SMTP.php");

        require '../vendor/autoload.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP

        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

$pass = password_hash($_REQUEST['input6'], PASSWORD_DEFAULT); // hashing the entered password 
$flag=0;
$eflag=0;


if ( !preg_match( "/(^[6-9]\d{9}$)/", $_REQUEST['input3'] ) ) {
   $flag++;
} 

$sql1="SELECT domain from univ where name='$_REQUEST[input5]';";
$result = mysqli_query($conn, $sql1);

if($result){
        if (mysqli_num_rows($result)!=0) {
            $row = mysqli_fetch_array($result,MYSQLI_NUM);
                $domain=$row[0];
                echo $domain;
                if ( !preg_match( "/(^[a-zA-Z0-9+_.-]+@".$domain."$)/", $_REQUEST['input2'] ) ) {
                $eflag++;
            } 
        }
}else{
    echo mysqli_error($conn);
    $eflag++;
}

     if($flag==0 && $eflag==0){

        if($_REQUEST['input7'] !=''){
                $sql="UPDATE user_data SET name = '$_REQUEST[input1]',
                email = '$_REQUEST[input2]', 
                mob = '$_REQUEST[input3]',
                hblock = '$_REQUEST[input4]',
                univ = '$_REQUEST[input5]',
                pass = '$pass',
                dp = '$_REQUEST[input7]'
                WHERE user_id = $_SESSION[uid];";

        }else{
                $sql="UPDATE user_data SET name = '$_REQUEST[input1]',
                email = '$_REQUEST[input2]', 
                mob = '$_REQUEST[input3]',
                hblock = '$_REQUEST[input4]',
                univ = '$_REQUEST[input5]',
                pass = '$pass'
                WHERE user_id = $_SESSION[uid];";
        }
       

        if (mysqli_query($conn, $sql)) {
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
            $mail->Subject = "Welcome $_REQUEST[input1]";
            $mail->Body = 'Hi '.$_REQUEST['input1']. ' , your profile has been updated ';
            $mail->AddAddress($_REQUEST['input2']);

            if(!$mail->Send()) {
                echo "Mailer Error: " ;
            } else {
                $msg = urlencode('Profile Updated');
                header("location:profile.php?Message=$msg");
            }

          
        } else {

            $str =mysqli_error($conn);
            if(str_contains($str,'Duplicate')){
                $Message = urlencode('User Email Already Exists');
            }else{
                $Message = urlencode(mysqli_error($conn));
            }
            header("Location:editprof.php?Message=".$Message);
            die;
        }


     }else if($flag!=0 && $eflag==0){
        $Message = urlencode("Mobile Number invalid");
        header("Location:editprof.php?Message=".$Message);
        die;
        
     }else if($eflag!=0 && $flag==0){
        $Message = urlencode("Entered email does not exist to the selected University");
        header("Location:editprof.php?Message=".$Message);
        die;
     }else{
        $Message = urlencode("Email and Phone number invalid");
        header("Location:editprof.php?Message=".$Message);
        die;
     }
mysqli_close($conn);
?>