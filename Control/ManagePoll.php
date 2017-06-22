<?php
/**
 * Created by PhpStorm.
 * User: jennyzhou
 * Date: 1/14/15
 * Time: 5:47 PM
 */


require_once('Model/BaseFunc.php');


if (isset($_GET["url"])) {
    $pollurl = substr($_GET["url"], 0, 12);
    $THIS_URL = $pollurl;
    $pollmap = matchPollMapWithUrl($pollurl);

    if (!$pollmap) {
        header("Location:404");
    } else {
        $pid = $pollmap->getPid();
        $poll = loadPoll($pid);
        $pollowner = $pollmap->getOwneremail();

//        echo "<br>" . $pollowner;

    }
} else {
    $poll = new Poll();
    // header("Location:mypoll");//error page??

}


$content = $poll->getContentArray();
$column = count($content);
if($poll->getResult()==null){
    $pollresult ="" ;
}else{
    $pollresult = $poll->getResult();

}
$title = $poll->getTitle();
$description = $poll->getDescription();
$location = $poll->getLocation();
$participants = $pollmap->getParticipants();


if (isset($_POST['vote'])) {

    $pollresult = $_POST["result"];
    $participants = $_POST["participants"];

    echo "save voting" . $pollresult . " ;" . $participants;

    if (updatePollResult($pid, $pollresult)) {
        updatePollMapResult($pid, $participants);
    }
    header("Location:" . $THIS_URL);

}