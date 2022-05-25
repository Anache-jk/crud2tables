<?php
require_once 'logic/logicshops.php';

?>
<? include('header.php');?>
</header>
<div class = "p-4 container d-flex flex-column justify-content-center">
    <div class = "d-flex justify-content-center">
        <form class = "d-flex flex-column justify-content-center" action="filtershops.php" method="get">
            <div class = "p-4 m-4 text-center textdop">Фильтрация магазинов </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по названию магазина:</label>
                <textarea class="form-control" placeholder="Введите название или его часть" name="namesup"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по адресу нахождения:</label>
                <textarea class="form-control" placeholder="Введите адрес или его часть" name="adress"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по дате основания:</label>
                <textarea class="form-control" placeholder="Введите дату или её часть(дд.мм.гггг)" name="dates"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Размер магазина в куб.м от:</label>
                <input type="number" name="num_from" placeholder="Введите размер от:" value='' class="form-control">
            </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Размер магазина в куб.м до:</label>
                <input type="number" name="num_to" placeholder="Введите размер до:" value='' class="form-control">
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
                <th scope="col">Название магазина</th>
                <th scope="col">Адресс</th>
                <th scope="col">Размеры в куб.м</th>
                <th scope="col">Дата постройки</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($shops as $pole):?>
                <tr>

                    <td><?=$pole[0]?></td>
                    <td><?=$pole[1]?></td>
                    <th><?=$pole[2]?></th>
                    <td><?=$pole[3]?></td>
                    <td><?=$pole[4]?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<? include('footer.php');?>





