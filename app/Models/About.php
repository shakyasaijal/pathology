<?php
/* Model */
namespace Pathology\Models;

include_once('../app/Core/Model.php');
use Pathology\Core;

class About extends Core\Model
{
    public $name;
    public $id;

    public function getAboutData(){
        $this->db->query('SELECT * FROM about ORDER BY ID DESC LIMIT 1');
        return $this->db->row();
    }

    public function updateAboutData($data){
        $this->db->query('UPDATE about SET info=:info, full_address=:full_address, phone=:phone,
        email=:email, facebook_link=:facebook_link, linkedin_link=:linkedin_link WHERE id=:id');
        
        $this->db->bind(':info', $data['info']);
        $this->db->bind(':full_address', $data['full_address']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':facebook_link', $data['facebook_link']);
        $this->db->bind(':linkedin_link', $data['linkedin_link']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':id', 1);
        $row = $this->db->execute();

        if($row){
            return true;
        }else{
            return false;
        }
    }
    public function saveMessages($data){
        $this->db->query('INSERT INTO messages(full_name, email, phone, subject, message) 
        VALUES(:full_name, :email, :phone, :subject, :message)');

        $this->db->bind(':full_name', $data['full_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':message', $data['message']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
