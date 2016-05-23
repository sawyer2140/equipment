<?php
/**
 * Created by PhpStorm.
 * User: sawyer
 * Date: 14-8-15
 * Time: 下午4:33
 */
include_once("../interfaces/mode.php");
include_once("../interfaces/status.php");
include_once("../model/logs.php");
include_once("../dao/logsDao.php");

$json = json_decode($_POST["request"]);

switch ($json->mode) {

    case mode::getLogs:
        $result = getLogs($json->datas);
        break;

}

echo json_encode($result);

function getLogs($jsonLogs)
{
    $logs = new logs();

    $logs->setName($jsonLogs->name);
    $logs->setModel($jsonLogs->model);
    $logs->setDepositPlace($jsonLogs->depositPlace);
    $logs->setStartNum($jsonLogs->startNum);
    $logs->setLimitNum($jsonLogs->limitNum);

    $logsDao = new logsDao();
    $result = $logsDao->findLogsCount($logs);

    if ($result->getStatus() == status::success) {
        $logs = $result->getDatas();
    }

    if ($logs->getCount() != 0) {
        $result = $logsDao->findLogs($logs);
    } else {
        $result->setStatus("noResults");
    }

    return $result;
}