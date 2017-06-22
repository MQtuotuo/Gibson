<?php
/**
 * Created by PhpStorm.
 * User: jennyzhou
 * Date: 1/7/15
 * Time: 8:03 PM
 */


require_once('GenericDao.php');
require_once('PollMap.php');
require_once('User.php');


class PollMapDao extends GenericDao
{

    private static $TABLE = 'PollMap';


//id, uemail,pid, title,participants, last_modified,cre_date


    public function  insert($pollMap)
    {
       // $pollMap=new PollMap();
        $sql = "INSERT INTO " . self::$TABLE . " VALUES (DEFAULT,:owneremail,:pid,:title,:participants,:pollurl,:last_modified,:cre_date)";
        $param = array(':title' => $pollMap->getTitle(), ':owneremail' => $pollMap->getOwneremail(), ':pid' => $pollMap->getPid(),
            ':participants' => $pollMap->getParticipants(), ':pollurl' => $pollMap->getPollurl(), ':last_modified' => date('Y-m-d H:i:s'), ':cre_date' => $pollMap->getCreDate());

        // var_dump($param);
        return $this->insertWithParam($sql, $param);

    }



    public function  delete($pid)
    {


        $sql = "DELETE FROM  " . self::$TABLE . " WHERE pid=" . $pid;
        echo "delete in pollMap: "+$sql;
        return  $this->exec($sql);

    }


    public function  updateBasic($poll)
    {
        $sql = " UPDATE " . self::$TABLE . " SET title=:title,owneremail=:owneremail,last_modified=:last_modified WHERE pid=:pid";
        $param = array(':title' => $poll->getTitle(), ':owneremail' => $poll->getOwneremail(), ':last_modified' => date('Y-m-d H:i:s'), ':pid' => $poll->getId());

        /* $poll = new Poll();
        $sql = "UPDATE " . self::$TABLE .
            " SET ', owneremail='" . $poll->getOwneremail() .
            "', title='" . "$poll->getTitle() ".
            "', last_modified='" . date('Y-m-d H:i:s') .
            "' WHERE pid='" .  $poll->getId(). "'";

        return $this->execUpdate($sql);
*/
        return $this->execUpdateWithParam($sql, $param);

    }


    public  function  updateResult($pid,$participants){

        $sql = " UPDATE " . self::$TABLE . " SET participants=:participants, last_modified=:last_modified WHERE pid=:pid";
        $param = array(':participants' =>$participants,':last_modified' => date('Y-m-d H:i:s'), ':pid' =>$pid);

        return $this->execUpdateWithParam($sql, $param);

    }


    public function  findByEmail($owneremail)
    {
        $sql = "SELECT * FROM " . self::$TABLE . " WHERE owneremail='" . $owneremail . "'";
        $stmt = $this->exec($sql);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PollMap');
        //  var_dump($result);
        return $result;

    }


    public function  findByUrl($pollurl)
    {
        $sql = "SELECT * FROM " . self::$TABLE . " WHERE pollurl='" . $pollurl . "'";

        $stmt = $this->exec($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'PollMap');
        $result = $stmt->fetch();
        //  var_dump($result);
        return $result;


    }

}




