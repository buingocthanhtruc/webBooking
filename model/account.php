<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    session_start();
    function register($email , $user, $pass ,$address , $tel){
        $query =  "INSERT INTO `taikhoan`( `email`, `user`, `pass` , `address`, `tel` ) 
        VALUES ('$email','$user','$pass','$address' , '$tel')";
        pdo_execute($query);
    }
    function login($email ,$pass){
        $sql = "SELECT * FROM `taikhoan` WHERE `email` = '$email' AND `pass` = '$pass'";
        $checktk = pdo_query_one($sql);
        if($checktk){
            $_SESSION['user'] = $checktk;
        }else{
            return "vui lòng kiểm tra lại thông tin tài khoản";
        }
    }
    function quenmk($email){
        $sql = "SELECT * FROM `taikhoan` WHERE `email`='$email'";
        $infoUser = pdo_query_one($sql);
        if($infoUser){
            guiPassword($infoUser['email'] ,$infoUser['pass'] ,$infoUser['user']);
            return "Gui thanh cong";
        }
        else{
            return "Email khong ton tai tren he thong";
        }
    }
    function guiPassword($email , $password , $userName){
       require 'PHPMailer/src/PHPMailer.php';
       require 'PHPMailer/src/SMTP.php';
       require 'PHPMailer/src/Exception.php';
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '64d434fcd9a613';                     //SMTP username
            $mail->Password   = '4c4e95b7c9955a';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('trucbntph33131@example.com', 'trucbntph33131');
            $mail->addAddress($email, $userName);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password';
            $mail->Body    = "Mật khẩu của bạn là : <b>$password</b>";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo "<span class='text-danger'>Mật khẩu đã được gửi đến email : $email</span>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    function getAllUser(){
        $sql = "SELECT * FROM `taikhoan` WHERE 1";
        return pdo_query($sql);
    }
    function updateInfo($id,$user,$address,$tel,$pass ,$avt){
        $sql = "UPDATE `taikhoan` SET `user`='$user' , `address`='$address' , `tel`='$tel' , `pass`='$pass',`avt`='$avt'
         WHERE `id`= $id";
        pdo_execute($sql);
    }
?>