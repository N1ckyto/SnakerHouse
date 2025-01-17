<?php

class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=inmobiliaria_db;charset=utf8', 'root', '');
    }

    public function getUser($user)
    {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $query->execute([$user]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
}
