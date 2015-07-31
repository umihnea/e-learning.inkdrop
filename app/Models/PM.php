<?php 
namespace Models;

use Core\Model;
//use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class PM extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function listPm()
    {	
		$reciever = Session::get('id');
		
		$sth = $this->db->get()->prepare("SELECT * FROM pm WHERE reciever='1'"); // '1' => $reciever
		$sth->execute();
		$result = $sth->fetchAll();
		
			echo "<table border=1>";
			if($result)
			{

				foreach($result as $row)
				{
					
					echo "	<tr>
					<td class='left'>".$row['subject']."</td>
					<td>".$row['sender']."</td>
					<td>".$row['message']."</td>
					</tr>";	
				}
			}
			else 
			{
				echo "
				<tr>
						<td colspan='4' class='center'>You have no read message.</td>
				</tr>
				";
			}
			echo "</table>";
		
		return $result;
    }
	
    public function getUsername($username)
    {
		return $this->db->select("SELECT nume_login FROM studenti WHERE nume_login = :username",
			array(':username' => $username)
		);
	}
}

