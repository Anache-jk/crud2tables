<?php
require_once 'logic/logicindexproducts.php';

?>
<? include('header.php');?>
    <div class = "d-flex container-xxl justify-content-center p-4 ">
        <form enctype="multipart/form-data" action="" method = "post" class="form">
            <label class = "labels">Название продукта</label>
            <input class = "forminputs" name = "nameprod" type = "text" placeholder="Введите название" value="<?php echo $product['nameprod'] ?>">
            <?php if($arrayerrors['errnameprod']){
                echo ' <div class = "err">'.$arrayerrors['errnameprod'] . '</div>';}
            ?>

            <label class = "labels">Категория товара</label>
            <input class = "forminputs" name = "category" type = "text" placeholder="Овощи, гигиена, мясо, рыба и т.д" value="<?php echo $product['category'] ?>">
            <?php if($arrayerrors['errcategory']){
                echo ' <div class = "err">'.$arrayerrors['errcategory'] . '</div>';}
            ?>


            <label class = "labels">Цена за шт/кг</label>
            <input type="text" name = "numsallary" value="<?php echo $product['numsallary']?>">
            <?php if($arrayerrors['numsallary']){
                echo ' <div class = "err">'.$arrayerrors['numsallary']. '</div>';}
            ?>
            <label class = "labels">Количество в шт/кг</label>
            <input type="text" name = "quantity" value="<?php echo $product['quantity']?>">
            <?php if($arrayerrors['errquantity']){
                echo ' <div class = "err">'.$arrayerrors['errquantity']. '</div>';}
            ?>
            <label class = "labels">Страна происхождения продукта</label>
            <input class = "forminputs" name = "country" type = "text" placeholder="Введите страну" value="<?php echo $product['country'] ?>">
            <?php if($arrayerrors['errcountry']){
                echo ' <div class = "err">'.$arrayerrors['errcountry'] . '</div>';}
            ?>

            <label class = "p-4 text-center">Магазин, в котором находится товар</label>
            <select name="nameofplace" class="form-control">
                <option value="<?php echo $product['nameofplace']?>" selected><?php if($product['nameofplace']){echo $row[$product['nameofplace']-1]['NameSup'];}else{ echo 'Выберите магазин';}?></option>
                <?php
                foreach($row as $placed){
                    if($product['nameofplace']){
                        if($placed["id"]!=$row[$product['nameofplace']-1]['id']){
                            echo '<option value = "'.$placed["id"].'">'.$placed["NameSup"]. '||'. $placed["Adress"].'</option>';}}
                    else{
                        echo '<option value = "'.$placed["id"].'">'.$placed["NameSup"]. '||'. $placed["Adress"].'</option>';
                    }
                }?>
            </select>
            <?php if($arrayerrors['errplace']){
                echo ' <div class = "err">'.$arrayerrors['errplace']. '</div>';}
            ?>


            <div class = "d-flex flex-row p-2">
                <a href="indexproducts.php" class="m-5">Уйти к списку товаров</a>
                <button type="submit" name="creating" class = "buttons m-5" >Добавить товар</button>
            </div>
        </form>
    </div>
<? include('footer.php');?>