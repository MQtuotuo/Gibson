<?php



require_once("phpmailer/PHPMailerAutoload.php");
require_once("config.php");


class Mail
{

    protected static $host;
    protected static $username;
    protected static $password;
    protected static $port;


    public static function setConf($host, $username, $password, $port)
    {
        //echo $host . " " . $username . " " . $password . " " . $port;
        self::$host = $host;
        self::$username = $username;
        self::$password = $password;
        self::$port = $port;
    }

    public static function  sendMail($to, $username, $subject, $message)
    {

        $mail = new PHPMailer;
        $mail->isSMTP();
        // Set mailer to use SMTP
        $mail->Host = self::$host; //'smtp.gmail.com';  // Specify main and backup SMTP servers
        //$mail->SMTPDebug=true;
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = self::$username;//'grumpyzqj00@gmail.com';                 // SMTP username
        $mail->Password = self::$password;//'zqjtest123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = self::$port;//587;

        $mail->From = 'team@gibson.com';
        $mail->FromName = 'GibsonTeam';
        $mail->addAddress($to, $username);// Add a recipient

        $mail->Subject = $subject;
        $mail->Body = $message;

        try {
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                return false;
            } else {
                return true;

            }
        } catch
        (phpmailerException $e) {

            echo "error message <br>:" . $e->getMessage();
        }

    }


}


Mail::setConf($mail_smtpserver, $mail_account, $mail_password, $mail_port);
?>
