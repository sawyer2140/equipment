<?php
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/equipment.php");
include_once(dirname(__FILE__) . "/../model/equipments.php");
include_once(dirname(__FILE__) . "/../model/result.php");
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-7-2
 * Time: 上午11:57
 * To change this template use File | Settings | File Templates.
 */

class equipmentsDao
{
    public function findUsersCount($equipments)
    {

        $query = " where vaild=0";

        if ($equipments) {

            if ($equipments->getName()) {
                $query .= " and name like '%" . $equipments->getName() . "%'";
            }

            if ($equipments->getModel()){
                $query .= " and model like '%" . $equipments->getModel() . "%'";
            }

            if ($equipments->getDepositPlace()){
                $query .= " and depositPlace like '%" . $equipments->getDepositPlace() . "%'";
            }
        }

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query(" select count(id) from equipment_info" . $query);



        //echo " select count(id) from equipment_info".$query;

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        if ($result->getStatus() == status::success) {

            if ($row = mysql_fetch_row($resultSet)) {

                $equipments->setCount($row[0]);

            }

            $result->setDatas($equipments);

        }
        mysql_close();

        return $result;
    }

    public function findEquipments($equipments)
    {

        $query = " where vaild=0  ";

        if ($equipments) {

            if ($equipments->getName()) {
                $query .= " and name like '%" . $equipments->getName() . "%'";
            }

            if ($equipments->getModel()){
                $query .= " and model like '%" . $equipments->getModel() . "%'";
            }

            if ($equipments->getDepositPlace()){
                $query .= "  and depositPlace like '%" . $equipments->getDepositPlace() . "%'";
            }
        }

        $limitStr = " order by id desc limit " . ($equipments->getStartNum() - 1) * ($equipments->getLimitNum()) . "," . $equipments->getLimitNum();

        $conn = new connect();
        $conn->getConnect();
       // echo " select id,model,name,usePlace,type,depositPlace,number,company,details from equipment_info ".$query . $limitStr;
        $resultSet = mysql_query(" select id,model,name,usePlace,type,depositPlace,number,company,details " .
                                 " from equipment_info" . $query . $limitStr);

        $result = new result();
        if ($resultSet) {
            $result->setStatus(status::success);
        } else {
            $result->setStatus(status::failed);
        }

        if ($result->getStatus() == status::success) {

            $equipmentsArray = array();
            $i = 0;
            while ($row = mysql_fetch_row($resultSet)) {

                $equipment = new equipment();
                $equipment->setId($row[0]);
                $equipment->setModel($row[1]);
                $equipment->setName($row[2]);
                $equipment->setUsePlace($row[3]);
                $equipment->setType($row[4]);
                $equipment->setDepositPlace($row[5]);
                $equipment->setNumber($row[6]);
                $equipment->setCompany($row[7]);
                $equipment->setDetails($row[8]);

                $equipmentsArray[$i] = $equipment;

                $i++;
            }
            $equipments->setEquipment($equipmentsArray);
            $result->setDatas($equipments);
        }
        mysql_close();

        return $result;
    }

    public function getCompany()
    {

        $query = "select distinct Company from equipment_info ";

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

            $equipmentsArray = array();
            $i = 0;
            while ($row = mysql_fetch_row($resultSet)) {

                $equipment = new equipment();
                $equipment->setCompany($row[0]);
                $equipmentsArray[$i] = $equipment;

                $i++;
            }

            $equipments = new equipments();
            $equipments->setEquipment($equipmentsArray);
            $result->setDatas($equipments);
        }
        mysql_close();

        return $result;
    }

    public function expLog($equipments){

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query("select REPLACE(model, CHAR(10) , ' ') ,REPLACE(name, CHAR(10) , ' '),
                    REPLACE(company, CHAR(10) , ' '),REPLACE(number, CHAR(10) , ' '),REPLACE(depositPlace, CHAR(10) , ' '),
                    REPLACE(usePlace, CHAR(10) , ' '),REPLACE(details, CHAR(10) , ' ') from equipment_info where vaild = 0");

        $result = new result();
        if ($resultSet) {
            $result->setStatus(status::success);
        } else {
            $result->setStatus(status::failed);
        }

        if ($result->getStatus() == status::success) {

            $equipmentsArray = array();
            $i = 0;
            while ($row = mysql_fetch_row($resultSet)) {

                $equipment = new equipment();
                $equipment->setModel($row[0]);
                $equipment->setName($row[1]);
                $equipment->setCompany($row[2]);
                $equipment->setNumber($row[3]);
                $equipment->setDepositPlace($row[4]);
                $equipment->setUsePlace($row[5]);
                $equipment->setDetails($row[6]);

                $equipmentsArray[$i] = $equipment;

                $i++;
            }
            $equipments->setEquipment($equipmentsArray);
            $result->setDatas($equipments);
        }
        mysql_close();

        return $result;

    }
}
