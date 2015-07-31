<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class TeacherMember extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function runLogin($post)
    {
    	$data = $this->getMemberHash($post['login_username']);

            if (Password::verify($post['login_password'], $data[0]->parola))
            {
                Session::set('id', $data[0]->idAutori);
                Session::set('username', $data[0]->nume_login);
                Session::set('loggedin', true);
                Session::set('level', 'teacher');

                if ($post['login_remember_me'])
                {
	                $tokenString = hash('sha256', mt_rand());

					$updateData = array('rememberme_token' => $tokenString);
					$where = array('idAutori' => $data[0]->idAutori);
					$this->db->update('autori', $updateData, $where);

					$cookieStringFirstPart = $data[0]->idAutori . ':' . $tokenString;
					$cookieStringHash = hash('sha256', $cookieStringFirstPart);
					$cookieString = $cookieStringFirstPart . ':' . $cookieStringHash;

					setcookie("rememberme", $cookieString, time() + COOKIE_RUNTIME);//, "/", COOKIE_DOMAIN);
	    		}
            }
            else $error[] = 'Wrong username or password.';
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
			Session::set('id', $data[0]->idAutori);
            Session::set('username', $data[0]->nume_login);
            Session::set('loggedin', true);
            Session::set('level', 'teacher');

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
		return $this->db->select("SELECT nume_login FROM autori WHERE nume_login = :username",
			array(':username' => $username)
		);
	}

	/*public function getEmail($email)
	{
		return $this->db->select("SELECT email FROM studenti WHERE email = :email", array(':email' => $email));
	}*/

	public function getMemberId($id, $key)
	{
		return $this->db->select("SELECT idAutori, activare FROM autori WHERE idAutori = :id AND activare = :key",
			array(
				':id' => $id,
				':key' => $key
			)
		);
	}

	public function updateMember($data, $where)
	{
		$this->db->update("autori", $data, $where);
	}

	public function getMemberHash($username)
	{
		return $this->db->select("SELECT idAutori, nume_login, parola FROM autori WHERE nume_login = :username",
			array(':username' => $username)
		);
	}

	public function getMemberCookie($cookieString)
	{
		return $this->db->select("SELECT idAutori, nume_login FROM autori WHERE rememberme_token = :rememberme_token AND rememberme_token IS NOT NULL",
			array(':rememberme_token' => $cookieString)
		);
	}

}