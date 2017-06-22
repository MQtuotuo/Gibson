<?php
require_once("config.php");


class DataSource
{


    protected static $connection;
    protected static $servername ;//= "localhost";
    protected static $username ;//= "jenny";
    protected static $password ;//= "123";
    protected static $dbname ;//= "gibson";






   public static function  setConf($servername,$username,$password,$dbname){

      // echo "setting db:". $servername." ".$username." ".$password." ".$dbname;

      self::$servername= $servername ;
       self::$username= $username ;
         self::$password=$password;
         self::$dbname=$dbname;

    }

    //later to use xml and logger instead of echo
    function setUpDataSource()
    {

        $servername = self::$servername;
        $username = self::$username;
        $password = self::$password;
        $dbname = self::$dbname;

        try {

            if (!self::$connection) {

                self::$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }
        } catch (PDOException $e) {
            error_log("Fail to connect to mysql:host=$servername;dbname=$dbname with $username \n");
            echo $e->getMessage();

        }
    }

    /**
     * @return PDO
     */

    public static function getDataSource()
    {

        if (self::$connection == null) {
            self::setUpDataSource();
        }
        return self::$connection;

    }

    public static function  closeDataSource()
    {
        if (self::$connection != null) {
            self::$connection = null;
            echo("DataSource closed successfully \n");
        }

    }


}

DataSource::setConf($db_servername,$db_username,$db_password,$dbname);