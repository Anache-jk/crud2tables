<?php
require_once 'classes/crudclases.php';
require_once 'classes/connectdb.php';

$obj = new CrudPersonal();
$conn = new Database();
$obj->getconnectdb($conn->connect());
$row = $obj->getshops();

$human['FIO'] = htmlspecialchars($_POST['FIO']);
$human['nameofplace'] = htmlspecialchars($_POST['nameofplace']);
$human['dateburial'] = htmlspecialchars($_POST['dateburial']);
$human['numsallary'] = htmlspecialchars($_POST['numsallary']);
$human['gender'] = htmlspecialchars($_POST['gender']);
if(isset($_POST['creating'])||(isset($_POST['editing']))) {
    $erroscheck=0;
    if (!preg_match("@[0-3][0-9].[01][0-9].[0-2][0-9][0-9][[0-9]@u", $human['dateburial']) || $human['dateburial'] == ""
        || preg_match("@(3[2-9].[01][0-9].[0-2][0-9][0-9][[0-9])|([0-3][0-9].1[3-9].[0-2][0-9][0-9][0-9])|([0-3][0-9].[01][0-9].2[1-9][0-9][0-9])|([0-3][0-9].[01][0-9].20[3-9][0-9])|([0-3][0-9].[01][0-9].202[2-9])@u", $human['dateburial'])) {
        $arrayerrors['errdate'] = 'Дата содержит некорректную информацию или пуста';
        $erroscheck++;
    }
    if ($human['FIO'] == "" || !preg_match("@^[а-яёА-ЯЁa-zA-Z ]+$@ui", $human['FIO'])) {
        $arrayerrors['errfio'] = 'ФИО содержит цифры, символы или пусто';
        $erroscheck++;
    }
    if ($human['nameofplace'] == "") {
        $arrayerrors['errplace'] = 'Заполните место работы';
        $erroscheck++;
    }
    if ($human['gender'] != 'Ж' && $human['gender'] != "М") {
        $arrayerrors['errgender'] = 'Введите корректный пол';
        $erroscheck++;
    }
    if ($human['numaudience'] == "" && $human['numaudience'] != 0) {
        $arrayerrors['numaudience'] = 'Введите количество присутствовавших';
        $erroscheck++;
    }


    if ((isset($_POST['creating'])) && $erroscheck == 0) {
        $obj->insert($human['FIO'], $human['nameofplace'], $human['dateburial'], $human['numsallary'], $human['gender']);
    }
    if ((isset($_POST['editing'])) && $erroscheck == 0) {
        $idhuman = htmlspecialchars($_POST['humanid']);
        $obj->update($idhuman, $human['gender'], $human['FIO'],$human['nameofplace'], $human['dateburial'], $human['numsallary']);
    }
}
if(isset($_POST['deleting'])){
    $id = htmlspecialchars($_POST['idhuman']);
    $obj->delete($id);
}