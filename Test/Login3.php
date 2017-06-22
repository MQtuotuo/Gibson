<?php

require_once('Model/BaseFunc.php');
require_once('Message.php');

if (!isset($_SESSION["login"])) {

    /**
     * login:
     * UNLOGIN,RELOGIN,LOGINED
     */
    $_SESSION["login"] = "UNLOGIN";
    //echo 'set $_SESSION["login"]='.$_SESSION["login"];

}


if (isset($_SESSION["login"]) && $_SESSION["login"] == "UNLOGIN"&&isset($_POST['useremail'])) {

    //init session
    $_SESSION['result']=false;


    //check email exists or not and authentify the password
    if (!empty($_POST['useremail']) && !empty($_POST['userpassword'])) {



        $email = $_POST['useremail'];
        $password = $_POST['userpassword'];
        if (checkUserExist($email)) {

            if (authentifyUser($email, $password)) {
                //load the user to the session
                $_SESSION['user']=loadUser($email);



              //  var_dump($_SESSION['user']);

                //maybe useless!!!!!!!!!!!
              //  $respMs = $message["ACCOUNT_AUTHENTIFICATION_SUCCESS"];
               $_SESSION['result']=true;


            } else {
                $respMs = $message["ACCOUNT_PASSWORD_WRONG"];
            }
        } else {
            $respMs = $message["ACCOUNT_EMAIL_NOT_EXIST"];
        }

    }else {
        $respMs = $message["MESSAGE_INCOMPLETE"];
    }


    if($_SESSION['result']){
        unset($_SESSION['result']);
        unset($_SESSION['login']);
    }else{
        $_SESSION["login"] = "RELOGIN";
        echo $_SESSION['result']."<br>" .$_SESSION['login'].$respMs ;
    }


}

/*

if(isset($_SESSION["user"])){


    echo "user already exists" .var_dump($_SESSION["user"]);
    //include_once("Site/Basic_site/mypoll.php");
    header("Location:mypoll.php");
}

*/