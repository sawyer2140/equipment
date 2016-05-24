<?php
include_once(dirname(__FILE__) . "/../interfaces/status.php");
include_once(dirname(__FILE__) . "/connect.php");
include_once(dirname(__FILE__) . "/../model/log.php");
include_once(dirname(__FILE__) . "/../model/logs.php");
include_once(dirname(__FILE__) . "/../model/result.php");
/**
 * Created by PhpStorm.
 * User: sawyer
 * Date: 14-8-15
 * Time: 下午4:18
 */

class logsDao {


    public function findLogsCount($logs)
    {

        $query = " where 1=1";

        if ($logs) {

            if ($logs->getName()) {
                $query .= " and name like '%" . $logs->getName() . "%'";
            }

            if ($logs->getModel()){
                $query .= " and model like '%" . $logs->getModel() . "%'";
            }

            if ($logs->getDepositPlace()){
                $query .= " and depositPlace like '%" . $logs->getDepositPlace() . "%'";
            }
        }

        $conn = new connect();
        $conn->getConnect();

        $resultSet = mysql_query(" select count(id) from log_number" . $query);



     //   echo  " select count(id) from log_number" . $query;

        $result = new result();
        if ($resultSet) {

            $result->setStatus(status::success);

        } else {

            $result->setStatus(status::failed);

        }

        if ($result->getStatus() == status::success) {

            if ($row = mysql_fetch_row($resultSet)) {

                $logs->setCount($row[0]);

            }

            $result->setDatas($logs);

        }
        mysql_close();

        return $result;

    }

    public function findLogs($logs)
    {

        $query = " where 1=1";

        $orderBy = " order by id desc";

        if ($logs) {

            if ($logs->getName()) {
                $query .= " and name like '%" . $logs->getName() . "%'";
            }

            if ($logs->getModel()){
                $query .= " and model like '%" . $logs->getModel() . "%'";
            }

            if ($logs->getDepositPlace()){
                $query .= "  and depositPlace like '%" . $logs->getDepositPlace() . "%'";
            }
        }

        $limitStr = " limit " . ($logs->getStartNum() - 1) * ($logs->getLimitNum()) . "," . $logs->getLimitNum();

        $conn = new connect();
        $conn->getConnect();

//         echo " select model,name,depositPlace,oldNumber,newNumber,submitTime,operator " .
//             " from log_number " . $query . $orderBy . $limitStr;

        $resultSet = mysql_query(" select model,name,depositPlace,newNumber,submitTime,person " .
            " from log_number" . $query . $orderBy . $limitStr);

        $result = new result();
        if ($resultSet) {
            $result->setStatus(status::success);
        } else {
            $result->setStatus(status::failed);
        }

        if ($result->getStatus() == status::success) {

            $log = array();
            $i = 0;
            while ($row = mysql_fetch_row($resultSet)) {

                $log = new log();

                $log->setModel($row[0]);
                $log->setName($row[1]);
                $log->setDepositPlace($row[2]);
                $log->setNewNumber($row[3]);
                $log->setSubmitTime($row[4]);
                $log->setPerson($row[5]);

                $logsArray[$i] = $log;

                $i++;
            }
            $logs->setLog($logsArray);
            $result->setDatas($logs);
        }
        mysql_close();

        return $result;
    }

}