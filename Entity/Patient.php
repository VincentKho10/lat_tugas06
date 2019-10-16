<?php


class Patient
{
    private $med_record_number;
    private $birth_date;
    private $citizen_id_number;
    private $name;
    private $address;
    private $birth_place;
    private $phone_number;
    private $photo;
    private $insurance;

    /**
     * Patient constructor.
     * @param $insurance_id
     */
    public function __construct()
    {
        $this->insurance = new Insurance();
    }

    /**
     * @return mixed
     */
    public function getMedRecordNumber()
    {
        return $this->med_record_number;
    }

    /**
     * @param mixed $med_record_number
     */
    public function setMedRecordNumber($med_record_number)
    {
        $this->med_record_number = $med_record_number;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param mixed $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return mixed
     */
    public function getCitizenIdNumber()
    {
        return $this->citizen_id_number;
    }

    /**
     * @param mixed $citizen_id_number
     */
    public function setCitizenIdNumber($citizen_id_number)
    {
        $this->citizen_id_number = $citizen_id_number;
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
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birth_place;
    }

    /**
     * @param mixed $birth_place
     */
    public function setBirthPlace($birth_place)
    {
        $this->birth_place = $birth_place;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return Insurance
     */
    public function getInsurance()
    {
        return $this->insurance;
    }

    /**
     * @param Insurance $insurance
     */
    public function setInsurance($insurance)
    {
        $this->insurance = $insurance;
    }

    public function __set($name, $value)
    {
        if(!isset($this->insurance)){
            $this->insurance = new Insurance();
        }

        switch($name){
            case "name_class":
                $this->getInsurance()->setNameClass($value);
                break;
        }
    }
}