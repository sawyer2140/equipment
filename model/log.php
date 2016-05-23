<?php

/**
 * Created by PhpStorm.
 * User: sawyer
 * Date: 14-8-15
 * Time: 下午4:14
 */
class log
{

    public $oldNumber;
    public $newNumber;
    public $submitTime;
    public $model;
    public $depositPlace;
    public $name;
    public $person;

    /**
     * @param mixed $depositPlace
     */
    public function setDepositPlace($depositPlace)
    {
        $this->depositPlace = $depositPlace;
    }

    /**
     * @return mixed
     */
    public function getDepositPlace()
    {
        return $this->depositPlace;
    }

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

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $newNumber
     */
    public function setNewNumber($newNumber)
    {
        $this->newNumber = $newNumber;
    }

    /**
     * @return mixed
     */
    public function getNewNumber()
    {
        return $this->newNumber;
    }

    /**
     * @param mixed $oldNumber
     */
    public function setOldNumber($oldNumber)
    {
        $this->oldNumber = $oldNumber;
    }

    /**
     * @return mixed
     */
    public function getOldNumber()
    {
        return $this->oldNumber;
    }

    /**
     * @param mixed $submitTime
     */
    public function setSubmitTime($submitTime)
    {
        $this->submitTime = $submitTime;
    }

    /**
     * @return mixed
     */
    public function getSubmitTime()
    {
        return $this->submitTime;
    }


} 