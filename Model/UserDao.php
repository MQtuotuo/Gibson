<?php



require_once('GenericDao.php');


class UserDao extends GenericDao
{

    private static $TABLE = 'User';

    /**
     * @param $id
     * @return Int
     */
    public function  delete($id)
    {
        $sql = "DELETE FROM  " . self::$TABLE . " WHERE id=" . $id;
        $this->exec($sql);
    }


    public function  insert($name, $email, $password, $access_level)
    {
        $sql = "INSERT INTO " . self::$TABLE . " VALUES (DEFAULT,:name,:email,:password,:access_level,:reg_date,DEFAULT)";
        $param = array(':name' => $name, ':email' => $email, ':password' => $password, ':access_level' => $access_level, ':reg_date' =>date('Y-m-d H:i:s' ));

        return $this->insertWithParam($sql, $param);


    }


    /**
     * @param String $email
     * @return User
     */

    public function  findByEmail($email)
    {
        $sql = "SELECT * FROM " . self::$TABLE . " WHERE email='" . $email . "'";
        $stmt = $this->exec($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $result = $stmt->fetch();
        return $result;
    }


    /**
     * @return array
     */
    public function  findAll()
    {
        $sql = "SELECT * FROM " . self::$TABLE;
        $stmt = $this->exec($sql);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        return $result;

    }


    /**
     * @param String $id
     * @return User
     */
    public function  findById($id)
    {

        $sql = "SELECT * FROM " . self::$TABLE . " WHERE id=" . $id;
        $stmt = $this->exec($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $result = $stmt->fetch();
        return $result;
    }


    public function updateLastSignIn($email)
    {
        $sql="UPDATE ".self::$TABLE." SET last_login='".date('Y-m-d H:i:s' )."' WHERE email='".$email."'";
        return $this->execUpdate($sql);


    }

    public function updatePassword($email,$password)
    {
        $sql="UPDATE ".self::$TABLE." SET password='".$password."' WHERE email='" . $email . "'";
        return $this->execUpdate($sql);


    }


    public function updateUsername($email,$username)
    {
        $sql="UPDATE ".self::$TABLE." SET name='".$username."' WHERE email='" . $email . "'";
        return $this->execUpdate($sql);


    }

    public function updateEmail($emailOld,$emailNew)// use user id or email to identity a user ???
    {
        $sql="UPDATE ".self::$TABLE." SET email='".$emailNew."' WHERE email=".$emailOld;
        return $this->execUpdate($sql);  //return ture or false
    }
}