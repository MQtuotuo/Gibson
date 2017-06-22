<?php

class Poll
{

    protected $id;
    protected $title;
    protected $location;
    protected $description;
    protected $ownername;
    protected $owneremail;
    protected $content;//String
    protected $result;




    /**
     * @return string
     */

    public function __toString(){

        return  $this->getTitle()." ".$this->getOwnername()."".$this->getOwneremail()."".$this->getCreDate();
    }



    /**
     * @return Array
     */

    public  function  getContentArray(){

        //split the string to array
        return   explode(";",$this->content);
    }

    /**
     * @return String
     */
    public function getContent()
    {

       // $contentArray=unserialize($this->content);
       // echo "####deserilize content ".gettype($contentArray);
        //return $contentArray;
        return $this->content;
    }

    /**
     * @param String $content
     */

    public function setContent($content)
    {
       // $this->content = serialize($content);
       // echo "#####serilized content ". gettype($this->content);
        $this->content=$content;


    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
    protected $cre_date;

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

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
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
     * @return string
     */
    public function getOwnername()
    {
        return $this->ownername;
    }

    /**
     * @param string $ownername
     */
    public function setOwnername($ownername)
    {
        $this->ownername = $ownername;
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


}