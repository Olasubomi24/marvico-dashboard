<?php
class Utility extends MX_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
   
    public function call_api($method, $url, $data = false)
    {
        $header = array("Content-Type:application/x-www-form-urlencoded", "x-api-key:" . X_API_KEY);
        $curl = curl_init();
        switch ($method) {
            case "POST":
             
                curl_setopt($curl, CURLOPT_POST, true);
                if ($data) {
            
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "Q_POST":
      
                curl_setopt($curl, CURLOPT_POST, true);
                if ($data) {
                    $data = http_build_query($data);
                   
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:

                if ($data) {
                    $url = $url . "/$data";
                }

        }

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $response = "cURL Error #:" . $err;
        } else {
            $response = $result;
        }
        //print_r($response);

        return $response;
    }
    

    


    public function user_login($email, $password)
    {
        $query1 = $this ->db ->query("SELECT email,  CONCAT(firstname, ' ', lastname) AS full_name, firstname, lastname, PASSWORD FROM user_accounts where email ='$email' and password ='$password' ")->result();
        $query = $this ->db ->query("SELECT email,  CONCAT(firstname, ' ', lastname) AS full_name, firstname, lastname FROM user_accounts where email ='$email' and password ='$password' ")->result();
        if(count($query1) > 0){
            $response =   array('status_code' => '0','message' => "Login Successful", 'user_details' => $query);
        }
        else{
            $response =   array('status_code' => '1','message' => "Incorrect User details");
        }
        return $response;
    }

    public function product_des() {
        $sql = "SELECT Product_Description_id, Product_Description_name FROM `product_description`";
        $result = $this->db->query($sql)->result_array();
        return array('status_code' => '0', 'message' => 'Successful', 'result' => $result);
    }

    public function product() {
        $sql = " SELECT Product_id, Product_name FROM products";
        $result = $this->db->query($sql)->result_array();
        return array('status_code' => '0', 'message' => 'Successful', 'result' => $result);
    }
    public function packages() {
        $sql = " SELECT package_id, package_name FROM packages";
        $result = $this->db->query($sql)->result_array();
        return array('status_code' => '0', 'message' => 'Successful', 'result' => $result);
    }
    
public function change_password($email, $password)
{
    $data = array('password' => $password);
    $this->db->where('email', $email);
    $this->db->update('user_accounts', $data);

    if ($this->db->affected_rows() > 0) {
        $response = array('status_code' => '0', 'message' => 'Password change successful');
    } else {
        $response = array('status_code' => '1', 'message' => 'Incorrect user details or no change made');
    }
    
    return $response;
}

public function user_creation( $firstname,$lastname,$email, $password)
{


    $query1 = "INSERT into user_accounts(firstname,lastname,email,password)
                    VALUES ('$firstname','$lastname','$email','$password')";
        $this->db->trans_start(); // Start a transaction

        try {
            $this->db->query($query1);
            $response = array('status_code' => '0', 'message' => 'User Account Creation Successful');
            $this->db->trans_commit(); // Commit the transaction
        } catch (Exception $e) {
            $this->db->trans_rollback(); // Rollback the transaction in case of an error
            $response = array('status_code' => '1', 'message' => 'User Account Creation Unsuccessful.');
        }
    
    return $response;
}

function is_email_exist($email){
    $response = array("status_code" => "0" , "message" => "Email not found");
    $query = $this->db->query("select email from user_accounts where email = '$email'")->result_array();
    if ( sizeof($query ) > 0){
        $response = array("status_code" => "1" , "message" => "Email already exist");  
    }
    return $response;
}

public function get_all_products() {
    $query = $this->db->query("
        SELECT 
            a.id,  
            b.Product_name, 
            c.Product_Description_name, 
            d.package_name, 
            a.measurement, 
            a.price, 
            a.product_image
        FROM measurement_and_price a
        LEFT JOIN products b ON a.product_id = b.Product_Id
        INNER JOIN product_description c ON a.product_description_id = c.Product_Description_id
        LEFT JOIN packages d ON a.package_id = d.package_id
    ");
    return $query->result();
}


public function get_product_by_id($id) {
    return $this->db->get_where('measurement_and_price', array('id' => $id))->row();
}

public function insert_product($product_data) {
    return $this->db->insert('measurement_and_price', $product_data);
}

public function update_product($id, $product_data) {
    $this->db->where('id', $id);
    return $this->db->update('measurement_and_price', $product_data);
}

public function delete_product($id) {
    $this->db->where('id', $id);
    return $this->db->delete('measurement_and_price');
}

public function get_all_product_description() {
    return $this->db->get('product_description')->result();
}

public function insert_product_description($data) {
    return $this->db->insert('product_description', $data);
}

public function update_product_description($Product_Description_id, $product_data) {
    $this->db->where('Product_Description_id', $Product_Description_id);
    return $this->db->update('product_description', $product_data);
}

public function get_product_description_by_id($Product_Description_id) {
    $this->db->where('Product_Description_id', $Product_Description_id);
    return $this->db->get('product_description')->row();
}

public function deleteProductDescription($Product_Description_id) {
    $this->db->where('Product_Description_id', $Product_Description_id);
    return $this->db->delete('product_description'); // Corrected table name
}

public function get_all_product() {
    return $this->db->get('products')->result();
}

public function insert_products($data) {
    return $this->db->insert('products', $data);
}

public function update_products($Product_Id, $product_data) {
    $this->db->where('Product_id', $Product_Id);
    return $this->db->update('products', $product_data);
}

public function get_products_by_id($Product_Id) {
    $this->db->where('Product_id', $Product_Id);
    return $this->db->get('products')->row();
}

public function deleteProduct($Product_Id) {
    $this->db->where('Product_id', $Product_Id);
    return $this->db->delete('products'); // Corrected table name
}


public function get_all_package() {
    return $this->db->get('packages')->result();
}

public function insert_packages($product_data) {
    return $this->db->insert('packages', $product_data);
}

public function update_packages($package_id, $product_data) {
    $this->db->where('package_id', $package_id);
    return $this->db->update('packages', $product_data);
}

public function get_packages_by_id($package_id) {
    $this->db->where('package_id', $package_id);
    return $this->db->get('packages')->row();
}

public function deletepackages($package_id) {
    $this->db->where('package_id', $package_id);
    return $this->db->delete('packages'); // Corrected table name
}

}
?>