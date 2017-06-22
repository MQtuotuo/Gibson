<?php

require_once("Model/DataSource.php");

require_once('Model/UserDao.php');
require_once('Model/User.php');

//test DataSource Connection
var_dump(DataSource::getDataSource());


//test UserDao  $id,$name,$email,$reg_date=======================
//$name, $email, $password, $access_level

try {

    //test test@test.com;

    $userdao = new UserDao();


    echo "=======Test findByEmail : \n";
    var_dump($check3 = $userdao->findByEmail("admin@gibson.com"));
    echo "type :   ".gettype($check3);



    echo "=======Test findById : \n";
    var_dump( $userdao->findById(18));


    echo "Test delete : \n";
     //$userdao->delete($check3->getId());


} catch (PDOException $e) {

    print_r($e->errorInfo);
    print_r($e->getMessage());
}


//test PollDao
/*
   * protected $title;
  protected $location;
  protected $description;
  protected $ownername;
  protected $owneremail;
  protected $ownerurl;
  protected  $partiurl;
  protected $content;
  protected  $cre_date;

*/
$poll = new Poll();
$poll->setOwnername("Quming");
$poll->setLocation("Luebeck");
$poll->setDescription("Test2");
$poll->setOwneremail("qm@eis.com");
$poll->setOwnerurl("qm/erwrdade");
$poll->setPartiurl("test.com");
$poll->setTitle("test");
$poll->setContent(array("test" => "123"));
var_dump($poll);


try {
    $polldao = new PollDao();
    //=======test insert
  //  echo "\n  inserted id:" . $polldao->insert($poll) . "\n";

    //=========test find

    echo "=============find all";
    var_dump($polldao->findAll());



    echo "=====find by id 3";
    var_dump($polldao->findById('23'));

} catch (\PDOException $e) {

    print_r($e->errorInfo);
    print_r($e->getMessage());

}


/*$sql="SELECT * FROM User WHERE email='qm@eis.com'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Model\Dao\User');
    $result=$stmt->fetch();//fetch(PDO::FETCH_OBJ);
    var_dump($result);

 $sql="SELECT * FROM User";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\Dao\User');
    var_dump($result);

*/


?>


