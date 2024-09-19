<?php 
class Authmodel extends CI_Model{
 
    

    public function validate_user($email,$password){
        $sqlQuery = $this->db->query("SELECT * FROM user_accounts WHERE email='$email' AND password='$password'")->result_array();
        $result = $this->db->query(" SELECT email,  CONCAT(firstname, ' ', lastname) AS full_name, firstname, lastname, PASSWORD FROM user_accounts")->result_array();

        return $sqlQuery;

    }

}
?>