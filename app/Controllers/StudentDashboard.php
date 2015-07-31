<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Auth;

class Student extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Auth::any();
    }

    public function index()
    {
        echo 'test';
    }

}
