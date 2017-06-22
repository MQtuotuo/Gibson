<?php

$test="message.test";
$access_level=array("ADMIN","NORMAL");



//???%m1%
$active_message_sample = (array(
    "HADER" => "From: Gibson Team <user_team@gibson.com>",
    "SUBJECT" => "Active Gibson Account",
    "MESSAGE" => "Please use this code to active your Gibson account. \r\n",
    "GREETING" => "\r\n  -Your Gibson team"
));


$pollurl_message_sample = (array(
    "HADER" => "From: Gibson Team <user_team@gibson.com>",
    "SUBJECT" => "The link to your poll",
    "MESSAGE" => "This is the link for your poll,use it to invite others ~~~. \r\n",
    "GREETING" => "\r\n  -Your Gibson team"
));

$message = (array(

    //global
    "MESSAGE_INCOMPLETE"=>"Field can not be empty!",

    //register
    "ACCOUNT_EMAIL_IN_USE" => "Email is already in use!",
    "ACCOUNT_EMAIL_NOT_VALID" => "This email is invalid!",
    "ACCOUNT_EMAIL_VALID" => "Valid email",
    "ACCOUNT_PASSWORD_NOT_VALID"=>"Your password should contains numbers and letters, length with 4-12 characters !",
    "ACCOUNT_ACTIVE_CODE_SENT" => "Activation code has been sent to your email!",
    "ACCOUNT_ACTIVE_CODE_SENT_ERROR" => "Error happens during sending activecode!",
    "ACCOUNT_ACTIVE_CODE_MISMATCH"=>"Activation code does not match!",
    "ACCOUNT_ACTIVE_SUCCESS"=>"Activation succeeds!",
    "ACCOUNT_REGISTER_SUCCESS"=>"You have been successfully registered!",
    "ACCOUNT_REGISTER_FAILURE"=>"Register failed!",


    //login
    "ACCOUNT_EMAIL_NOT_EXIST" => "This email doesn't exists.You should register first!",
    "ACCOUNT_AUTHENTIFICATION_SUCCESS" => "The user login successfully!",
    "ACCOUNT_PASSWORD_WRONG" => "The password does not match the email account!",


    //user account managment
    "ACCOUNT_NAME_UPDATE_SUCCESS"=>"Account name updated successfully",
    "ACCOUNT_NAME_UPDATE_FAILED"=>"Account name updated failed",
    "ACCOUNT_NAME_UNCHANGED"=>"No information need to be changed",
    "PASSWORD_CONFIRMATION_UNMATCHED"=>"Two passwords needs to be identical!!",
    "PASSWORD_OLD_UNMATCH"=>"Wrong old password!",
    "PASSWORD_UPDATE_SUCCESS"=>"Account password updated successfully!",
    "PASSWORD_UPDATE_FAILED"=>"Account password updated failed!"

)
);