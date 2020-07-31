<?php
class App{

    protected $controller="Home";
    protected $action="Products";
    protected $params=[];

    function __construct(){
 
        $arr = $this->UrlProcess();
 
        // Controller
        if(isset($arr)) {
            if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        //$this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Params
        //$this->params = $arr && ‌‌is_numeric($arr)?array_values($arr):[false];
        $this->params = $arr ?array_values($arr):[false];
        call_user_func_array([$this->controller, $this->action], $this->params );

    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>