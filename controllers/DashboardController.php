<?php

class DashboardController extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
		$s = Session::getInstance();
		if(!$s->get("username"))
			header("location: /login");
		
		$this->view->js = array("/views/dashboard/js/default.js");

		$this->renderView("dashboard" . DIRECTORY_SEPARATOR . "dashboard");
    }
	
	public function logout() {
		Session::getInstance()->set("username", null);
		Session::getInstance()->destroy();
		$this->index();
	}

	public function xhrInsert() {
		$this->model->xhrInsert();
	}

}

?>