<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Sawyer
 * Date: 12-3-29
 * Time: 下午6:06
 * To change this template use File | Settings | File Templates.
 */
include_once("../interfaces/mode.php");
include_once("../interfaces/status.php");
include_once("../model/equipments.php");
include_once("../dao/equipmentsDao.php");
include_once("../dao/equipmentDao.php");

$json = json_decode($_POST["request"]);

switch ($json->mode) {

    case mode::getEquipments:
        $result = getEquipments($json->datas);
        break;
    case mode::updateEquipment:
        $result = updateEquipment($json->datas);
        break;
    case mode::addEquipment:
        $result = addEquipment($json->datas);
        break;
    case mode::deleteEquipment:
        $result = deleteEquipment($json->datas);
        break;
    case mode::getCompany:
        $result = getCompany();
        break;

}

echo json_encode($result);

function getEquipments($jsonUsers)
{
    $equipments = new equipments();

    $equipments->setName($jsonUsers->name);
    $equipments->setModel($jsonUsers->model);
    $equipments->setDepositPlace($jsonUsers->depositPlace);
    $equipments->setStartNum($jsonUsers->startNum);
    $equipments->setLimitNum($jsonUsers->limitNum);

    $equipmentsDao = new equipmentsDao();
    $result = $equipmentsDao->findUsersCount($equipments);

    if ($result->getStatus() == status::success) {
        $equipments = $result->getDatas();
    }

    if ($equipments->getCount() != 0) {
        $result = $equipmentsDao->findEquipments($equipments);
    } else {
        $result->setStatus("noResults");
    }

    return $result;
}

function updateEquipment($jsonEquipment)
{

    $equipment = new equipment();
    $equipment->setId($jsonEquipment->id);
    $equipment->setModel($jsonEquipment->model);
    $equipment->setName($jsonEquipment->name);
    $equipment->setCompany($jsonEquipment->company);
    $equipment->setUsePlace($jsonEquipment->usePlace);
    $equipment->setDepositPlace($jsonEquipment->depositPlace);
    $equipment->setNumber($jsonEquipment->number);
    $equipment->setDetails($jsonEquipment->details);
    $equipment->setPerson($jsonEquipment->person);

    $equipmentDao = new equipmentDao();
    $result = $equipmentDao->update($equipment);

    return $result;

}

function deleteEquipment($jsonEquipment)
{

    $equipment = new equipment();
    $equipment->setId($jsonEquipment->id);

    $equipmentDao = new equipmentDao();
    $result = $equipmentDao->delete($equipment);

    return $result;

}

function addEquipment($jsonEquipment)
{

    $equipment = new equipment();
    $equipment->setModel($jsonEquipment->model);
    $equipment->setName($jsonEquipment->name);
    $equipment->setUsePlace($jsonEquipment->usePlace);
    $equipment->setDepositPlace($jsonEquipment->depositPlace);
    $equipment->setCompany($jsonEquipment->company);
    $equipment->setNumber($jsonEquipment->number);
    $equipment->setDetails($jsonEquipment->details);

    $equipmentDao = new equipmentDao();
    $result = $equipmentDao->add($equipment);

    if ($result->getStatus() == status::failed) {
        $result->setStatus(status::alreadyExist);
    }

    return $result;

}

function getCompany()
{

    $equipmentsDao = new equipmentsDao();
    $result = $equipmentsDao->getCompany();

    return $result;

}


    