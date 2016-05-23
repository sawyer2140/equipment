<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-13
 * Time: 下午1:04
 * To change this template use File | Settings | File Templates.
 */

class menu
{
    public $id;
    public $name;
    public $url;
    public $icon;

    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

}
