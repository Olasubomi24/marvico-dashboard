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

    public function transactions() {
        $sql = "    
    SELECT user_id, email, phonenumber, register_name, sender_name, paid_amount, tran_reference, payment_status, subtotal, total_amount, payment_dt FROM `marvico_food_txn` WHERE payment_status IS NOT NULL ";
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

public function get_all_process_detail() {
    return $this->db->get('process_details')->result();
}

public function get_process_detail_by_id($id) {
    return $this->db->get_where('process_details', array('id' => $id))->row();
}

// public function insert_process_detail($process_detail_data) {
//     return $this->db->insert('process_details', $process_detail_data);
// }

public function update_process_detail($id, $process_detail_data) {
    $this->db->where('id', $id);
    return $this->db->update('process_details', $process_detail_data);
}

public function delete_process_detail($id) {
    $this->db->where('id', $id);
    return $this->db->delete('process_details');
}
public function get_all_offal_detail() {
    return $this->db->get('offal_details')->result();
}

public function get_offal_detail_by_id($id) {
    return $this->db->get_where('offal_details', array('id' => $id))->row();
}

public function insert_offal_detail($offal_detail_data) {
    return $this->db->insert('offal_details', $offal_detail_data);
}

public function update_offal_detail($id, $offal_detail_data) {
    $this->db->where('id', $id);
    return $this->db->update('offal_details', $offal_detail_data);
}

public function delete_sale_detail($id) {
    $this->db->where('id', $id);
    return $this->db->delete('sale_details');
}

public function get_all_sale_detail() {
    return $this->db->get('sale_details')->result();
}

public function get_sale_detail_by_id($id) {
    return $this->db->get_where('sale_details', array('id' => $id))->row();
}

// public function insert_sale_detail($sale_detail_data) {
//     return $this->db->insert('sale_details', $sale_detail_data);
// }

public function update_sale_detail($id, $sale_detail_data) {
    $this->db->where('id', $id);
    return $this->db->update('sale_details', $sale_detail_data);
}

public function delete_offal_detail($id) {
    $this->db->where('id', $id);
    return $this->db->delete('offal_details');
}

public function insert_process_detail($process_detail_data) {
    // Step 1: Fetch the latest `product_balance` for the given kilogram and product type from `process_details`
    $this->db->select('product_balance');
    $this->db->from('process_details');
    $this->db->where('killogramm', $process_detail_data['killogramm']);
    $this->db->where('product_type', $process_detail_data['product_type']);
    $this->db->order_by('id', 'DESC'); // Get the most recent entry
    $result = $this->db->get()->row();

    // Get current balance or default to 0 if no prior entries
    $current_balance = $result ? (float)$result->product_balance : 0;

    // Set old balance to the current balance
    $process_detail_data['old_product_balance'] = $current_balance;

    // Calculate new product balance
    $new_balance = $current_balance + (float)$process_detail_data['total'];
    $process_detail_data['product_balance'] = $new_balance;

    // Step 2: Insert into `process_details`
    $this->db->insert('process_details', $process_detail_data);

    // Step 3: Insert into `transaction_details` as a credit (CR) transaction
    $transaction_data = [
        'killogramm' => $process_detail_data['killogramm'],
        'quantity' => $process_detail_data['quantity'],
        'product_type' => $process_detail_data['product_type'],
        'total' => $process_detail_data['total'],
        'old_product_balance' => $current_balance, // Storing the old balance here
        'product_balance' => $new_balance, // New balance after addition
        'transaction_type' => 'CR', // Debit transaction type
        'time_in' => $process_detail_data['time_in'],
        'time_out' => $process_detail_data['time_out']
    ];
    $this->db->insert('transaction_details', $transaction_data);

    return true;
}

public function insert_sale_detail($sale_detail_data) {
    // Step 1: Fetch the latest product balance for the given kilogram and product type from `process_details`
    $this->db->select('id, product_balance, time_out');
    $this->db->from('process_details');
    $this->db->where('killogramm', $sale_detail_data['killogramm']);
    $this->db->where('product_type', $sale_detail_data['product_type']);
    $result = $this->db->order_by('id', 'DESC')->get()->row();

    // Check if there is enough balance for the sale
    if ($result) {
        $current_balance = (float)$result->product_balance;
        
        // Ensure the sale total does not exceed the available balance
        if ($sale_detail_data['total'] > $current_balance) {
            // Return error message
            return "Insufficient stock for {$sale_detail_data['product_type']}. Only {$current_balance} available.";
        }

        // Calculate the new balance after the sale
        $new_balance = $current_balance - (float)$sale_detail_data['total'];

        // Step 2: Update `process_details` with the new balance and time_out
        $update_data = [
            'product_balance' => $new_balance,
            'sale_balance' => $sale_detail_data['total'],
            'time_out' => date('Y-m-d H:i:s'), // Update the last sale time
            'old_product_balance' => $current_balance // Set the old balance before sale
        ];
        $this->db->where('id', $result->id);
        $this->db->update('process_details', $update_data);
    } else {
        // No balance found, handle this case (return error message if necessary)
        return "No stock available for {$sale_detail_data['product_type']}.";
    }

    // Step 3: Add `product_balance` to `sale_detail_data` and insert into `sale_details`
    $sale_detail_data['product_balance'] = $new_balance;
    $this->db->insert('sale_details', $sale_detail_data);

    // Step 4: Insert into `transaction_details` as a debit (DR) transaction
    $transaction_data = [
        'killogramm' => $sale_detail_data['killogramm'],
        'quantity' => $sale_detail_data['quantity'],
        'product_type' => $sale_detail_data['product_type'],
        'total' => $sale_detail_data['total'], // Positive for sale (debit)
        'old_product_balance' => $current_balance, // Old balance before sale
        'product_balance' => $new_balance,
        'transaction_type' => 'DR', // Debit transaction type
        'time_in' => $sale_detail_data['time_in'],
        'time_out' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('transaction_details', $transaction_data);

    return true;
}



// public function insert_sale_detail($sale_detail_data) {
//     // Step 1: Fetch the current product balance for the given kilogram and product type from `process_details`
//     $this->db->select('product_balance');
//     $this->db->from('process_details');
//     $this->db->where('killogramm', $sale_detail_data['killogramm']);
//     $this->db->where('product_type', $sale_detail_data['product_type']);
//     $result = $this->db->order_by('id', 'DESC')->get()->row();

//     // Calculate the remaining balance after the sale
//     if ($result) {
//         $current_balance = (float)$result->product_balance;
//         $new_balance = $current_balance - (float)$sale_detail_data['total'];

//         // Ensure balance is not negative
//         if ($new_balance < 0) {
//             return false; // Optionally, handle this case or return an error
//         }

//         // Update product balance in `process_details`
//         $update_data = [
//             'product_balance' => $new_balance,
//             'old_product_balance' => $current_balance // Store the old balance
//         ];
//         $this->db->where('id', $result->id);
//         $this->db->update('process_details', $update_data);
//     } else {
//         // No balance found, handle this case (return false or an error if necessary)
//         return false;
//     }

//     // Step 2: Add `product_balance` to `sale_detail_data` and insert into `sale_details`
//     $sale_detail_data['product_balance'] = $new_balance;
//     $this->db->insert('sale_details', $sale_detail_data);

//     // Step 3: Insert into `transaction_details` as a debit (DR) transaction
//     $transaction_data = [
//         'killogramm' => $sale_detail_data['killogramm'],
//         'quantity' => $sale_detail_data['quantity'],
//         'product_type' => $sale_detail_data['product_type'],
//         'total' => $sale_detail_data['total'], // Positive for sale (debit)
//         'old_product_balance' => $current_balance, // Storing the old balance before deduction
//         'product_balance' => $new_balance, // New balance after deduction
//         'time_in' => $sale_detail_data['time_in'],
//         'time_out' => $sale_detail_data['time_out']
//     ];
//     $this->db->insert('transaction_details', $transaction_data);

//     return true;
// }


// public function insert_sale_detail($sale_detail_data) {
//     // Step 1: Fetch the current product balance for the given kilogram and product type from `process_details`
//     $this->db->select('product_balance');
//     $this->db->from('process_details');
//     $this->db->where('killogramm', $sale_detail_data['killogramm']);
//     $this->db->where('product_type', $sale_detail_data['product_type']);
//     $result = $this->db->order_by('id', 'DESC')->get()->row();

//     // Calculate the remaining balance after the sale
//     if ($result) {
//         $current_balance = (float)$result->product_balance;
//         $new_balance = $current_balance - (float)$sale_detail_data['total'];

//         // Ensure balance is not negative
//         if ($new_balance < 0) {
//             return false; // Optionally, handle this case or return an error
//         }

//         // Update product balance in `process_details`
//         $update_data = [
//             'product_balance' => $new_balance,
//             'old_product_balance' => $current_balance // Store the old balance
//         ];
//         $this->db->where('id', $result->id);
//         $this->db->update('process_details', $update_data);
//     } else {
//         // No balance found, handle this case (return false or an error if necessary)
//         return false;
//     }

//     // Step 2: Insert into `sale_details`
//     $this->db->insert('sale_details', $sale_detail_data);

//     // Step 3: Insert into `transaction_details` as a debit (DR) transaction
//     $transaction_data = [
//         'killogramm' => $sale_detail_data['killogramm'],
//         'quantity' => $sale_detail_data['quantity'],
//         'product_type' => $sale_detail_data['product_type'],
//         'total' => -$sale_detail_data['total'], // Negative for sale (debit)
//         'old_product_balance' => $current_balance, // Storing the old balance here
//         'product_balance' => $new_balance,
//         'time_in' => $sale_detail_data['time_in'],
//         'time_out' => $sale_detail_data['time_out']
//     ];
//     $this->db->insert('transaction_details', $transaction_data);

//     return true;
// }





}
?>