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

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);
        $exec = $this->db->execute();
        $row = $this->db->single();
        if ($row){
            $hashedPassword = $row->password;
            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }    
        }else{
            return false;
        }
        
    }

    public function register($data) {
        $this->db->query("INSERT INTO users(`first_name`, `last_name`, `email`, `password`) VALUES(:first_name, :last_name, :email, :password)");
        //Bind values
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        $this->db->execute();
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}