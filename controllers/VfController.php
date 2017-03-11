<?php

class VfController extends Controller
{
    
    function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $this->renderView("vf" . DIRECTORY_SEPARATOR . "vf");
    }

    public function method() {
        print(phpinfo());
    }
}

?>