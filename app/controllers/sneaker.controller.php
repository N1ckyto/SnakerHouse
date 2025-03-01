<?php
require_once 'app/models/sneaker.model.php';
require_once 'app/views/sneaker.view.php';

class SneakerController
{

    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new SneakerModel();
        $this->view = new SneakerView();
    }

    public function showHome()
    {
        $sneakers = $this->model->getAllSneakers();
        $this->view->showHome($sneakers);
    }
    public function showDetails($id)
    {
        // Obtiene los detalles de la propiedad por id
        $snakerDetails = $this->model->getDetails($id);

        // Envía los detalles a la vista
        return $this->view->viewDetails($snakerDetails);
    }

    public function showMarcas()
    {
        $this->view->ShowMarcas();
    }
}
