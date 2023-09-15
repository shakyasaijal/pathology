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
        $this->db->query('UPDATE about SET info=:info, house_no=:house_no, street_name=:street_name, state=:state,
        postal_code=:postal_code, city=:city, country=:country, phone=:phone WHERE id=:id');
        
        $this->db->bind(':info', $data['info']);
        $this->db->bind(':house_no', $data['house_no']);
        $this->db->bind(':street_name', $data['street_name']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':postal_code', (int)$data['postal']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':phone', (int)$data['phone']);
        $this->db->bind(':id', 1);
        $row = $this->db->execute();

        if($row){
            return true;
        }else{
            return false;
        }
    }
}