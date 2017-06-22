<?php
/**
 * Created by PhpStorm.
 * User: jennyzhou
 * Date: 1/7/15
 * Time: 8:09 PM
 */


//id, uemail,pid, title,participants, last_modified,cre_date
class PollMap {


    protected $id;
    protected $owneremail;
    protected $pid; //poll id
    protected $title;
    protected $participants;
    protected $pollurl;
    protected $last_modified;
    protected $cre_date;



    /**
     * @return string
     */

    public function __toString(){

        return  $this->getId()." ".$this->getOwneremail()."".$this->getPid()."".$this->getTitle()." ".$this->getPartiurl()." ".$this->getOwnerurl();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getOwneremail()
    {
        return $this->owneremail;
    }

    /**
     * @param string $owneremail
     */
    public function setOwneremail($owneremail)
    {
        $this->owneremail = $owneremail;
    }

    /**
     * @return int
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param int $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param int $participants
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * @return mixed
     */
    public function getPollurl()
    {
        return $this->pollurl;
    }

    /**
     * @param mixed $pollurl
     */
    public function setPollurl($pollurl)
    {
        $this->pollurl = $pollurl;
    }



    /**
     * @return string
     */
    public function getLastModified()
    {
        return $this->last_modified;
    }

    /**
     * @param string $last_modified
     */
    public function setLastModified($last_modified)
    {
        $this->last_modified = $last_modified;
    }

    /**
     * @return string
     */
    public function getCreDate()
    {
        return $this->cre_date;
    }

    /**
     * @param string $cre_date
     */
    public function setCreDate($cre_date)
    {
        $this->cre_date = $cre_date;
    }



}