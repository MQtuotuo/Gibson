<?php



define('__ROOT__',dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/Config/GlobalConfig.php');
require_once(__ROOT__ . '/Model/Dao/DataSource.php');

echo  dirname(dirname(dirname(__FILE__)))."\n";
echo $test."....";
echo "nihao".$error_reporting;
ini_set("error_reporting", $error_reporting);//default:
ini_set("display_errors",$display_errors ); //default:
ini_set("log_errors", $log_errors);
ini_set("error_log",$error_log_path );//



echo  __ROOT__." hi....";
//error_log("This is a test for error_log");

$i=12;
echo $i;
try {
    if ($i > 10) {
        echo "Hi";
        throw new Exception("wrong number....$i");

    }
}
catch(Exception $e){
    error_log($e->getMessage());
   echo  $e->getMessage();
}