<?php

session_start(); //to ensure you are using same session
unset($_SESSION["user"]);



header("Location:/index");
exit();
?>