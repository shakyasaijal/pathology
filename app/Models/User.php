<?php
/* Model */
namespace Pathology\Models;

include('../app/Core/Model.php');
use Pathology\Core;

class User extends Core\Model
{
    public $name;
    public $id;
    
    public function getAllUser(){
        return $this->db->row('SELECT * from users');
    }
}