<?php
require_once 'logic/logicindex.php';
$result = $obj->showData();
?>
<?php include('header.php');?>
<div class = "container"><div class = "row"><div class = "col-12">
            <a class="btn btn-primary d-flex justify-content-center m-4" type="button"  href="createperson.php"><i class = "fa fa-plus m-2"></i>Добавить работника</a></div>
       <?if($_GET['checklist'] == 1 || !$_GET['checklist']){
           echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='index.php?checklist=2'><i class = 'fa fa-plus m-2'></i>Вывести данные списком</a></div>";

       }elseif($_GET['checklist'] == 2){
           echo " <a class='btn d-flex justify-content-center m-4' type='button'  href='index.php?checklist=1'><i class = 'fa fa-plus m-2'></i>Вывести данные таблицей</a></div>";
       }?>
      <?php if($_GET['checklist'] == 1|| !$_GET['checklist']){
          echo "<table class = 'table table-striped table-hover m-2'>
            <thead class = 'thead-light'>
            <th>ID</th>
            <th>ФИО</th>
            <th>Дата рождения</th>
            <th>Пол</th>
            <th>Зарлата</th>
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
                    <td><a href="updateperson.php?id=<?=$row[0]?>" class = "btn btn-success">изменить</a>
                        <a href="deleteperson.php?id=<?=$row[0]?>" class = "btn btn-danger">удалить</a>
                       </td>
                </tr>
            <?php endforeach;

           echo "</tbody> </table>";}
      elseif ($_GET['checklist'] == 2){
          echo '<div class = "d-flex flex-column align-items-center">';
      foreach($result as $row):?>
    <div class = "d-flex m-5 p-5 border flex-column">Работник <?=$row[1]?> родился <?=$row[2]?>, его зарплата составляет <?=$row[4]?>, а работает он в "<?=$row[5]?>", что вы хотите с ним сделать
        <a style="color:green;font-weight: bold" href = "updateperson.php?id=<?=$row[0]?>"> изменить</a> или
        <a style="color:red;font-weight: bold" href="deleteperson.php?id=<?=$row[0]?>" >удалить</a> его?</div>
<?php endforeach;}?>
    </div></div></div>
<?php include('footer.php');?>
