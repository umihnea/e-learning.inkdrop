<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class GroupModel extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function handleFirstStep($post)
    {
        /*
        *   @todo: xss security
        *   @todo: csrf security
        *   @todo: gump validation
        */

        $name = $post['group_name'];
        $descr = $post['group_descr'];

        if (strlen($name) < 4)
        {
            $error[] = 'Group name is too short.';
        }
        else
        {
            $check = $this->getGroupName($name);
            if(strtolower($check[0]->nume) == strtolower($name))
                $error[] = 'Group name already taken.';
        }

        $tokenString = hash('sha256', mt_rand());

        $groupData = array(
            'id_autor' => Session::get('id'),
            'nume' => $name,
            'descr' => $descr,
            'completed' => $tokenString
        );

        if(!isset($error))
        {
            $this->db->insert('grupuri', $groupData);
            setcookie('unfinished_group', $tokenString, time() + COOKIE_RUNTIME);
            Url::redirect(DIR . 'teacher/new-group-2', true);
        }

        return $error;
    }

    public function getGroupName($name)
    {
        return $this->db->select("SELECT nume FROM grupuri WHERE nume = :name",
            array(':name' => $name)
        );
    }

    public function getGroupId($key)
    {
        $data = $this->db->select("SELECT id FROM grupuri WHERE completed = :key",
            array(':key' => $key)
        );
        return $data[0]->id;
    }

    public function addGroupMember($id)
    {
        $key = $_COOKIE['unfinished_group'];
        $groupId = $this->getGroupId($key);

        $insertData = array(
            'idStudenti' => $id,
            'idGrupuri' => $groupId
        );

        $groupList = $this->db->select("SELECT idStudenti FROM studenti_grupuri WHERE idGrupuri = :id",
            array(':id' => $groupId)
        );

        if (empty($groupList))
            $this->db->insert('studenti_grupuri', $insertData);
        else
            return 'Username already exists in group.';
    }

    public function delGroupMember($id)
    {
        $key = $_COOKIE['unfinished_group'];
        $groupId = $this->getGroupId($key);

        $groupList = $this->db->select("SELECT idStudenti FROM studenti_grupuri WHERE idGrupuri = :idGrupuri AND idStudenti = :idStudenti",
            array(
                ':idGrupuri' => $groupId,
                ':idStudenti' => $id
            )
        );

        if (!empty($groupList))
            $this->db->delete('studenti_grupuri',
                array(
                    'idStudenti' => $id,
                    'idGrupuri' => $groupId
                )
            );
        else
            return 'Username doesn\'t exist in group.';
    }

    public function getGroupMembers()
    {
        if (isset($_COOKIE['unfinished_group']))
            $key = $_COOKIE['unfinished_group'];
        else
            return false;
        
        $groupId = $this->getGroupId($key);

        $groupList = $this->db->select("SELECT idStudenti FROM studenti_grupuri WHERE idGrupuri = :id",
            array(':id' => $groupId)
        );

        foreach ($groupList as $member) {
            $id = $member->idStudenti;
            $list[] = $this->getMemberInfo($id);
        }

        return $list;
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

    public function updateGroup()
    {
        if (isset($_COOKIE['unfinished_group']))
            $key = $_COOKIE['unfinished_group'];
        else
            return false;

        $groupId = $this->getGroupId($key);

        $postdata = array('completed' => 'yes');
        $where = array('id' => $groupId);
        $this->db->update('grupuri', $postdata, $where);
    }

}