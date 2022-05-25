<?php
require_once 'classes/connectdb.php';
$objdb = new Database();
$connection = $objdb->connect();
$query = "select supermarkets.id, supermarkets.NameSup,supermarkets.Adress,supermarkets.SizeInM3,supermarkets.DateOfFoundation
        from supermarkets ";

$namesup = htmlspecialchars($_GET['namesup']);
$adress = htmlspecialchars($_GET['adress']);
$dates = htmlspecialchars($_GET['dates']);
$num_from = htmlspecialchars((int)$_GET['num_from']);
$num_to = htmlspecialchars((int)$_GET['num_to']);
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($namesup !=""|$num_from!=""||$num_to!="" || $adress!=""||$dates!="")) {
        $query .= " WHERE ";
        if ($dates) {
            if ($flag) {
                $query .= " AND supermarkets.DateOfFoundation LIKE '%$dates%'";
            } else {
                $query .= "supermarkets.DateOfFoundation LIKE '%$dates%'";
                $flag = true;
            }
        }
        if ($adress) {
            if ($flag) {
                $query .= " AND supermarkets.Adress LIKE '%$adress%'";
            } else {
                $query .= "supermarkets.Adress LIKE '%$adress%'";
                $flag = true;
            }
        }
        if ($namesup) {
            if ($flag) {
                $query .= " AND supermarkets.NameSup LIKE '%$namesup%'";
            } else {
                $query .= "supermarkets.NameSup LIKE '%$namesup%'";
                $flag = true;
            }
        }

        if ($num_from) {
            if ($flag) {
                $query .= " AND supermarkets.SizeInM3 >= $num_from";
            } else {
                $query .= "supermarkets.SizeInM3 >= $num_from";
                $flag = true;
            }
        }
        if($num_to){
            if ($flag) {
                $query .= " AND supermarkets.SizeInM3 <= $num_to";
            } else {
                $query .= "supermarkets.SizeInM3 <= $num_to";
                $flag = true;
            }
        }
    }
}

$shops = $connection->prepare($query);
$shops->execute();











