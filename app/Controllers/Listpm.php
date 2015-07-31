<?php
namespace Controllers;

use Core\View;
use Core\Controller;

class Listpm extends Controller
{

    function __construct()
    {
        parent::__construct();
		$this->model=new \Models\PM();
		
    }
	
    public function index()
    {
		$data = $this->model->listPm();
		View::render('landing/listpm', $data);
    }

}
