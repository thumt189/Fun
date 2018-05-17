<?php

require './lib/PHPExcel/PHPExcel.php';

$file = "D:\\GoS\\kpi.xlsx";
$objReader = PHPExcel_IOFactory::createReaderForFile($file);
$objReader->setLoadSheetsOnly('Sheet1');
$listWorksheets = $objReader->listWorkSheetNames($file);
$objExcel = $objReader->load($file);
$sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
//print_r($sheetData);

$columns = [];
foreach($sheetData as $row){
//    echo $row['A'] . ", ";
    $columns[] = $row['A'];
}

$abc =  join(" number, \n\t\t\t\t\t", $columns);

$query = " CREATE TABLE KPI ("
        . $abc
        . " number )";

echo $query;
?>