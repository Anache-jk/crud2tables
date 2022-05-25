<?php

class CrudPersonal{
    private $connect;

    public function __construct(){
    }

    function getconnectdb($db){
        $this->connect = $db;
    }

    public function showData(){
        $query = "select `workers`.id, `workers`.FIOname, `workers`.DateOfBirthday,`workers`.Gender,`workers`.sallary, `supermarkets`.NameSup
        from `workers`
        inner join `supermarkets` on `workers`.id_supermarket = `supermarkets`.id 
        order by `workers`.id;";
        $q = $this->connect->prepare($query);
        $q->execute();
        if(!$q){
            return "ОШИБКА ЧТЕНИЯ ЗАПИСЕЙ!";
        }
        $r = $q->fetchALL(PDO::FETCH_NUM);
        if($r){
            return $r;}
        else{
            return "Данные в таблице не найдены";
        }
    }

    public function getById($id){
        $query = "select workers.id, workers.FIOname, workers.DateOfBirthday,workers.Gender,workers.sallary, supermarkets.NameSup,supermarkets.id
        from workers
        inner join supermarkets on workers.id_supermarket = supermarkets.id 
        where workers.id = :id";
        $q = $this->connect->prepare($query);
        $q->execute(array(':id'=>$id));
        $data = $q->fetchALL(PDO::FETCH_NUM);
        if($data){
            return $data;}
        else{
            return "Произошла ошибка чтения по id";}
    }

    public function update($id,$gender,$fio,$shop,$date,$sallary)
    {
        $checkid = $this->getById($id);
        if ($checkid == "Произошла ошибка чтения по id") {
            return "ID было изменено, обновление записи не произошло";
        }
        $sql = "UPDATE workers SET Gender=:gender, FIOname=:fio, id_supermarket=:shop, DateOfBirthday=:dates, Sallary=:sallary where workers.id = $id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':gender' => $gender, ':fio' => $fio, ':shop' => $shop, ':dates' => $date, ':sallary' => $sallary));
        if ($q) {
            header('location: ../index.php');
        } else {
            return 'Произошла ошибка обращения к базе данных';
        }
    }


    public function insert($fio,$shop,$date,$sallary,$gender)
    {

        $sql = "INSERT INTO workers SET Gender=:gender, FIOname=:fio, id_supermarket=:shop, DateOfBirthday=:dates, Sallary=:sallary";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':gender' => $gender, ':fio' => $fio, ':shop' => $shop, ':dates' => $date, ':sallary' => $sallary));
        if ($q) {
            header('location: ../index.php');
        } else {
            return "Произошла ошибка обращения к базе данных";
        }
    }


    public function delete($id){
        $sql="DELETE FROM workers WHERE id=:id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':id'=>$id));
        if($q){
            header('location: ../index.php');}
        else{
            return "Произошла ошибка удаления из базы данных";
        }
    }



    public function getshops(){
        $sql = "select * from supermarkets";
        $places = $this->connect->prepare($sql);
        $places->execute();
        $row = $places->fetchALL(PDO::FETCH_ASSOC);
        if($row){
            return $row;}
        else{
            return "Таблица с магазинами пуста!";
        }
    }
}

class CrudProducts{
    private $connect;

    public function __construct(){
    }

    function getconnectdb($db){
        $this->connect = $db;
    }

    public function showData(){
        $query = "select `products`.id, `products`.NameProd, `products`.Category,`products`.Cost,`products`.QuantityOrWeightKG, `products`.Country, `supermarkets`.NameSup
        from `products`
        inner join `supermarkets` on `products`.id_supermarket = `supermarkets`.id 
        order by `products`.id;";
        $q = $this->connect->prepare($query);
        $q->execute();
        if(!$q){
            return "ОШИБКА ЧТЕНИЯ ЗАПИСЕЙ!";
        }
        $r = $q->fetchALL(PDO::FETCH_NUM);
        if($r){
            return $r;}
        else{
            return "Данные в таблице не найдены";
        }
    }

    public function getById($id){
        $query = "select `products`.id, `products`.NameProd, `products`.Category,`products`.Cost,`products`.QuantityOrWeightKG, `products`.Country, `supermarkets`.NameSup, supermarkets.id
        from `products`
        inner join `supermarkets` on `products`.id_supermarket = `supermarkets`.id 
        where `products`.id = :id";
        $q = $this->connect->prepare($query);
        $q->execute(array(':id'=>$id));
        $data = $q->fetchALL(PDO::FETCH_NUM);
        if($data){
            return $data;}
        else{
            return "Произошла ошибка чтения по id";}
    }

