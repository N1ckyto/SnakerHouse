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
    public function getDetails($id)
    {
        // Consulta para obtener los detalles de la propiedad y su propietario
        $stmt = $this->db->prepare('SELECT p.nombre, p.precio, p.imagen, p.id_marca
            FROM zapatilla p
            JOIN marca pr ON p.id_marca = pr.id
            WHERE p.id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
