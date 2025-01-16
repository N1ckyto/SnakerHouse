<?php
require_once 'app/models/sneaker.model.php';
require_once 'app/views/sneaker.view.php';

class SneakerController{

    private $model; 
    private $view;

    public function __construct(){
        $this->model = new SneakerModel();
        $this->view = new SneakerView();
    }

    public function showHome(){
        $sneakers = $this->model->getAllSneakers();
        $this->view->showHome($sneakers);
    }
}
?>

