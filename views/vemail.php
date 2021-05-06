<?php

        require("../vendor/phpmailer/phpmailer/src/PHPMailer.php");
        require("../vendor/phpmailer/phpmailer/src/SMTP.php");

        require '../vendor/autoload.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP

        $conn = mysqli_connect("localhost", "bechde", "bechde", "bechde");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $email= $_REQUEST['vemail'];
        $sql = "select email from user_data where email= '$email' " ;
        $result =mysqli_query($conn, $sql);



        if(mysqli_num_rows($result)!=0){

            session_start();
            $_SESSION['code']=rand(1000,9999); // storing the generated code in session 
            $_SESSION['uemail']=$email; // storing the user email in session

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
            $mail->Subject = "Code For Password Reset";
            $mail->Body = 'Code For Password Reset : ' . $_SESSION['code'];
            $mail->AddAddress($email);

            if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                
                header("location:forpass2.php");
            }
        }else{
            $Message = urlencode("User Email Does not Exist");
            header("Location:forpass1.php?Message=".$Message);
            die;
        }

mysqli_close($conn);
?>