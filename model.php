<?php
$url = __DIR__.'/data/employee.json';

function getEmployee()
{
    return json_decode(file_get_contents($GLOBALS['url']), true);
}

function updateEmployee($jsonString='{}')
{
    file_put_contents($GLOBALS['url'], $jsonString);
}