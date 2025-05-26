<?php 
 class Controller {
    public function model($model){
        require_once '../app/Models/' . $model . '.php';
        return new $model();
    }
    public function view($view,$data = []){
        if(file_exists('../app/views/' . $view . '.php')){
            include_once '../app/views/' . $view . '.php';
        }else{
            die('View khong ton tai');
        }
    }
 }