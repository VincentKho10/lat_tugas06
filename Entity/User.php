<?php


class User
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $role;

    /**
     * User constructor.
     * @param $role
     */
    public function __construct()
    {
        $this->role = new Role();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function __set($name, $value)
    {
        if(!isset($role)){
            $role = new Role();
        }

        switch ($name){
            case "idusername":
                /* @var Role $this->getRole*/
                $this->getRole()->setIdUserName($value);
                break;
            case "password":
                $this->getRole()->setPassword($value);
                break;
            case "name":
                $this->getRole()->setName($value);
                break;
        }
    }
}