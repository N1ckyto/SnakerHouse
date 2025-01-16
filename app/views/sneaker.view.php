<?php
class SneakerView
{
    public function showHome($sneakers)
    {
        $count = count($sneakers);
        require_once 'templates/home.phtml';
    }
}
