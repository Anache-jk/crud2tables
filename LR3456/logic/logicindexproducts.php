<?php

require_once 'classes/crudclases.php';
require_once 'classes/connectdb.php';

$obj = new CrudProducts();
$conn = new Database();
$obj->getconnectdb($conn->connect());
$row = $obj->getshops();

$product['nameprod'] = htmlspecialchars($_POST['nameprod']);
$product['category'] = htmlspecialchars($_POST['category']);
$product['quantity'] = htmlspecialchars($_POST['quantity']);
$product['numsallary'] = htmlspecialchars($_POST['numsallary']);
$product['country'] = htmlspecialchars($_POST['country']);
$product['nameofplace'] = htmlspecialchars($_POST['nameofplace']);
if (isset($_POST['creating']) || (isset($_POST['editing']))) {
    $erroscheck = 0;

    if ($product['nameprod'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $product['nameprod'])) {
        $arrayerrors['errnameprod'] = 'Название содержит цифры, символы или пусто';
        $erroscheck++;
    }
    if ($product['category'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $product['category'])) {
        $arrayerrors['errcategory'] = 'Категория содержит цифры, символы или пусто';
        $erroscheck++;
    }

    if ($product['country'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $product['country'])) {
        $arrayerrors['errcountry'] = 'Страна содержит цифры, символы или пусто';
        $erroscheck++;
    }

    if ($product['nameofplace'] == "") {
        $arrayerrors['errplace'] = 'Заполните место продажи';
        $erroscheck++;
    }
    if ($product['numsallary'] == "" && $product['numsallary'] != 0 || preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $product['numsallary'])) {
        $arrayerrors['numsallary'] = 'Введите стоимость товара за штуку';
        $erroscheck++;
    }
    if ($product['quantity'] == "" && $product['quantity'] != 0 || preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $product['quantity'])) {
        $arrayerrors['errquantity'] = 'Введите объём товара';
        $erroscheck++;
    }


    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insert($product['nameprod'], $product['category'], $product['numsallary'], $product['quantity'] , $product['country'], $product['nameofplace']);
    }
    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $idprod = htmlspecialchars($_POST['idprod']);
        echo $obj->update($idprod, $product['nameprod'], $product['category'], $product['numsallary'], $product['quantity'] , $product['country'], $product['nameofplace']);
    }
}
if (isset($_POST['deleting'])) {
    $id = htmlspecialchars($_POST['idprod']);
    $obj->delete($id);
}