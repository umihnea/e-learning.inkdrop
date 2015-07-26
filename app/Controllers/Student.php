<?php
namespace Controllers;

use Core\View;
use Core\Controller;

class Student extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //View::render('landing/landing', $data);
        echo 'student dashboard';
    }

}
