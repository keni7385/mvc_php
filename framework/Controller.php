<?php

class Controller {
    
    protected $view = null;
    protected $model = null;

    function __construct() {
        $this->view = new View();
    }

    public function renderView($name, $arr=null) {
        $this->view->render($name, $arr);
    }

    public function loadModel($name) {
        $name = $name . "Model";
        $modelFile = MODEL_DIR . $name . ".php";

        if(file_exists($modelFile)) {
            require_once($modelFile);
            $this->model = new $name();
         }
    }

}

?>