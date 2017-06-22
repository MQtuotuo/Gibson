<?php

require_once('Model/Mail.php');
require_once('Model/UserDao.php');
require_once('Model/PollDao.php');
require_once('Model/PollMapDao.php');
//require_once('Message.php');



//================================================================ Main Menu =====================================================================
//===========Register ===============


//check whether email in right form and not  exists
function checkEmailNotUsed($email)
{
    $userdao = new UserDao();
    if (!$userdao->findByEmail($email)) {
        return true;
    } else {
        return false;
    }
}

//check password validation

function checkPassword($password)
{

    if (preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{4,12}$/', $password)) {

        return true;
    } else {
        return false;
    }


}


//create activation code
function generateActivationCode($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//send activecode
function sendActiveCode($email, $activcode, $username)
{
    global $active_message_sample;
    $subject = $active_message_sample["SUBJECT"];
    $message = "Hi " . $username . ", \r\n " . $active_message_sample["MESSAGE"] .
        $activcode . "\r\n  " . $active_message_sample["GREETING"];

   // echo "!!!!!!!!!ACTIVECODE sent:  " . $activcode . " <br>";
    return Mail::sendMail($email, $username, $subject, $message);
}


//match activecode
function matchActiveCode($activcode, $expectedcode)
{

    if ($activcode == $expectedcode) {
        return true;
    } else {
        return false;
    }
}


//register user
function registerUser($name, $email, $password, $access_level)
{
    $userdao = new UserDao();

    //encrypt password
    $password = sha1($password);

    if ($userdao->insert($name, $email, $password, $access_level)) {
        return true;

    } else {
        return false;
    }
}


//==========LOGIN PART===========


//check user exists

function checkUserExist($email)
{
    $userdao = new UserDao();
    $user = $userdao->findByEmail($email);
    if (!$user) {
        return false;
    } else {
        return true;
    }
}//authentification

function authentifyUser($email, $password)
{
    $userdao = new UserDao();
    $user = $userdao->findByEmail($email);

    // echo "auth : ".$email ."  pas: ".$password  ." type   ". gettype($user);

    if (sha1($password) == $user->getPassword()) {
        return true;
    } else {
        return false;
    }

}


//load user
function loadUser($email)
{


    $userdao = new UserDao();
    $user = $userdao->findByEmail($email);

    return $user;

}

function updatLastSignIn($email)
{

    $userdao = new UserDao();
    $userdao->updateLastSignIn($email);

}

function deleteUser($user)
{

    $userdao = new UserDao();
    return $userdao->delete($user->getId());


}


//================================================================ Main Menu  END!=====================================================================


//========================== Create Poll ============================

function generateUniqString($pid)
{

    $uniqStr = substr(md5($pid), 2, 6) . substr(uniqid(), 2, 6);
    return $uniqStr;
}


//this func only store the basic poll without result
function storePoll($poll)
{
    $pollDao = new PollDao();

    $pid = $pollDao->insert($poll);
    if (!$pid) {
        return false;
    } else {

        return $pid;
    }

}

function storePollMap($pollMap)
{

    $pollMapDao = new PollMapDao();
    if ($pollMapDao->insert($pollMap)) {
        return true;
    } else {
        return false;
    }
}





//send activecode
function sendPollurl($email, $pollurl, $username)
{
    $pollurl="www.gibson.com/".$pollurl;
    global $pollurl_message_sample;
    $subject = $pollurl_message_sample["SUBJECT"];
    $message = "Hi " . $username . ", \r\n " . $pollurl_message_sample["MESSAGE"] .
        $pollurl . "\r\n  " . $pollurl_message_sample["GREETING"];


//echo "sent : ".$message;
    return Mail::sendMail($email, $username, $subject, $message);
}




//==============================MyPolls=================================

function loadPollMap($useremail)
{

    $pollMapDao = new PollMapDao();

    $result = $pollMapDao->findByEmail($useremail);
    if (!$result) {
        return false;
    }
    return $result;
}


//=====================================Manage Poll=============================================
function loadPoll($pid)
{

    $pollDao = new PollDao();


    $result = $pollDao->findById($pid);
    if (!$result) {
        return false;
    }
    return $result;
}


function matchPollMapWithUrl($url)
{

    $pollMapDao = new PollMapDao();
    $result = $pollMapDao->findByUrl($url);
    //echo  $result ->getId();
    if (!$result) {
        return false;
    }
    return $result;


}

function updatePollBasic($pid, $poll)
{
    $pollDao = new PollDao();

    $result = $pollDao->updateBasic($pid, $poll);
    if (!$result) {
        return false;
    } else {

        return true;
    }

}

function updatePollResult($pid, $result)
{
    $pollDao = new PollDao();

    $result = $pollDao->updateResult($pid, $result);
    if (!$result) {
        return false;
    } else {

        return true;
    }


}


function updatePollMapBasic($poll)
{

    $pollMapDao = new PollMapDao();

    $result = $pollMapDao->updateBasic($poll);

    if (!$result) {
        return false;
    }
    return $result;
}


function updatePollMapResult($pid, $participants)
{

    $pollMapDao = new PollMapDao();
    //echo "updatePollMap".$pid." ;".$participants;
    $result = $pollMapDao->updateResult($pid, $participants);
    if (!$result) {
        return false;
    }
    return $result;
}


function deletePollAndMap($pid)
{

    $pollDao = new PollDao();
    $pollMapDao = new PollMapDao();

    $result = $pollDao->delete($pid);
    if ($result) {
        $result = $pollMapDao->delete($pid);
       // echo "pollMapDao" . $result;
        if ($result) {
            return true;
        }
    }
    return false;

}


//==================USER ACCOUNT MANAGEMENT=================

function changeUsername($email, $username)
{

    $userdao = new UserDao();
    echo $userdao->updateUsername($email, $username);
    if ($userdao->updateUsername($email, $username) > 0) {
        return true;
    } else {
        return false;
    }
}

function changePassword($email, $passNew)
{
    $userdao = new UserDao();
    if ($userdao->updatePassword($email, $password = sha1($passNew))) {
        return true;
    } else {
        return false;
    }
}

