<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/model.php';

sleep(5);

$employee = getEmployee();
var_dump($employee);


$newAmount = $employee['amount'] + 50000;
$employee['amount'] = $newAmount;


updateEmployee(json_encode($employee));

var_dump(getEmployee());