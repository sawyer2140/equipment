<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-5-30
 * Time: 下午4:19
 * To change this template use File | Settings | File Templates.
 */
include_once("../interfaces/mode.php");
include_once("../dao/menusDao.php");

$json = json_decode($_POST["request"]);

switch ($json->mode) {
    case mode::getMenu :
        $result = getMenu($json->datas);
        break;
}

echo json_encode($result);

function getMenu($jsonUsers)
{

    $menusDao = new menusDao();

    return $menusDao->find($jsonUsers->identity);

}


