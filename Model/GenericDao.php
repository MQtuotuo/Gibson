<?php


require_once('DataSource.php');


class GenericDao
{

    /**
     * @param $sql
     * @param $param
     * @return String  （the id inserted）
     */
    protected function insertWithParam($sql, $param)
    {

        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
            $stmt->execute($param);
            $insertedId=$conn->lastInsertId();
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
            print_r($e->getMessage());
        }

        //echo "new user inserted , userid:  "+$insertedId;
        return $insertedId;

    }

    /**
     * @param string $sql
     * @return string (inserted id)
     */

    protected  function  insert($sql){
        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
            //  print_r($e->getMessage());
        }
        return $conn->lastInsertId();
    }

    /**
     * @param String $sql
     * @return Mixed
     *
     *if updateBasic case : return affected rows ;
     */

    protected  function exec($sql){
        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
          //  print_r($e->getMessage());
        }


        return $stmt;

    }


    /**
     * @param String $sql
     * @param Array $param
     * @return PDOStatement
     */
    protected function execWithParam($sql, $param)
    {

        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
            $stmt->execute($param);
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
            print_r($e->getMessage());
        }
        return $stmt;

    }


    /**
     * @param $sql
     * @return int (return affected rows)
     */

    protected  function  execUpdate($sql){

        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
           $affected= $stmt->execute();
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
            //  print_r($e->getMessage());
        }

        return $affected;
    }

    /**
     * @param $sql
     * @param $param
     * @return int (affected rows)
     */
    protected function execUpdateWithParam($sql, $param)
    {


        try {
            $conn = DataSource::getDataSource();
            $conn->beginTransaction();
            $stmt = $conn->prepare($sql);
            $stmt->execute($param);
            $conn->commit();

        } catch (PDOException $e) {

            echo "Fail to execute $sql ! \n";

            print_r($e->errorInfo);
            print_r($e->getMessage());
        }
        return $stmt;

    }




}