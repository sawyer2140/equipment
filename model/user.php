<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-13
 * Time: 下午1:05
 * To change this template use File | Settings | File Templates.
 */
class user
{
    public $id;
    public $loginName;
    public $userName;
    public $password;
    public $signDate;
    public $lastLoginDate;
    public $identity;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;
    }

    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    public function setLoginName($loginName)
    {
        $this->loginName = $loginName;
    }

    public function getLoginName()
    {
        return $this->loginName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setSignDate($signDate)
    {
        $this->signDate = $signDate;
    }

    public function getSignDate()
    {
        return $this->signDate;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

    public function getIdentity()
    {
        return $this->identity;
    }
}
