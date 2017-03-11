<?php

/**
 * 
 */
class ErrorController extends Controller
{
    private $title;
    private $msg;

    function __construct($t, $m)
    {
        parent::__construct();
        $this->title = $t;
        $this->msg = $m;
    }

    public function index()
    {
        // gestire messaggi d'errore
        $params = [
            'TITLE' => "MVC PHP - " . $this->title,
            'DESCRIPTION' => "Error page",
            'ERROR_MSG' => $this->msg
        ];
        $this->renderView("error/index", $params);
    }
}


?>