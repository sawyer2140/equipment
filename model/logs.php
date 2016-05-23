<?php
/**
 * Created by PhpStorm.
 * User: sawyer
 * Date: 14-8-15
 * Time: 下午4:16
 */

class logs {

    public $name;
    public $model;
    public $depositPlace;
    public $count;
    public $log;
    public $startNum;
    public $limitNum;

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

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
     * @param mixed $limitNum
     */
    public function setLimitNum($limitNum)
    {
        $this->limitNum = $limitNum;
    }

    /**
     * @return mixed
     */
    public function getLimitNum()
    {
        return $this->limitNum;
    }

    /**
     * @param mixed $log
     */
    public function setLog($log)
    {
        $this->log = $log;
    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
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
     * @param mixed $startNum
     */
    public function setStartNum($startNum)
    {
        $this->startNum = $startNum;
    }

    /**
     * @return mixed
     */
    public function getStartNum()
    {
        return $this->startNum;
    }



} 