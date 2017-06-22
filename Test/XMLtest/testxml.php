<?php
/**
 * Created by PhpStorm.
 * User: jennyzhou
 * Date: 1/16/15
 * Time: 10:44 AM
 */


require_once("Model/BaseFunc.php");

require_once("Model/Poll.php");


$poll=new Poll();

$poll=loadPoll(38);
var_dump($poll);
