<?php
require_once 'logic/logicindexshops.php';

$idshop = htmlspecialchars($_GET['id']);
$data = $obj->getById($idshop);
?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">
            <input type="hidden" name="idshop" value="<? echo $data[0][0] ?>">

            <label class = "labels">Название магазина</label>
            <input class = "forminputs" name = "namesup" type = "text" placeholder="Введите название" value="<?php if(!$shops['namesup']){echo $data[0][1];}else{echo $shops['namesup'];} ?>">
            <?php if($arrayerrors['errnamesup']){
                echo ' <div class = "err">'.$arrayerrors['errnamesup'] . '</div>';}
            ?>

            <label class = "labels">Адрес магазина</label>
            <input type="text" name = "adress" value="<?php if(!$shops['adress']){echo $data[0][2];}else{echo $shops['adress'];}?>">
            <?php if($arrayerrors['erradress']){
                echo ' <div class = "err">'.$arrayerrors['erradress']. '</div>';}
            ?>
            <label class = "labels">Размеры магазина в куб.м</label>
            <input type="number" name = "sizes" min = "0" value="<?php if(!$shops['sizes']){echo $data[0][3];}else{echo $shops['sizes'];} ?>">
            <?php if($arrayerrors['errsize']){
                echo ' <div class = "err">'.$arrayerrors['errsize']. '</div>';}
            ?>
            <label class = "labels">Дата основания магазина</label>
            <input class = "forminputs" name = "datefoundation" type="text" value="<?php if(!$shops['datefoundation']){echo $data[0][4];}else{echo $shops['datefoundation'];}?>" placeholder="дд.мм.гггг">
            <?php if($arrayerrors['datefoundation']){
                echo ' <div class = "err">'.$arrayerrors['datefoundation']. '</div>';}
            ?>


            <div class = "d-flex flex-row p-2">
                <a href="indexshops.php" class="m-5">Уйти к списку магазинов</a>
                <button type="submit" name="editing" class = "buttons m-5" >Редактировать магазин</button>
            </div>
        </form>
    </div>
<? include('footer.php');?>