<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class StudentMember extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function getStats($data)
    {
		$result = $this->db->get()->query('SELECT COUNT(*) FROM cursuri');
		$row = $result->fetch(PDO::FETCH_NUM);
		$data['num_courses'] = $row[0];

		$result = $this->db->get()->query('SELECT COUNT(*) FROM autori');
		$row = $result->fetch(PDO::FETCH_NUM);
		$data['num_teachers'] = $row[0];

		$result = $this->db->get()->query('SELECT COUNT(*) FROM studenti');
		$row = $result->fetch(PDO::FETCH_NUM);
		$data['num_students'] = $row[0];

		return $data;
    }

    public function runRegistration($post)
    {
    	$username           = $post['register_username'];
        $password           = $post['register_password'];
        $passwordConfirm    = $post['register_password_confirm'];
        $email              = $post['register_email'];
        $firstName          = $post['register_first_name'];
        $lastName           = $post['register_last_name'];
                       
	    $rainCaptcha = new \Helpers\RainCaptcha();
	    if (!$rainCaptcha->checkAnswer($post['captcha']))
	    	$error[] = 'You have not passed the CAPTCHA test!';

	    if (strlen($username) < 4)
	        $error[] = 'Username is too short.';
	    else {
	        $check = $this->getUsername($username);
	        if(strtolower($check[0]->nume_login) == strtolower($username))
	        	$error[] = 'Username already taken.';
	    }

	    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	        $error[] = 'Please enter a valid email address.';
	        else {
	            $check = $this->getEmail($email);
	            if(strtolower($check[0]->email) == strtolower($email))
	            	$error[] = 'Email already taken.';
	        	}
	            if (strlen($password) < 8)
	            	$error[] = 'Password is too short.';
	            elseif ($password != $passwordConfirm)
	            	$error[] = 'Passwords do not match.';
	            if (!isset($error))
	            {
	            	$activation = md5(uniqid(rand(),true));
	            	$hash = Password::make($password, PASSWORD_BCRYPT);
	            	$postdata = array(
	                	'nume_login' => $username,
	                	'parola' => $hash,
	                	'nume' => $lastName,
	                	'prenume' => $firstName,
	                    'email' => $email,
	                    'activare' => $activation
	                );
	                $id = $this->insertMember($postdata); // the id will help later with the link in the email

	        }
	    return $error;
    }

    public function runLogin($post)
    {
    	$data = $this->getMemberHash($post['login_username']);

            if (Password::verify($post['login_password'], $data[0]->parola))
            {
                Session::set('studentID', $data[0]->idStudenti);
                Session::set('username', $data[0]->nume_login);
                Session::set('loggedin', true);
                Session::set('level', 'student');

                if ($post['login_remember_me'])
                {
	                $tokenString = hash('sha256', mt_rand());

					$updateData = array('rememberme_token' => $tokenString);
					$where = array('idStudenti' => $data[0]->idStudenti);
					$this->db->update('studenti', $updateData, $where);

					$cookieStringFirstPart = $data[0]->idStudenti . ':' . $tokenString;
					$cookieStringHash = hash('sha256', $cookieStringFirstPart);
					$cookieString = $cookieStringFirstPart . ':' . $cookieStringHash;

					setcookie("rememberme", $cookieString, time() + COOKIE_RUNTIME);//, "/", COOKIE_DOMAIN);
	    		}
            }
            else $error[] = 'Wrong username or password or account has not been activated yet.';
        return $error;
    }

    public function runCookieLogin()
    {
    	$cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';
        
        if (!$cookie)
        {
            $error[] = "Invalid cookie. #1";
            return $error;
        }

        list ($user_id, $token, $hash) = explode(':', $cookie);
        if ($hash !== hash('sha256', $user_id . ':' . $token))
        {
            $error[] = "Invalid cookie. #2";
            return $error;
        }

        if (empty($token))
        {
            $error[] = "Invalid cookie. #3";
            return $error;
        }

		$data = $this->getMemberCookie($token);

		print_r($data[0]);

		if (isset($data[0]))
		{
			Session::set('studentID', $data[0]->idStudenti);
            Session::set('username', $data[0]->nume_login);
            Session::set('loggedin', true);
            Session::set('level', 'student');

            $error[] = 'Cookie login successful.';
        	return $error;
		}
		else
		{
			$error[] = "Invalid cookie. #4";
            return $error;
		}
    }

    public function getUsername($username)
    {
		return $this->db->select("SELECT nume_login FROM studenti WHERE nume_login = :username",
			array(':username' => $username)
		);
	}

	public function getEmail($email)
	{
		return $this->db->select("SELECT email FROM studenti WHERE email = :email", array(':email' => $email));
	}

	public function insertMember($data)
	{
		return $this->db->insert("studenti", $data);
	}

	public function getMemberId($id, $key)
	{
		return $this->db->select("SELECT idStudenti, activare FROM studenti WHERE idStudenti = :id AND activare = :key",
			array(
				':id' => $id,
				':key' => $key
			)
		);
	}

	public function updateMember($data, $where)
	{
		$this->db->update("studenti", $data, $where);
	}

	public function getMemberHash($username)
	{
		return $this->db->select("SELECT idStudenti, nume_login, parola FROM studenti WHERE activare='da' AND nume_login = :username",
			array(':username' => $username)
		);
	}

	public function getMemberCookie($cookieString)
	{
		return $this->db->select("SELECT idStudenti, nume_login FROM studenti WHERE rememberme_token = :rememberme_token AND rememberme_token IS NOT NULL",
			array(':rememberme_token' => $cookieString)
		);
	}

}