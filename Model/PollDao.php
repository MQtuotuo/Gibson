<?php



require_once('GenericDao.php');
require_once('Poll.php');


class PollDao extends GenericDao
{

    private static $TABLE = 'Poll';

    /**
     * @param $id
     * @return Int
     */
    public function  delete($id)
    {
        $sql = "DELETE FROM  " . self::$TABLE . " WHERE id=" . $id;
      return  $this->exec($sql);
    }


    /**
     * @param   Poll $poll
     * @return string
     */
    public function  insert($poll)
    {
        $sql = "INSERT INTO " . self::$TABLE . " VALUES (DEFAULT,:title,:ownername,:owneremail,:description,:location,:content,:result,:cre_date)";
        $param = array(':title' => $poll->getTitle(), ':location' => $poll->getLocation(), ':description' => $poll->getDescription(),
            ':ownername' => $poll->getOwnername(), ':owneremail' => $poll->getOwneremail(), ':content' => $poll->getContent(),':result'=>null, ':cre_date' => date('Y-m-d H:i:s'));

        echo "<br> Insert poll ";
        // var_dump($param);
        return $this->insertWithParam($sql, $param);

    }


    /**
     * @param $id
     * @param $result
     * @return int
     */
    public function  updateResult($id, $result)
    {

        echo "UPDATE RESULT:".$result;
        $sql = " UPDATE " . self::$TABLE . " SET result=:result WHERE id=:id";
        $param = array(':result' => $result, ':id' => $id);

        return $this->execUpdateWithParam($sql, $param);

    }


    /**
     * @param $id
     * @param $poll
     * @return int
     */

    public function  updateBasic($id, $poll)
    {
        $sql = " UPDATE " . self::$TABLE . " SET title=:title,ownername=:ownername, owneremail=:owneremail,description=:description,location=:location,content=:content,cre_date=:cre_date WHERE id=:id";
        $param = array(':title' => $poll->getTitle(), ':location' => $poll->getLocation(), ':description' => $poll->getDescription(),
            ':ownername' => $poll->getOwnername(), ':owneremail' => $poll->getOwneremail(), ':content' => $poll->getContent(), ':cre_date' => $poll->getCreDate(), ':id' => $id);

        echo "<br> Update  poll  baisc ";

        return $this->execUpdateWithParam($sql, $param);

    }


    /**
     * @param  string $ownerurl
     * @return Poll


    public function  findByOwnerurl($ownerurl)
    {
        $sql = "SELECT * FROM " . self::$TABLE . " WHERE ownerurl='" . $ownerurl . "'";
        $stmt = $this->exec($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Poll');
        $result = $stmt->fetch();
        // var_dump($result);
        return $result;
    }*/

    /**
     * @return array
     */
    public function  findAll()
    {
        $sql = "SELECT * FROM " . self::$TABLE;
        $stmt = $this->exec($sql);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Poll');
        //  var_dump($result);
        return $result;

    }

    /**
     * @param String $id
     * @return Poll
     */
    public function  findById($id)
    {

        $sql = "SELECT * FROM " . self::$TABLE . " WHERE id=" . $id;
        $stmt = $this->exec($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Poll');
        $result = $stmt->fetch();
        //  var_dump($result);
        return $result;
    }


}
 