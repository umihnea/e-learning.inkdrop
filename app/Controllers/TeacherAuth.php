<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Password;
use Helpers\Url;
use Helpers\Session;
use Helpers\Auth;

class TeacherAuth extends Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->teacherMember = new \Models\TeacherMember();
        Auth::none('teacher');
    }

    public function login()
    {
    	if (isset($_POST['submit']))
        {
            $data['login_error'] = $this->teacherMember->runLogin($_POST);
            if (!isset($data['login_error']))
                Url::redirect(DIR . 'teacher', true);
        }

        $data['title'] = 'Teacher Login';
        $data['css-assets'] = array('teacher-login.css');
        View::renderTemplate('teacher-header', $data, 'teacher-dashboard');
        View::renderTemplate('teacher-sidebar', $data, 'teacher-dashboard');
        View::render('teacher-dashboard/login', $data);
    }
}