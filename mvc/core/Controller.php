<?php
class Controller{

    public static function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public static function view($view, $data, $cart){
        require_once "./mvc/views/".$view.".php";
    }

    public static function login_view($view, $data, $user){
        require_once "./mvc/views/".$view.".php";
    }

}
?>