<?php
require_once 'classes/connectdb.php';
$objdb = new Database();
$connection = $objdb->connect();
$query = "select workers.id, workers.FIOname,workers.DateOfBirthday,workers.Gender,workers.Sallary, supermarkets.NameSup
        from workers
        inner join supermarkets on workers.id_supermarket = supermarkets.id ";

$nameofplace = htmlspecialchars((int)$_GET['nameofplace']);
$fioname = htmlspecialchars($_GET['fioname']);
$num_from = htmlspecialchars((int)$_GET['num_from']);
$num_to = htmlspecialchars((int)$_GET['num_to']);
$gender = htmlspecialchars($_GET['gender']);
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($fioname !=""||$nameofplace!=0||$num_from!=""||$num_to!="")) {
        $query .= " WHERE ";
        if ($nameofplace) {
            $query .= "workers.id_supermarket = $nameofplace";
            $flag = true;
        }
        if ($fioname) {
            if ($flag) {
                $query .= " AND workers.FIOname LIKE '%$fioname%'";
            } else {
                $query .= "workers.FIOname LIKE '%$fioname%'";
                $flag = true;
            }
        }
        if ($gender) {
            if ($flag) {
                $query .= " AND workers.Gender = '$gender' ";
            } else {
                $query .= "workers.Gender = '$gender' ";
                $flag = true;
            }
        }
        if ($num_from) {
            if ($flag) {
                $query .= " AND workers.Sallary >= $num_from";
            } else {
                $query .= "workers.Sallary >= $num_from";
                $flag = true;
            }
        }
        if($num_to){
            if ($flag) {
                $query .= " AND workers.Sallary <= $num_to";
            } else {
                $query .= "workers.Sallary <= $num_to";
                $flag = true;
            }
        }
    }
}

$sql = "select * from supermarkets";
$places = $connection->prepare($sql);
$places->execute();
$row = $places->fetchALL(PDO::FETCH_ASSOC);
$people = $connection->prepare($query);
$people->execute();









