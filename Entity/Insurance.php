<?php


class Insurance
{
    private $id;
    private $name_class;

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
    public function getNameClass()
    {
        return $this->name_class;
    }

    /**
     * @param mixed $name_class
     */
    public function setNameClass($name_class)
    {
        $this->name_class = $name_class;
    }

}