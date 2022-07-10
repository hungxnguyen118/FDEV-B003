<?php
class database {
    private $dbo, $sql;

    function __construct()
    {
        $this->dbo = new PDO('mysql:host=localhost;dbname=ban_sach_online_db;charset=utf8', 'root', '');
        //var_dump($this->dbo);
    }

    function setQuery($sql){
        $this->sql = $sql;
    }

    function loadAllRow(){
        $sth = $this->dbo->prepare($this->sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    function loadRow(){
        $sth = $this->dbo->prepare($this->sql);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function execute_sql($sql){
        $this->sql = $sql;
        $result = $this->dbo->exec($this->sql);
        return $result;
    }
}
?>