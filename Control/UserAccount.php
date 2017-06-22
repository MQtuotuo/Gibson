<?php

require_once('Model/BaseFunc.php');
require_once('Message.php');


$user = $_SESSION["user"];
$email = $user->getEmail();

$refresh=0;
if (isset($_POST["name"])&&!empty($_POST["name"])) {
    $nameNew = $_POST["name"];

    if ($user->getName() != $nameNew) {
        if (changeUsername($email, $nameNew)) {
            echo $message["ACCOUNT_NAME_UPDATE_SUCCESS"];
            $_SESSION["user"]=loadUser($email);
            $refresh=1;
        } else {
            echo $message["ACCOUNT_NAME_UPDATE_FAILED"];
        }
    } else {
        echo $message["ACCOUNT_NAME_UNCHANGED"];
    }

}

if (isset($_POST["oldpass"]) || isset($_POST["newpass"]) || isset($_POST["confirmpass"])) {


    $passresult = false;
    $passOld = $_POST["oldpass"];
    $passNew = $_POST["newpass"];
    $passCon = $_POST["confirmpass"];
    if (!empty($passOld) && !empty($passNew) && !empty($passCon)) {
        if ($passNew == $passCon) {
            if ($user->getPassword() == sha1($passOld)) {

                if(changePassword($email,$passNew)) {

                    $respMs = $message["PASSWORD_UPDATE_SUCCESS"];
                    $passresult = true;
                    $_SESSION["user"] = loadUser($email);

                }else{
                    $respMs = $message["PASSWORD_UPDATE_FAILED"];

                }

            } else {
                $respMs = $message["PASSWORD_OLD_UNMATCH"];
            }
        } else {
            $respMs = $message["PASSWORD_CONFIRMATION_UNMATCHED"];
        }
    } else {
        $respMs = $message["MESSAGE_INCOMPLETE"];

    }
}



/**
 * profile:  name, address, time zone
 *
 */







 