<?php
require_once 'logic/logicpersonal.php';

?>
<? include('header.php');?>
</header>
<div class = "p-4 container d-flex flex-column justify-content-center">
    <div class = "d-flex justify-content-center">
        <form class = "d-flex flex-column justify-content-center" action="filterpersonal.php" method="get">
            <div class = "p-4 m-4 text-center textdop">Фильтрация персонала </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по месту работы:</label>
                <select name="nameofplace" class="form-control">
                    <option value="" selected>Выберите магазин</option>
                    <?php
                    foreach($row as $placed):?>

                        <option value = "<?=$placed['id'] ?>"> <? echo $placed['NameSup'].'||'. $placed["Adress"] ?></option>;;
                    <?php endforeach;?>
                </select>

            </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по имени работника:</label>
                <textarea class="form-control" placeholder="Введите ФИО или его часть" name="fioname"></textarea>
            </div>

            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Фильтрация по полу:</label>
                <select name="gender" class="form-control">
                    <option value="" selected>Выберите пол</option>

                        <option value = "М">Мужской </option>
                    <option value = "Ж">Женский </option>

                </select>

            </div>


            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Зарплата от:</label>
                <input type="number" name="num_from" placeholder="Введите зарплату от:" value='' class="form-control">
            </div>
            <div class="mb-3 d-flex flex-column justify-content-center">
                <label class = "p-4 text-center">Зарплата до:</label>
                <input type="number" name="num_to" placeholder="Введите зарплату до:" value='' class="form-control">
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
                <th scope="col">ФИО сотрудника</th>
                <th scope="col">Дата рождения</th>
                <th scope="col">Пол</th>
                <th scope="col">Зарплата</th>
                <th scope="col">Место работы</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($people as $pole):?>
                <tr>

                    <td><?=$pole[0]?></td>
                    <td><?=$pole[1]?></td>
                    <th><?=$pole[2]?></th>
                    <td><?=$pole[3]?></td>
                    <td><?=$pole[4]?></td>
                    <td><?=$pole[5]?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<? include('footer.php');?>



