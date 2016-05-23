<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-6-18
 * Time: 下午6:17
 * To change this template use File | Settings | File Templates.
 */

class connect
{

    public function getConnect()
    {
        $con = mysql_connect("123.57.58.100", "equipment", "e2qu0ipm1en6t");

        if (!$con) {
            die('Could not connect: ' . mysql_error());
        }
        
        mysql_select_db("equipment", $con);
        mysql_set_charset("utf8", $con);

        return $con;
    }
}
