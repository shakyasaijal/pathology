<?php
/* Model */
namespace Pathology\Models;

include_once('../app/Core/Model.php');
use Pathology\Core;

class Message extends Core\Model
{
    public $name;
    public $id;

    public function getAllMessages(){
        $this->db->query('SELECT * FROM messages ORDER BY created_at DESC');
        return $this->db->row();
    }
}
