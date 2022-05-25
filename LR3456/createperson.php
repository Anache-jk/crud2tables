<?php
require_once 'logic/logicindex.php';

?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">
            <label class = "labels">ФИО сотрудника</label>
            <input class = "forminputs" name = "FIO" type = "text" placeholder="Введите ФИО полностью" value="<?php echo $human['FIO'] ?>">
            <?php if($arrayerrors['errfio']){
                echo ' <div class = "err">'.$arrayerrors['errfio'] . '</div>';}
            ?>

            <label class = "labels">Пол сотрудника</label>
            <input class = "forminputs" name = "gender" type = "text" placeholder="М или Ж" value="<?php echo $human['gender'] ?>">
            <?php if($arrayerrors['errgender']){
                echo ' <div class = "err">'.$arrayerrors['errgender'] . '</div>';}
            ?>
            <label class = "p-4 text-center">Выберете магазин</label>
            <select name="nameofplace" class="form-control">
                <option value="<?php echo $human['nameofplace']?>" selected><?php if($human['nameofplace']){echo $row[$human['nameofplace']-1]['NameSup'];}else{ echo 'Выберите магазин';}?></option>
                <?php
                foreach($row as $placed){
                    if($human['nameofplace']){
                        if($placed["id"]!=$row[$human['nameofplace']-1]['id']){
                            echo '<option value = "'.$placed["id"].'">'.$placed["NameSup"].'||'. $placed["Adress"].'</option>';}}
                    else{
                        echo '<option value = "'.$placed["id"].'">'.$placed["NameSup"]. '||'. $placed["Adress"].'</option>';
                    }
                }?>
            </select>
            <?php if($arrayerrors['errplace']){
                echo ' <div class = "err">'.$arrayerrors['errplace']. '</div>';}
            ?>
            <label class = "labels">День рождения сотрудника</label>
            <input class = "forminputs" name = "dateburial" type="text" value="<?php echo $human['dateburial']?>" placeholder="дд.мм.гггг">
            <?php if($arrayerrors['errdate']){
                echo ' <div class = "err">'.$arrayerrors['errdate']. '</div>';}
            ?>
            <label class = "labels">Размер зарплаты</label>
            <input type="number" name = "numsallary" min="0" value="<?php echo $human['numsallary']?>">
            <?php if($arrayerrors['numsallary']){
                echo ' <div class = "err">'.$arrayerrors['numsallary']. '</div>';}
            ?>
            <div class = "d-flex flex-row p-2">
                <a href="index.php" class="m-5">Уйти к списку работников</a>
                <button type="submit" name="creating" class = "buttons m-5" >Добавить работника</button>
            </div>
        </form>
    </div>
<? include('footer.php');?>