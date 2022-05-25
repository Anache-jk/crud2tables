<?php
require_once 'logic/logicindexshops.php';

?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">
            <label class = "labels">Название магазина</label>
            <input class = "forminputs" name = "namesup" type = "text" placeholder="Введите название" value="<?php echo $shops['namesup'] ?>">
            <?php if($arrayerrors['errnamesup']){
                echo ' <div class = "err">'.$arrayerrors['errnamesup'] . '</div>';}
            ?>

            <label class = "labels">Адрес магазина</label>
            <input type="text" name = "adress" value="<?php echo $shops['adress']?>">
            <?php if($arrayerrors['adress']){
                echo ' <div class = "err">'.$arrayerrors['erradress']. '</div>';}
            ?>
            <label class = "labels">Размеры магазина в куб.м</label>
            <input type="number" name = "sizes" min = "0" value="<?php echo $shops['sizes']?>">
            <?php if($arrayerrors['errquantity']){
                echo ' <div class = "err">'.$arrayerrors['errsize']. '</div>';}
            ?>
            <label class = "labels">Дата основания магазина</label>
            <input class = "forminputs" name = "datefoundation" type="text" value="<?php echo $shops['datefoundation']?>" placeholder="дд.мм.гггг">
            <?php if($arrayerrors['errdate']){
                echo ' <div class = "err">'.$arrayerrors['errdate']. '</div>';}
            ?>


            <div class = "d-flex flex-row p-2">
                <a href="indexshops.php" class="m-5">Уйти к списку магазинов</a>
                <button type="submit" name="creating" class = "buttons m-5" >Добавить магазин</button>
            </div>
        </form>
    </div>
<? include('footer.php');?>