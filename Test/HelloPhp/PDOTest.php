<?php
/**
 * Created by PhpStorm.
 * User: wangzeyu
 * Date: 05/12/14
 * Time: 09:04
 */


$servername = "localhost";
$username = "jenny";
$password = "123";
$dbname = "gibson";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->


    // sql to create table
    $sql = "CREATE TABLE User (
    id INT(10)  AUTO_INCREMENT PRIMARY KEY,
    name  VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;




