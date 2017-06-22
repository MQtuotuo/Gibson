<?php

class User
{
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $access_level;
    protected $reg_date;
    protected $last_login;



    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->access_level;
    }

    /**
     * @param mixed $access_level
     */
    public function setAccessLevel($access_level)
    {
        $this->access_level = $access_level;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRegDate()
    {
        return $this->reg_date;
    }

    /**
     * @param string $reg_date
     */
    public function setRegDate($reg_date)
    {
        $this->reg_date = $reg_date;
    }



    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * @param mixed $last_login
     */
    public function setLastLogin($last_login)
    {
        $this->last_login =$last_login;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId()." ".$this->name . " " . $this->email." ".$this->access_level." ".$this->getRegDate()." ".$this->last_login;
    }


}



$HELLO = "12434";//for test
