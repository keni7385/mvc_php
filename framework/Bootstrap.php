<?php

class Bootstrap
{
    function __construct() {
        $this->load();
    }

    public function run() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode("/", $url);

        if(empty($url[0])) {
            require_once($this->controllerAddress("Index"));
            $controller = new IndexController();
            $controller->index();
            return;
        }

        $controllerFile = $this->controllerAddress($url[0]);
        if(file_exists($controllerFile)) {
            require_once($controllerFile);

            $name = $url[0];
            $url[0] = $name . "Controller";
            $controller = new $url[0]();
            $controller->loadModel($name);

            if(isset($url[1])) {
                if(method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    // error view
                    unset($controller);
                    require_once($this->controllerAddress("Error"));
                    $controller = new ErrorController("Errore 404", "Pagina non trovata.");
                    $controller->index();
                }
            } else {
                $controller->index();
            }
        } else {
            // error view
            require_once($this->controllerAddress("Error"));
            $controller = new ErrorController("Errore 404", "Pagina non trovata.");
            $controller->index();
        }

    }

    private function load() {
        require_once("config/path.php");
        require_once("config/db.php");

        // maybe put an autoloader.
        require_once(FW_DIR . "Controller.php");
        require_once(FW_DIR . "View.php");
        require_once(FW_DIR . "Model.php");
        
        require_once(FW_DIR . "Database.php");
        require_once(FW_DIR . "Session.php");
    }

    private function controllerAddress($str)
    {
        return (CONTROLLER_DIR . $str . "Controller.php");
    }
}


?>