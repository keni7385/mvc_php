<?php

class LoginController extends Controller {
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
		$s = Session::getInstance();
		if($s->get("username")) {
            header("location: /dashboard");
        }

		$this->renderView("login" . DIRECTORY_SEPARATOR . "index");
    }
	
	public function login() {
		$this->model->login();
	}

}

?>