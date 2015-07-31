<?php 
namespace Models;

use Core\Model;
use Helpers\Password;
use Helpers\Session;
use Helpers\Url;
use PDO;

class CourseUpload extends Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function runUpload($name, $desc, $newfilename)
    {
        $uploadData = array(
            'nume_curs' => $name,
            'Subiecte_idSubiecte' => 3,
            'descriere_curs' => $desc,
            'Autori_idAutori' => Session::get('id'),
            'link' => $newfilename
        );
        
        $this->db->insert('cursuri', $uploadData);
    }

}