<?php
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/menu.php");
include_once(dirname(__FILE__) . "/../model/menus.php");
include_once(dirname(__FILE__) . "/../model/result.php");
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-6-28
 * Time: 下午5:29
 * To change this template use File | Settings | File Templates.
 */

class menusDao
{
    function find($identity)
    {

        $query = ("select id,name,url,icon from menu_info");

        if($identity==1){
            $query .= " where id not in (2,3)";
        }

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }


        if ($result->getStatus() == status::success) {
            $menuArray = array();
            $i = 0;
            while ($row = mysql_fetch_array($resultSet)) {

                $menu = new menu();
                $menu->setId($row[0]);
                $menu->setName($row[1]);
                $menu->setUrl($row[2]);
                $menu->setIcon($row[3]);

                $menuArray[$i] = $menu;
                $i++;
            }

            $menus = new menus();
            $menus->setMenu($menuArray);
            $result->setDatas($menus);

        }
        mysql_close();
        return $result;

    }
}
