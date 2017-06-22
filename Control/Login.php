<?php

require_once('Model/BaseFunc.php');
require_once('Message.php');

if(isset($_POST["log_state"])) {

    $log_state = $_POST["log_state"];
    $result = false;
    $respMs = "  ";

        //check email exists or not and authentify the password
        if (!empty($_POST['useremail']) && !empty($_POST['userpassword'])) {


            $email = $_POST['useremail'];
            $password = $_POST['userpassword'];
            if (checkUserExist($email)) {

                if (authentifyUser($email, $password)) {
                    //load the user to the session
                    $_SESSION['user'] = loadUser($email);

                    //update last signin
                    updatLastSignIn($email);
                    $result = true;
                } else {
                    $respMs = $message["ACCOUNT_PASSWORD_WRONG"];
                }
            } else {
                $respMs = $message["ACCOUNT_EMAIL_NOT_EXIST"];
            }
        } else {
            $respMs = $message["MESSAGE_INCOMPLETE"];
        }

      if ($result) {
            unset($result);
            unset($respMs);
            unset($log_state);
        } else {
           // echo "result " . $result . "resp " . $respMs . " state" . $log_state;
        }
}

?>
