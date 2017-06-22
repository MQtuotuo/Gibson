<?php

$emailarr = $_SESSION["email"];

//$regInfo=array("email"=>"!!!!!","email2"=>"~~~~");
//$register_status = array_fill_keys(array("EMAIL_CHECKED", "ACTIV_CODE_SENT", "ACTIVED", "REGISTERED"), false);


function check($email)
{

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        global $respMs, $register_status;
        $respMs["email"] = "valid";
        $register_status["EMAIL_CHECKED"] = true;

    }
}


function add($email)
{


    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


        global $emailarr;

        echo "add before:" .       var_dump($_SESSION["email"])+"<br>";

        array_push($emailarr, $email);
        $_SESSION["email"] = $emailarr;
        var_dump($_SESSION["email"]);
    }
}

if (!empty($_POST['email'])) {
    add($_POST['email']);
}

