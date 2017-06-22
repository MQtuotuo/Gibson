<?php
/**
 * Created by PhpStorm.
 * User: jennyzhou
 * Date: 1/7/15
 * Time: 7:57 PM
 */


require_once('Model/BaseFunc.php');
require_once('Message.php');

$poll = new Poll();
$EDIT=0;
$_SESSION["finished"]=false;
if (isset($_POST["pollaction"])) {
    if ($_POST["pollaction"] == "edit") {

        //var_dump($_SESSION["poll"]);

        $poll = $_SESSION["poll"];
        $_SESSION["pollurl"]=$_POST["pollurl"];

        $EDIT=1;

//echo "manag!!!!!!!!from edit";
    }


}


if (isset($_POST['title']) && !empty($_POST['title'])) {

    $EDIT=$_POST["isEdit"];
    echo $EDIT;
    if ($EDIT) {       //under edit existed poll
       // echo "！！！！！！！！！！！1st";
        $poll = $_SESSION["poll"];

        $poll->setTitle($_POST["title"]);
        $poll->setLocation($_POST["location"]);
        $poll->setDescription($_POST["description"]);
        $poll->setOwnername($_POST["ownername"]);
        $poll->setOwneremail($_POST["owneremail"]);
        $poll->setContent($_POST["content"]);


        $pid=$poll->getId();
        if ($pid = updatePollBasic($pid,$poll)) {
            updatePollMapBasic( $poll);

        }
        unset($_SESSION["poll"]);



    } else {   //under creating poll
      //  echo "！！！！！！！！！！！2st";

        $pollMap = new PollMap();

        $poll->setTitle($_POST["title"]);
        $poll->setLocation($_POST["location"]);
        $poll->setDescription($_POST["description"]);
        $poll->setOwnername($_POST["ownername"]);
        $poll->setOwneremail($_POST["owneremail"]);
        $poll->setContent($_POST["content"]);

        echo $poll;

        if ($pid = storePoll($poll)) {

            $pollurl = generateUniqString("$pid");
            $_SESSION["pollurl"]=$pollurl;

           // $pollMap
            $pollMap->setPid($pid);
            $pollMap->setTitle($_POST["title"]);
            $pollMap->setOwneremail($_POST["owneremail"]);
            $pollMap->setPollurl($pollurl);

         //   var_dump($pollMap);
            storePollMap($pollMap);
            sendPollurl($_POST["owneremail"],$pollurl,$_POST["ownername"]);

        }
    }
    $_SESSION["finished"]=true;



}