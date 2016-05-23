<?php
/**
 * Created by PhpStorm.
 * User: sawyer
 * Date: 14-10-9
 * Time: 下午4:23
 */
include_once("../interfaces/mode.php");
include_once("../interfaces/status.php");
include_once("../dao/equipmentsDao.php");
include_once("../model/equipments.php");
require_once dirname(__FILE__) . '/../excel/PHPExcel.php';



    $equipmentsDao = new equipmentsDao();
    $data = $equipmentsDao->expLog(new equipments());
    writeExcel($data->getDatas()->getEquipment());



function writeExcel($equipmentArr){

    //var_dump($equipmentArr);

    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', '型号')
        ->setCellValue('B1', '名称')
        ->setCellValue('C1', '厂家')
        ->setCellValue('D1', '数量')
        ->setCellValue('E1', '存放位置')
        ->setCellValue('F1', '使用位置')
        ->setCellValue('G1', '备注');
    $objPHPExcel->getActiveSheet()->setTitle('备件记录');

    for($i = 0; $i<count($equipmentArr);$i++){
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.($i+2), $equipmentArr[$i]->getModel())
            ->setCellValue('B'.($i+2), $equipmentArr[$i]->getName())
            ->setCellValue('C'.($i+2), $equipmentArr[$i]->getCompany())
            ->setCellValue('D'.($i+2), $equipmentArr[$i]->getNumber())
            ->setCellValue('E'.($i+2), $equipmentArr[$i]->getDepositPlace())
            ->setCellValue('F'.($i+2), $equipmentArr[$i]->getUsePlace())
            ->setCellValue('G'.($i+2), $equipmentArr[$i]->getDetails());
    }
    /**
     * equipment->setModel($row[0]);
    $equipment->setName($row[1]);
    $equipment->setCompany($row[2]);
    $equipment->setNumber($row[3]);
    $equipment->setDepositPlace($row[4]);
    $equipment->setUsePlace($row[5]);
    $equipment->setDetails($row[6]);
     */
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename=备件列表.xls');
    header('Cache-Control: max-age=0');

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');


}