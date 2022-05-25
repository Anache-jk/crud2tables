<?php
require_once 'classes/connectdb.php';
$objdb = new Database();
$connection = $objdb->connect();
$query = "select products.id, products.NameProd,products.Category,products.Cost,products.QuantityOrWeightKG,products.Country, supermarkets.NameSup
        from products
        inner join supermarkets on products.id_supermarket = supermarkets.id ";

$nameofplace = htmlspecialchars((int)$_GET['nameofplace']);
$nameprod = htmlspecialchars($_GET['nameprod']);
$category = htmlspecialchars($_GET['category']);
$country = htmlspecialchars($_GET['country']);
$num_from = htmlspecialchars((int)$_GET['num_from']);
$num_to = htmlspecialchars((int)$_GET['num_to']);
$flag = false;

if(!key_exists('clearfilter', $_GET)){
    if (count($_GET)>0 && ($nameprod !=""||$nameofplace!=0||$num_from!=""||$num_to!="" || $category!=""||$country!="")) {
        $query .= " WHERE ";
        if ($nameofplace) {
            $query .= "products.id_supermarket = $nameofplace";
            $flag = true;
        }
        if ($category) {
            if ($flag) {
                $query .= " AND products.Category LIKE '%$category%'";
            } else {
                $query .= "products.Category LIKE '%$category%'";
                $flag = true;
            }
        }
        if ($country) {
            if ($flag) {
                $query .= " AND products.Country LIKE '%$country%'";
            } else {
                $query .= "products.Country LIKE '%$country%'";
                $flag = true;
            }
        }
        if ($nameprod) {
            if ($flag) {
                $query .= " AND products.NameProd LIKE '%$nameprod%'";
            } else {
                $query .= "products.NameProd LIKE '%$nameprod%'";
                $flag = true;
            }
        }

        if ($num_from) {
            if ($flag) {
                $query .= " AND products.Cost >= $num_from";
            } else {
                $query .= "products.Cost >= $num_from";
                $flag = true;
            }
        }
        if($num_to){
            if ($flag) {
                $query .= " AND products.Cost <= $num_to";
            } else {
                $query .= "products.Cost <= $num_to";
                $flag = true;
            }
        }
    }
}

$sql = "select * from supermarkets";
$places = $connection->prepare($sql);
$places->execute();
$row = $places->fetchALL(PDO::FETCH_ASSOC);
$products = $connection->prepare($query);
$products->execute();










