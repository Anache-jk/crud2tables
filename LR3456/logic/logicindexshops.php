<?php
require_once 'classes/crudclases.php';
require_once 'classes/connectdb.php';

$obj = new CrudShops();
$conn = new Database();
$obj->getconnectdb($conn->connect());


$shops['namesup'] = htmlspecialchars($_POST['namesup']);
$shops['datefoundation'] = htmlspecialchars($_POST['datefoundation']);
$shops['adress'] = htmlspecialchars($_POST['adress']);
$shops['sizes'] = htmlspecialchars($_POST['sizes']);

if(isset($_POST['creating'])||(isset($_POST['editing']))) {
    $erroscheck=0;
    if (!preg_match("@[0-3][0-9].[01][0-9].[0-2][0-9][0-9][[0-9]@u", $shops['datefoundation']) || $shops['datefoundation'] == ""
        || preg_match("@(3[2-9].[01][0-9].[0-2][0-9][0-9][[0-9])|([0-3][0-9].1[3-9].[0-2][0-9][0-9][0-9])|([0-3][0-9].[01][0-9].2[1-9][0-9][0-9])|([0-3][0-9].[01][0-9].20[3-9][0-9])|([0-3][0-9].[01][0-9].202[2-9])@u", $shops['datefoundation'])) {
        $arrayerrors['datefoundation'] = 'Дата содержит некорректную информацию или пуста';
        $erroscheck++;
    }
    if ($shops['namesup'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $shops['namesup'])) {
        $arrayerrors['errnamesup'] = 'Название содержит цифры, символы или пусто';
        $erroscheck++;
    }
    if ($shops['adress'] == "") {
        $arrayerrors['erradress'] = 'Заполните адрес';
        $erroscheck++;
    }

    if ($shops['sizes'] ==  0) {
        $arrayerrors['errsize'] = 'Укажите размеры';
        $erroscheck++;
    }


    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insert($shops['namesup'],$shops['adress'], $shops['sizes'], $shops['datefoundation']);
    }
    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $idshop = htmlspecialchars($_POST['idshop']);
        $obj->update($idshop, $shops['namesup'],$shops['adress'], $shops['sizes'], $shops['datefoundation']);

    }
}
if(isset($_POST['deleting'])){
    $id = htmlspecialchars($_POST['idshop']);
    $obj->delete($id);
}
