<?php
require_once 'logic/logicindexproducts.php';
$idprod = htmlspecialchars($_GET['id']);
$data = $obj->getById($idprod);
?>
<? include('header.php');?>
<div class = "d-flex container-xxl justify-content-center p-4 ">
    <form enctype="multipart/form-data" action="" method = "post" class="form">
        <input type="hidden" name="idprod" value="<? echo $data[0][0] ?>">

        <label class = "labels">Название продукта</label>
        <input class = "forminputs" name = "nameprod" type = "text" placeholder="Введите название" value="<? if(!$product['nameprod']){echo $data[0][1];}else{echo $product['nameprod'];} ?>">
        <?php if($arrayerrors['nameprod']){
            echo ' <div class = "err">'.$arrayerrors['nameprod'] . '</div>';}
        ?>

        <label class = "labels">Категория товара</label>
        <input class = "forminputs" name = "category" type = "text" placeholder="Овощи, гигиена, мясо, рыба и т.д" value="<?php if(!$product['category']){ echo $data[0][2];}else{echo $product['category'];} ?>">
        <?php if($arrayerrors['errcategory']){
            echo ' <div class = "err">'.$arrayerrors['errcategory'] . '</div>';}
        ?>

        <label class = "labels">Цена за шт/кг</label>
        <input type="text" name = "numsallary"  value="<?php if(!$product['numsallary']){echo $data[0][3];}else{echo $product['numsallary'];}?>">
        <?php if($arrayerrors['numsallary']){
            echo ' <div class = "err">'.$arrayerrors['numsallary']. '</div>';}
        ?>

        <label class = "labels">Количество в шт/кг</label>
        <input type="text" name = "quantity"  value="<?php if(!$product['quantity']){echo $data[0][4];}else{echo $product['quantity'];}?>">
        <?php if($arrayerrors['errquantity']){
            echo ' <div class = "err">'.$arrayerrors['errquantity']. '</div>';}
        ?>
        <label class = "labels">Страна происхождения продукта</label>
        <input class = "forminputs" name = "country" type = "text" placeholder="Введите страну" value="<?php if(!$product['country']){echo $data[0][5]; }else{ echo $product['country'];}?>">
        <?php if($arrayerrors['errcountry']){
            echo ' <div class = "err">'.$arrayerrors['errcountry'] . '</div>';}
        ?>

        <label class = "p-4 text-center">Выберете магазин</label>
        <select name="nameofplace" class="form-control">
            <option value="<?php if(!$product['nameofplace']){echo $data[0][6];}else{echo $product['nameofplace'];}?>" selected><?php if($product['nameofplace']){echo $row[$product['nameofplace']-1]['NameSup'];}else{ echo $data[0][6];} ?></option>
            <?php
            foreach($row as $placed){
                if(!$product['nameofplace']){
                    if($placed['id']!=$data[0][7]){
                        echo '<option value = "'.$placed['id'].'">'. $placed['NameSup'].'||'. $placed["Adress"].'</option>';}}
                else{
                    if($placed['id']!=$row[$product['nameofplace']-1]['id']){
                        echo '<option value = "'.$placed['id'].'">'.$placed['NameSup'].'||'. $placed["Adress"].'</option>';
                    }
                } }?>
        </select>
        <?php if($arrayerrors['errplace']){
            echo ' <div class = "err">'.$arrayerrors['errplace']. '</div>';}
        ?>

        <div class = "d-flex flex-row p-2">
            <a href="indexproducts.php" class="m-5">Уйти к списку товаров</a>
            <button type="submit" name="editing" class = "buttons m-5" >Обновить информацию о товаре</button>
        </div>
    </form>
</div>
<?php include('footer.php');?>

