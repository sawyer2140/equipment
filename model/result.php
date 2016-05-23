<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-29
 * Time: 上午10:42
 * To change this template use File | Settings | File Templates.
 */

class result
{
    public $status;
    public $datas;

    public function setDatas($datas)
    {
        $this->datas = $datas;
    }

    public function getDatas()
    {
        return $this->datas;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
