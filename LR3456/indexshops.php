<?php
require_once 'logic/logicindexshops.php';
$result = $obj->showData();
?>
<?php include('header.php');?>
<div class = "container"><div class = "row"><div class = "col-12">
            <a class="btn btn-primary d-flex justify-content-center m-4" type="button"  href="createshop.php"><i class = "fa fa-plus m-2"></i>Добавить магазины</a></div>
        <?if($_GET['checklist'] == 1 || !$_GET['checklist']){
            echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='indexshops.php?checklist=2'><i class = 'fa fa-plus m-2'></i>Вывести данные мини-таблицами</a></div>";

        }elseif($_GET['checklist'] == 2){
            echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='indexshops.php?checklist=1'><i class = 'fa fa-plus m-2'></i>Вывести данные таблицей</a></div>";
        }?>
        <?php if($_GET['checklist'] == 1 || !$_GET['checklist']){
            echo "<table class = 'table table-striped table-hover m-2'>
            <thead class = 'thead-light'>
            <th>ID</th>
            <th>Название</th>
            <th>Адрес магазина</th>
            <th>Размеры в куб.м</th>
            <th>Дата основания</th>
            <th>Выбор действия</th>
            </thead>
            <tbody>";
            foreach($result as $row):?>
                <tr>
                <tr>
                    <th><?=$row[0]?></th>
                    <td><?=$row[1]?></td>
                    <td><?=$row[2]?></td>
                    <th><?=$row[3]?></th>
                    <td><?=$row[4]?></td>
                    <td><a href="updateshop.php?id=<?=$row[0]?>" class = "btn btn-success">изменить</a>
                        <a href="deleteshop.php?id=<?=$row[0]?>" class = "btn btn-danger">удалить</a>
                    </td>
                </tr>
            <?php endforeach;

            echo "</tbody> </table>";}
        elseif ($_GET['checklist'] == 2){
            echo '<div class = "d-flex col-12 p-4 flex-row align-items-center justify-content-center flex-wrap">';
            foreach($result as $row):?>
                <div style = "height: 380px;" class = "col-5 d-flex m-2 align-items-center justify-content-centers flex-column border"><h3><?=$row[1]?></h3>
        <table class="table">
            <tbody>
            <tr><td>Адрес магазина</td><td><?=$row[2]?></td></tr>
            <tr><td>Размеры в куб.м</td><td><?=$row[3]?></td></tr>
            <tr><td>Дата основания</td><td><?=$row[4]?></td></tr>
            <tr><td><a style="color:green;font-weight: bold" href = "updateshop.php?id=<?=$row[0]?>"> изменить</a></td><td>  <a style="color:red;font-weight: bold" href="deleteshop.php?id=<?=$row[0]?>" >удалить</a></td></tr>
            </tbody>
        </table></div>
            <?php endforeach;}?>
    </div></div></div></div>
<?php include('footer.php');?>
