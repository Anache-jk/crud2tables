<?php
require_once 'logic/logicproduct.php';

?>
<? include('header.php');?>
</header>
<div class = "p-4 container d-flex flex-column justify-content-center">
    <div class = "d-flex justify-content-center">
        <form class = "d-flex flex-column justify-content-center" action="filterproducts.php" method="get">
            <div class = "p-4 m-4 text-center textdop">Фильтрация товаров </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по магазину:</label>
                <select name="nameofplace" class="form-control">
                    <option value="" selected>Выберите магазин</option>
                    <?php
                    foreach($row as $placed):?>

                        <option value = "<?=$placed['id'] ?>"> <?=$placed['NameSup'].'||'. $placed["Adress"] ?></option>;;
                    <?php endforeach;?>
                </select>

            </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по названию продукта:</label>
                <textarea class="form-control" placeholder="Введите название или его часть" name="nameprod"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по стране производства:</label>
                <textarea class="form-control" placeholder="Введите страну или её часть" name="country"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по категории:</label>
                <textarea class="form-control" placeholder="Введите категорию или её часть" name="category"></textarea>
            </div>


            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Цена от:</label>
                <input type="number" name="num_from" placeholder="Введите цену от:" value='' class="form-control">
            </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Цена до:</label>
                <input type="number" name="num_to" placeholder="Введите цену до:" value='' class="form-control">
            </div>
            <div class="p-4 d-flex flex-row justify-content-center">
                <input type="submit" value="Применить фильтры" class="m-2 btn btn-success">
                <input type="submit" name="clearfilter" value="Очистить фильтры" class="m-2 btn btn-warning">
            </div>
        </form>
    </div>

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название товара</th>
                <th scope="col">Категория</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Количество/вес</th>
                <th scope="col">Страна производства</th>
                <th scope="col">Магазин</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($products as $pole):?>
                <tr>

                    <td><?=$pole[0]?></td>
                    <td><?=$pole[1]?></td>
                    <th><?=$pole[2]?></th>
                    <td><?=$pole[3]?></td>
                    <td><?=$pole[4]?></td>
                    <td><?=$pole[5]?></td>
                    <td><?=$pole[6]?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<? include('footer.php');?>




