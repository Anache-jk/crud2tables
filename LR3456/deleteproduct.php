<?php
require_once 'logic/logicindexproducts.php';
$idprod = htmlspecialchars($_GET['id']);
$data = $obj->getById($idprod);
?>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form action="" method = "post" class="form">
        <input type="hidden"  name="idprod" value="<?php echo $data[0][0]?>">
        <h3>Вы уверены, что хотите удалить "<?php echo $data[0][1] ?>"?</h3>
        <div class = "d-flex flex-row p-2">
            <a href="indexshops.php" class="m-5">Уйти к списку магазинов</a>
            <button type="submit" name="deleting" class = "buttons m-5" >Удалить магазин</button>
        </div>
    </form>
</div>
<? include('footer.php');?>
