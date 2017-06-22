<?php

$test="test for global";
GLOBAL  $test;

?>

<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title></title>
</head>
<body>

<form name='newUser' action='Welcome.php' method='get'>
    <p>
        <label>User Name:</label>
        <input type='text' name='username' />
    </p>

    <input type='submit' value='Register'/>


</form>

</body>
</html>
