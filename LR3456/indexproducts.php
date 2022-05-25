<?php
require_once 'logic/logicindexproducts.php';
$result = $obj->showData();
?>
<?php include('header.php');?>
    <div class = "container"><div class = "row"><div class = "col-12">
                <a class="btn btn-primary d-flex justify-content-center m-4" type="button"  href="createproduct.php"><i class = "fa fa-plus m-2"></i>Добавить товар</a></div>
            <?if($_GET['checklist'] == 1 || !$_GET['checklist']){
                echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='indexproducts.php?checklist=2'><i class = 'fa fa-plus m-2'></i>Вывести данные ячейками</a></div>";

            }elseif($_GET['checklist'] == 2){
                echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='indexproducts.php?checklist=1'><i class = 'fa fa-plus m-2'></i>Вывести данные таблицей</a></div>";
            }?>
            <?php if($_GET['checklist'] == 1 || !$_GET['checklist']){
                echo "<table class = 'table table-striped table-hover m-2'>
            <thead class = 'thead-light'>
            <th>ID</th>
            <th>Наименование</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Количество/вес</th>
            <th>Страна производства</th>
            <th>Магазин</th>
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
                        <td><?=$row[5]?></td>
                        <td><?=$row[6]?></td>
                        <td><a href="updateproduct.php?id=<?=$row[0]?>" class = "btn btn-success">изменить</a>
                            <a href="deleteproduct.php?id=<?=$row[0]?>" class = "btn btn-danger">удалить</a>
                        </td>
                    </tr>
                <?php endforeach;

                echo "</tbody> </table>";}
            elseif ($_GET['checklist'] == 2){
                echo '<div class = "d-flex col-12 p-4 flex-row align-items-center justify-content-center flex-wrap">';
                foreach($result as $row):?>
                    <div class = "d-flex flex-column col-5 m-2 align-items-center border">
            <div>id - <?=$row[0]?></div>
            <div>Наименование - <?=$row[1]?></div>
            <div>Категория товара - <?=$row[2]?> </div>
            <div> Стоимость - <?=$row[3]?> </div>
            <div>Количество/вес в кг - <?=$row[4]?></div>
            <div>Страна производства - <?=$row[5]?></div>
            <div>Магазин - <?=$row[6]?></div>

                        <a style="color:green;font-weight: bold" href = "updateproduct.php?id=<?=$row[0]?>"> изменить</a>
                        <a style="color:red;font-weight: bold" href="deleteproduct.php?id=<?=$row[0]?>" >удалить</a></div>
                <?php endforeach;}?>
        </div></div></div></div>
<?php include('footer.php');?>