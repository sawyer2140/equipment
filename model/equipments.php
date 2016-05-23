<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-7-2
 * Time: 上午11:49
 * To change this template use File | Settings | File Templates.
 */

class equipments
{

    public $name;
    public $model;
    public $depositPlace;
    public $count;
    public $equipment;
    public $startNum;
    public $limitNum;

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function setDepositPlace($depositPlace)
    {
        $this->depositPlace = $depositPlace;
    }

    public function getDepositPlace()
    {
        return $this->depositPlace;
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

    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }

    public function getEquipment()
    {
        return $this->equipment;
    }

    public function setLimitNum($limitNum)
    {
        $this->limitNum = $limitNum;
    }

    public function getLimitNum()
    {
        return $this->limitNum;
    }



    public function setStartNum($startNum)
    {
        $this->startNum = $startNum;
    }

    public function getStartNum()
    {
        return $this->startNum;
    }


}
