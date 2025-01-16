<?php
class SneakerModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=sneakerhouse_db;charset=utf8', 'root', '');
    }

    public function getAllsneakers()
    {
        $query = $this->db->prepare('SELECT * FROM zapatilla');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
