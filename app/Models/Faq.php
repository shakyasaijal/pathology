<?php
/* Model */
namespace Pathology\Models;

include_once('../app/Core/Model.php');
use Pathology\Core;

class Faq extends Core\Model
{
    public $name;
    public $id;

    public function getAllFaq(){
        $this->db->query('SELECT * FROM faq ORDER BY created_at DESC');
        return $this->db->row();
    }

    public function getById($id){
        $this->db->query('SELECT * FROM faq WHERE id=:id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $data = $this->db->single();
        return $data;
    }

    public function updateRow($data){
        $this->db->query('UPDATE faq SET question=:question, answer=:answer WHERE id=:id');
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':answer', $data['answer']);
        $this->db->bind(':id', $data['id']);
        $row = $this->db->execute();

        if($row){
            return true;
        }else{
            return false;
        }
    }

    public function addFaq($data){
        $this->db->query('INSERT INTO faq (question, answer) VALUES (:question, :answer) ');
        $this->db->bind(':question', $data['question']);
        $this->db->bind(':answer', $data['answer']);
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getAllDoctors(){
        $this->db->query('SELECT * FROM doctors ORDER BY created_at DESC');
        return $this->db->row();
    }

    public function getAllDoctorsF(){
        $this->db->query('SELECT * FROM doctors ORDER BY RAND() LIMIT 5');
        return $this->db->row();
    }

    public function deleteFaq($id){
        $this->db->query('DELETE FROM faq where id=:id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
