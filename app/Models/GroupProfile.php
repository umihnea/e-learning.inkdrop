<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class GroupProfile extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function getGroupName($groupId)
    {
        $data = $this->db->select("SELECT nume FROM grupuri WHERE id = :id",
            array(':id' => $groupId)
        );

        return $data[0]->nume;
    }

    public function getGroupDescription($groupId)
    {
        $data = $this->db->select("SELECT descr FROM grupuri WHERE id = :id",
            array(':id' => $groupId)
        );

        return $data[0]->descr;
    }

    public function getGroupMembers($groupId)
    {
        $groupList = $this->db->select("SELECT idStudenti FROM studenti_grupuri WHERE idGrupuri = :id",
            array(':id' => $groupId)
        );

        foreach ($groupList as $member) {
            $id = $member->idStudenti;
            $list[] = $this->getMemberInfo($id);
        }

        return $list;
    }

    public function getGroupTeacher($groupId)
    {
        $data = $this->db->select("SELECT id_autor FROM grupuri WHERE id = :id",
            array(':id' => $groupId)
        );

        return $this->getAuthorInfo($data[0]->id_autor);
    }

    public function getMemberInfo($id)
    {
        $data = $this->db->select("SELECT nume_login, nume, prenume FROM studenti WHERE idStudenti = :id",
            array(':id' => $id)
        );
        $return = array(
            'id' => $id,
            'username' => $data[0]->nume_login,
            'first_name' => $data[0]->prenume,
            'last_name' => $data[0]->nume
        );
        return $return;
    }

    public function getAuthorInfo($id)
    {
        $data = $this->db->select("SELECT nume_login, nume, prenume FROM autori WHERE idAutori = :id",
            array(':id' => $id)
        );
        $return = array(
            'id' => $id,
            'username' => $data[0]->nume_login,
            'first_name' => $data[0]->prenume,
            'last_name' => $data[0]->nume
        );
        return $return;
    }    

}