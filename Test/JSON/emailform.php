<?php
session_start();
if(!isset($_SESSION["email"])){
    echo  "register email!";
    $_SESSION["email"]=array();
}
    include_once('check.php');

?>


<html lang="en">
<head>
    <meta charset="utf-8">
</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
    email: <input type="text" name="email" id="email"><br/>
    <input type="submit" name="submit"  value="Submit"/>
</form>

<?php

if(isset($_SESSION["email"])&&!empty($_SESSION["email"])) {

    var_dump($_SESSION["email"]);
    // echo array_pop($_SESSION["email"]);
}
?>

</body>
</html>
