<?php 
namespace Models;

use Core\Model;
//use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class SendPM extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function sendPm()
    {	
		
		$sender = Session::get('id');
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$recip = $_POST['reciever'];
		$read = '0';
		
		$stmt = $this->db->get()->prepare('SELECT id FROM autori WHERE nume_login='.$recip.'');
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$reciever = $row['id'];

		$send = $this->db->get()->prepare("INSERT INTO pm VALUES ('',".$subject.",".$sender.",".$reciever.",".$message.",".$read.",".time().")");
        $send->execute();		
		return $send;

    }
}

