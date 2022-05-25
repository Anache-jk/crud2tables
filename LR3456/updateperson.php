<?php
require_once 'logic/logicindex.php';
$humanid = htmlspecialchars($_GET['id']);
$data = $obj->getById($humanid);
?>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form enctype="multipart/form-data" action="" method = "post" class="form">
        <input type="hidden" name="humanid" value="<? echo $data[0][0] ?>">
        <label class = "labels">ФИО Сотрудника</label>
        <input class = "forminputs" name = "FIO" type = "text" placeholder="Введите ФИО полностью" value="<? if(!$human['FIO']){echo $data[0][1];}else{echo $human['FIO'];} ?>">
        <?php if($arrayerrors['errfio']){
            echo ' <div class = "err">'.$arrayerrors['errfio'] . '</div>';}
        ?>

        <label class = "labels">Пол сотрудника</label>
        <input class = "forminputs" name = "gender" type = "text" placeholder="М или Ж" value="<?php if(!$human['gender']){ echo $data[0][3];}else{echo $human['gender'];} ?>">
        <?php if($arrayerrors['errgender']){
            echo ' <div class = "err">'.$arrayerrors['errgender'] . '</div>';}
        ?>
        <label class = "p-4 text-center">Выберете магазин</label>
        <select name="nameofplace" class="form-control">
            <option value="<?php if(!$human['nameofplace']){echo $data[0][6];}else{echo $human['nameofplace'];}?>" selected><?php if($human['nameofplace']){echo $row[$human['nameofplace']-1]['NameSup'];}else{ echo $data[0][5];} ?></option>
            <?php
            foreach($row as $placed){
                if(!$human['nameofplace']){
                    if($placed['id']!=$data[0][6]){
                        echo '<option value = "'.$placed['id'].'">'. $placed['NameSup'].'||'. $placed["Adress"].'</option>';}}
                else{
                    if($placed['id']!=$row[$human['nameofplace']-1]['id']){
                        echo '<option value = "'.$placed['id'].'">'.$placed['NameSup'].'||'. $placed["Adress"].'</option>';
                    }
                } }?>
        </select>
        <?php if($arrayerrors['errplace']){
            echo ' <div class = "err">'.$arrayerrors['errplace']. '</div>';}
        ?>
        <label class = "labels">День рождения сотрудника</label>
        <input class = "forminputs" name = "dateburial" type="text" value="<?php if(!$human['dateburial']){echo $data[0][2];}else{echo $human['dateburial'];}?>">
        <?php if($arrayerrors['errdate']){
            echo ' <div class = "err">'.$arrayerrors['errdate']. '</div>';}
        ?>
        <label class = "labels">Размер зарплаты</label>
        <input type="number" name = "numsallary"  min="0" value="<?php  if(!$human['numsallary']){echo $data[0][4];}else{echo $human['numsallary'];}?>">
        <?php if($arrayerrors['numsallary']){
            echo ' <div class = "err">'.$arrayerrors['numsallary']. '</div>';}
        ?>
        <div class = "d-flex flex-row p-2">
            <a href="index.php" class="m-5">Уйти к списку сотрудников</a>
            <button type="submit" name="editing" class = "buttons m-5" >Обновить информацию о сотруднике</button>
        </div>
    </form>
</div>
<?php include('footer.php');?>