    public function update($id,$nameprod,$category,$cost,$kgquant,$country, $supermarket)
    {
        $checkid = $this->getById($id);
        if ($checkid == "Произошла ошибка чтения по id") {
            return "ID было изменено, обновление записи не произошло";
        }
        $sql = "UPDATE products SET NameProd=:nameprod, Category=:category, Cost=:cost, QuantityOrWeightKG=:kgquant, Country=:country, id_supermarket =:supermarket where products.id = $id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':nameprod' => $nameprod, ':category' => $category, ':cost' => $cost, ':kgquant' => $kgquant, ':country' => $country, ':supermarket' => $supermarket));
        if ($q) {
            header('location: ../indexproducts.php');
        } else {
            return 'Произошла ошибка обращения к базе данных';
        }
    }


    public function insert($nameprod,$category,$cost,$kgquant,$country, $supermarket)
    {
        $sql = "INSERT INTO products SET NameProd=:nameprod, Category=:category, Cost=:cost, QuantityOrWeightKG=:kgquant, Country=:country, id_supermarket =:supermarket";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':nameprod' => $nameprod, ':category' => $category, ':cost' => $cost, ':kgquant' => $kgquant, ':country' => $country, ':supermarket' => $supermarket));
        if ($q) {
            header('location: ../indexproducts.php');
        } else {
            return "Произошла ошибка обращения к базе данных";
        }
    }


    public function delete($id){
        $sql="DELETE FROM products WHERE id=:id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':id'=>$id));
        if($q){
            header('location: ../indexproducts.php');}
        else{
            return "Произошла ошибка удаления из базы данных";
        }
    }



    public function getshops(){
        $sql = "select * from supermarkets";
        $places = $this->connect->prepare($sql);
        $places->execute();
        $row = $places->fetchALL(PDO::FETCH_ASSOC);
        if($row){
            return $row;}
        else{
            return "Таблица с магазинами пуста!";
        }
    }
}

class CrudShops{
    private $connect;

    public function __construct(){
    }

    function getconnectdb($db){
        $this->connect = $db;
    }

    public function showData(){
        $query = "select `supermarkets`.id, `supermarkets`.NameSup, `supermarkets`.Adress,`supermarkets`.SizeInM3,`supermarkets`.DateOfFoundation
        from `supermarkets`";
        $q = $this->connect->prepare($query);
        $q->execute();
        if(!$q){
            return "ОШИБКА ЧТЕНИЯ ЗАПИСЕЙ!";
        }
        $r = $q->fetchALL(PDO::FETCH_NUM);
        if($r){
            return $r;}
        else{
            return "Данные в таблице не найдены";
        }
    }

    public function getById($id){
        $query = "select supermarkets.id, supermarkets.NameSup, supermarkets.Adress,supermarkets.SizeInM3,supermarkets.DateOfFoundation
        from supermarkets
        where supermarkets.id = :id";
        $q = $this->connect->prepare($query);
        $q->execute(array(':id'=>$id));
        $data = $q->fetchALL(PDO::FETCH_NUM);
        if($data){
            return $data;}
        else{
            return "Произошла ошибка чтения по id";}
    }

    public function update($id,$namesup,$adress,$sizeln,$dates)
    {
        $checkid = $this->getById($id);
        if ($checkid == "Произошла ошибка чтения по id") {
            return "ID было изменено, обновление записи не произошло";
        }
        $sql = "UPDATE supermarkets SET NameSup=:namesup, Adress=:adress, SizeInM3=:sizeln, DateOfFoundation=:dates where supermarkets.id = $id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':namesup' => $namesup, ':adress' => $adress, ':sizeln' => $sizeln, ':dates' => $dates));
        if ($q) {
            header('location: ../indexshops.php');
        } else {
            return 'Произошла ошибка обращения к базе данных';
        }
    }


    public function insert($namesup,$adress,$sizeln,$dates)
    {
        $sql = "INSERT INTO supermarkets SET NameSup=:namesup, Adress=:adress, SizeInM3=:sizeln, DateOfFoundation=:dates";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':namesup' => $namesup, ':adress' => $adress, ':sizeln' => $sizeln, ':dates' => $dates));
        if ($q) {
            header('location: ../indexshops.php');
        } else {
            return "Произошла ошибка обращения к базе данных";
        }
    }


    public function delete($id){
        $sql="DELETE FROM supermarkets WHERE id=:id";
        $q = $this->connect->prepare($sql);
        $q->execute(array(':id'=>$id));
        if($q){
            header('location: ../indexshops.php');}
        else{
            return "Произошла ошибка удаления из базы данных";
        }
    }

public function getproducts($id){
    $sql = "select * from products where id = $id";
    $places = $this->connect->prepare($sql);
    $places->execute();
    $row = $places->fetchALL(PDO::FETCH_NUM);
    if($row){
        return $row;}
    else{
        return "Товаров в магазине не найдено!";
    }
}

    public function getpersonal($id){
        $sql = "select * from workers where id = $id";
        $places = $this->connect->prepare($sql);
        $places->execute();
        $row = $places->fetchALL(PDO::FETCH_NUM);
        if($row){
            return $row;}
        else{
            return "Людей в магазине не найдено!";
        }
    }
}