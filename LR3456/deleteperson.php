<?php
require_once 'logic/logicindex.php';
$idhuman = htmlspecialchars($_GET['id']);
$data = $obj->getById($idhuman);
?>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form action="" method = "post" class="form">
        <input type="hidden"  name="idhuman" value="<?php echo $data[0][0]?>">
        <h3>Вы уверены, что хотите удалить "<?php echo $data[0][1] ?>"?</h3>
        <div class = "d-flex flex-row p-2">
            <a href="index.php" class="m-5">Уйти к списку работников</a>
            <button type="submit" name="deleting" class = "buttons m-5" >Удалить работника</button>
        </div>
    </form>
</div>
<? include('footer.php');?>
