<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/model.php';

use TrueMe\MatualExclusion\SumMatualExclusion;
$sme = new SumMatualExclusion;

sleep(5);

$employee = getEmployee();
var_dump($employee);


$newAmount = $sme->setRememberKey('employee.' . $employee['id'])
                ->sum($employee['amount'], 50000)->get();
$employee['amount'] = $newAmount;

updateEmployee(json_encode($employee));

var_dump(getEmployee());