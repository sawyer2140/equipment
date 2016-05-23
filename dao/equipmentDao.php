<?php
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/equipment.php");
include_once(dirname(__FILE__) . "/../model/result.php");
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-7-6
 * Time: 下午2:08
 * To change this template use File | Settings | File Templates.
 */

class equipmentDao
{
    public function update($equipment)
    {

        $query = "update equipment_info set  name ='" . $equipment->getName() . "', model='". $equipment->getModel() ."' ,company='" . $equipment->getCompany() .
                 "',usePlace = '" . $equipment->getUsePlace() . "',depositPlace='" . $equipment->getDepositPlace() .
                 "',number = '" . $equipment->getNumber() . "',details = '" . $equipment->getDetails() . "',person = '" . $equipment->getPerson() .
            "' where id = " . $equipment->getId() ;
        //echo $query;
        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        mysql_close();
        return $result;
    }

    public function add($equipment)
    {

        $query = "insert into equipment_info(model,name,company,usePlace,depositPlace,number,details) values(
        '" . $equipment->getModel() . "','" . $equipment->getName() . "','" . $equipment->getCompany() . "','" . $equipment->getUsePlace() . "',
        '" . $equipment->getDepositPlace() . "','" . $equipment->getNumber() . "','" . $equipment->getDetails() . "')";

        $conn = new connect();
        $conn->getConnect();
        echo $query;
        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        mysql_close();
        return $result;
    }

    public function delete($equipment)
    {

        $query = "update equipment_info set vaild = 1 where id = " . $equipment->getId();

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query($query);

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        mysql_close();
        return $result;
    }



}
