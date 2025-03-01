<?php
class SneakerView
{
    public function showHome($sneakers)
    {
        $count = count($sneakers);
        require_once 'templates/home.phtml';
    }

    public function viewDetails($sneaker)
    {
        require_once 'templates/detalles_sneaker.phtml';
    }

    public function ShowMarcas()
    {
        require_once 'templates/marcas.phtml';
    }
}
