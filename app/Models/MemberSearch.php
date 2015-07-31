<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class MemberSearch extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function runSearch($user)
    {
        /*
        *   check & sanitize
        */
    	$user = addslashes(trim($user)); //sanitize more
    	if(strlen($user) <= 2) return 0;
        /*
        *   perform search
        */
    	$q = $this->db->get()->prepare("SELECT idStudenti, nume_login, nume, prenume FROM studenti WHERE nume_login like concat('%', :search, '%')");
    	$q->execute(array(':search' => $user));
    	while ($results = $q->fetch(PDO::FETCH_ASSOC))
    	{
    		$users[] = array(
    			'username' => $results['nume_login'],
    			'first_name' => $results['prenume'],
    			'last_name' => $results['nume'],
    			'id' => $results['idStudenti']
    		);
    	}
        /*
        *   final check & return
        */
        if(count($users) == 0) return 0;
    	return $users;
    }

    /*public function handleSearch($post)
    {
        if (isset($post['search_submit']))
        {
            $search = $this->runSearch($post['search_username']);
            if (is_array($search))
                $data['search_results'] = $search;
            else
            {
                unset($data['search_results']);
                $data['search_message'] = $search;
                if ($search == 0)
                    $data['search_message'] = 'no results';
            }
        }
        return $data;
    }*/

    public function handleSearch($post)
    {
        if (isset($post['search_submit']))
        {
            $search = $this->runSearch($post['search_username']);
            if (is_array($search))
                Session::set('search_results', $search);
            else
            {
                Session::destroy('search_results');
                Session::set('search_message', $search);
                if ($search == 0)
                    Session::set('search_message', 'no results');
            }
        }
        //return $data;
    }
}