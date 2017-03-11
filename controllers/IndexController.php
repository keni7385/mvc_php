<?php

class IndexController extends Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->renderView("index" . DIRECTORY_SEPARATOR . "index");
    }

    public function method() {
        print(phpinfo());
    }
}

?>