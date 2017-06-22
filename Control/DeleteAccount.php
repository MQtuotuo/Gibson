<?php
require_once('Model/User.php');
require_once("Model/BaseFunc.php");

session_start(); //to ensure you are using same session


//var_dump($_SESSION["user"]);
deleteUser($_SESSION["user"]);
unset($_SESSION["user"]);
header("Location:../index");
exit();
?>