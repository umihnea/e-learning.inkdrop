<?php
namespace Controllers;

use Core\View;
use Core\Controller;

class Sendpm extends Controller
{

    function __construct()
    {
        parent::__construct();
		$this->model=new \Models\SendPM();
    }

    public function index()
    {
		if(isset($_POST['submit']))
		{
			$this->model->sendPm(); 
		}
		View::render('landing/sendpm', $data);
	}
}
