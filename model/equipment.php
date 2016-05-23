<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-7-2
 * Time: 上午11:47
 * To change this template use File | Settings | File Templates.
 */

class equipment
{

    public $id;
    public $model;
    public $name;
    public $type;
    public $company;
    public $number;
    public $depositPlace;
    public $usePlace;
    public $details;
    public $person;

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }


    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setDepositPlace($depositPlace)
    {
        $this->depositPlace = $depositPlace;
    }

    public function getDepositPlace()
    {
        return $this->depositPlace;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUsePlace($usePlace)
    {
        $this->usePlace = $usePlace;
    }

    public function getUsePlace()
    {
        return $this->usePlace;
    }
}
