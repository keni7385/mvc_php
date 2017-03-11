<?php

class View {
    
    private $viewParams = array();

    function __construct() {

    }

    public function render($name, $arr=[]) {
        $viewFile = VIEW_DIR . $name . ".php";

        // loading metas like title, description, keywords
        $metaFile = VIEW_DIR . $name . ".meta.php";
        if(file_exists($metaFile)) {
            require_once($metaFile);
        } else {
            $defaultMetaFile = VIEW_DIR . "defaultMetaFile.php";
            require_once($defaultMetaFile);
        }

        // even if some param is already loaded we can add others or rewrite them
        if (!empty($arr)) {
            foreach ($arr as $key => $value) {
                $this->viewParams[$key] = $value;
            }
        }

        require_once(VIEW_DIR . "header.php");

        if(is_file($viewFile)) {
            require_once($viewFile);
        } else {
            // call for error
        }

        require_once(VIEW_DIR . "footer.php");
    }

    public function error($title, $msg) {
        
    }

    private function setViewParam($k, $v)
    {
        $this->viewParams[$k] = $v;
    }

    private function getViewParam($k)
    {
        return (isset($this->viewParams[$k]) ? $this->viewParams[$k] : null);
    }

    private function getViewParams()
    {
        return $this->viewParams;
    }

}

?>