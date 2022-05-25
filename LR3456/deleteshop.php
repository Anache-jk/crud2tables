<?php
require_once 'logic/logicindexshops.php';
$idshop = htmlspecialchars($_GET['id']);
$data = $obj->getById($idshop);
$products = $obj->getproducts($idshop);
$personal = $obj->getpersonal($idshop);
?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form action="" method = "post" class="form">
            <input type="hidden"  name="idshop" value="<?php echo $data[0][0]?>">
            <h3>Вы уверены, что хотите удалить "<?php echo $data[0][1] ?>"?</h3>
            <div class = "d-flex flex-row p-2">
                <a href="indexproducts.php" class="m-5">Уйти к списку товаров</a>
                <button type="submit" name="deleting" class = "buttons m-5" >Удалить товар</button>
            </div>
            <h2>Учтите, что будут удалены следующие записи</h2>
            <div class = "d-flex flex-row align-items-center justify-content-center">

                <div class = "d-flex m-4 flex-column align-items-left">
                  <h3>Работники</h3>
                    <?
                    foreach ($personal as $row){
                        echo "<div class = 'border m-2'>".$row[1]."</div>";
                    }
                    ?>

                </div>

                <div class = "d-flex m-4 flex-column align-items-left">

                    <h3>Товары</h3>
                    <?
                    foreach ($products as $row){
                        echo "<div class = 'border m-2'>".$row[1]."</div>";
                    }
                    ?>
                </div>

            </div>
        </form>
    </div>
<? include('footer.php');?>