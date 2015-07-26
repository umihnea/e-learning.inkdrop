<?php
namespace Controllers;

use Core\View;
use Core\Controller;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;

class Landing extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new \Models\Member();

        $this->model->runCookieLogin();
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['css'] = 'app/templates/landing/css/LandingPage.css';

        $data['activation_success'] = Session::pull('activation_success');
        $data['activation_error'] = Session::pull('activation_error');
        $data['logged'] = Session::get('loggedin');

        $data = $this->handleHeader(null, $data);

        $data = $this->model->getStats($data);
        
        View::renderTemplate('header', $data, 'landing');
        View::render('landing/landing', $data); 
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['css'] = 'app/templates/landing/css/About.css';
        $data['logged'] = Session::get('loggedin');

        $data = $this->handleHeader('about', $data);

        View::renderTemplate('header', $data, 'landing');
        View::render('landing/about', $data);
    }

    public function handleHeader($method = null, $data)
    {
        $path = DIR;
        if ($method != null) $path = DIR . $method;

        if (isset($_POST['register_submit']))
        {
            $data['register_error'] = $this->model->runRegistration($_POST);
            if (!isset($data['register_error']))
                $data['success'] = 'You have been registered successfully.';
            else
                $data['script'] = 'openS()';
        }

        if (isset($_POST['login_submit']))
        {
            $data['login_error'] = $this->model->runLogin($_POST);
            if (!isset($data['login_error']))
                Url::redirect($path, true);
            else
                $data['script'] = 'openL()';
        }

        return $data;
    }

    public function activate($id, $key)
    {
        if (($id > 0) && (strlen($key) == 32))
        {
            $user = $this->model->getMemberId($id, $key);

            if($user[0]->idStudenti == 0)
                $error[] = 'No such account.';
            elseif ($user[0]->activare == 'da')
                $error[] = 'Account has already been activated.';
            else
            {
                $postdata = array('activare' => 'da');
                $where = array('idStudenti' => $id);
                $this->model->updateMember($postdata, $where);
            }
        } else $error[] = 'Invalid activation key provided.';

        if (!isset($error))
            Session::set('activation_success', true);
        else
            Session::set('activation_error', $error);
        Url::redirect(DIR, true);
    }

    public function logout()
    {
        Session::destroy();
        
        setcookie('rememberme', false, time() - (3600 * 3650));//'/', COOKIE_DOMAIN);

        Url::previous();
    }
}
