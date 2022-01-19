<?php


class Errores extends Controllers
{
	
	public function __construct()
	{
		parent::__construct();
		// session_start();
        // if(empty($_SESSION['login']))
        // {
		// 	header('Location: '.base_url().'/login');
	    // }

	}
	
	public function notFound()
	{
		$this->views->getView($this,"Errores");
	}

}
$notFound = new Errores();
$notFound->notFound();

  ?>