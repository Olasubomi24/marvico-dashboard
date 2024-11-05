<?php
class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->library('session');
        $this->load->module('utility');
        $this->load->library('upload');
       
    }


    // Function to format date
function formatDate($date) {
    $dateObject = new DateTime($date);
    return $dateObject->format('m/d/Y');
}

public function index() {
    $products = $this->utility->get_all_products();

    $data = array(
        'title' => 'Product List',
        'content_view' => 'dashboard/index',
        'products' => $products
    );

    $this->template->general_template2($data);
}


    public function user_account()
    {

        $data = array(
            'content_view' => 'dashboard/user_account.php',
            'title' => 'Create User',
        );

        $this->template->auth_template($data);
    }
        
    // total_revenue_airtel_seven_day_data   subscribtion_airtel_seven_day_data  churn_airtel_seven_day_data  renewal_airtel_seven_day_data
    public function dash()
    {
    $results =  $this ->utility->network_data() ;
    // $airtel_seven_day_data = $this ->utility -> airtel_seven_day_data();
    // $mtn_seven_day_data = $this ->utility -> mtn_seven_day_data();
    // $glo_seven_day_data = $this ->utility -> glo_seven_day_data();
    // $airtel_onemonth_data = $this ->utility -> airtel_onemonth_data();
    // $mtn_onemonth_data = $this ->utility -> mtn_onemonth_data();
    // $glo_onemonth_data = $this ->utility -> glo_onemonth_data();
    // $airtel_year_data = $this ->utility -> airtel_year_data();
    // $mtn_year_data = $this ->utility -> mtn_year_data();
    // $glo_year_data = $this ->utility -> glo_year_data();

    $total_revenue_airtel_seven_day_data = $this ->utility -> total_revenue_airtel_seven_day_data();
    $subscribtion_airtel_seven_day_data = $this ->utility -> subscribtion_airtel_seven_day_data();
    $churn_airtel_seven_day_data = $this ->utility -> churn_airtel_seven_day_data();
    $renewal_airtel_seven_day_data = $this ->utility -> renewal_airtel_seven_day_data();
    $renewal_mtn_seven_day_data = $this ->utility -> renewal_mtn_seven_day_data();
    $total_revenue_mtn_seven_day_data = $this ->utility -> total_revenue_mtn_seven_day_data();
    $subscribtion_mtn_seven_day_data = $this ->utility -> subscribtion_mtn_seven_day_data();
    $churn_mtn_seven_day_data = $this ->utility -> churn_mtn_seven_day_data();
    $total_revenue_glo_seven_day_data = $this ->utility -> total_revenue_glo_seven_day_data();
    $subscribtion_glo_seven_day_data = $this ->utility -> subscribtion_glo_seven_day_data();
    $churn_glo_seven_day_data = $this ->utility -> churn_glo_seven_day_data();
    $renewal_glo_seven_day_data = $this ->utility -> renewal_glo_seven_day_data();

    //$rev_net = $this ->utility -> rev_data();airtel_year_data
     

        $data = array(
            'title' => 'Dashboard',
            'content_view' => 'dashboard/index2',
            'network_result' => $results['result'],
            // 'airtel_seven_day_data' => $airtel_seven_day_data['result'],
            // 'mtn_seven_day_data' => $mtn_seven_day_data['result'],
            // 'glo_seven_day_data' => $glo_seven_day_data['result'],
            // 'airtel_month_to_date_data' => $airtel_onemonth_data['result'],
            // 'mtn_month_to_date_data' => $mtn_onemonth_data['result'],
            // 'glo_month_to_date_data' => $glo_onemonth_data['result'],
            'total_revenue_airtel_seven_day_data' => $total_revenue_airtel_seven_day_data['result'],
            'subscribtion_airtel_seven_day_data' => $subscribtion_airtel_seven_day_data['result'],
            'churn_airtel_seven_day_data' => $churn_airtel_seven_day_data['result'],
            'renewal_airtel_seven_day_data' => $renewal_airtel_seven_day_data['result'],
            'renewal_mtn_seven_day_data' => $renewal_mtn_seven_day_data['result'],
            'total_revenue_mtn_seven_day_data' => $total_revenue_mtn_seven_day_data['result'],
            'subscribtion_mtn_seven_day_data' => $subscribtion_mtn_seven_day_data['result'],
            'churn_mtn_seven_day_data' => $churn_mtn_seven_day_data['result'],
            'total_revenue_glo_seven_day_data' => $total_revenue_glo_seven_day_data['result'],
            'subscribtion_glo_seven_day_data' => $subscribtion_glo_seven_day_data['result'],
            'churn_glo_seven_day_data' => $churn_glo_seven_day_data['result'],
            'renewal_glo_seven_day_data' => $renewal_glo_seven_day_data['result']
        );
        // Load the general template and pass in the data
        $this->template->general_template2($data);
    }

    
    public function measureprice(){
        $results = $this->utility->product_des();
        $rev_net = $this ->utility -> product();
        $rev_nets = $this ->utility -> packages();
            $data = array(
                'title' => 'Dashboard',
                'content_view' => 'dashboard/measureprice',
                'network_result' => $results['result'],
                'rev_nets' => $rev_net['result'],
                'rev_net' => $rev_nets['result'],
               
            );
            $this->template->general_template2($data);
        
  }

  public function save_product() {
    $product_data = array(
        'product_description_id' => $this->input->post('product_description_id'),
        'package_id' => $this->input->post('package_id'),
        'product_id' => $this->input->post('product_id'),
        'measurement' => $this->input->post('measurement'),
        'price' => $this->input->post('price')
    );

    $upload_path ='assets/img/product/';
    // Create the directory if it does not exist
    if (!is_dir($upload_path)) {
        mkdir($upload_path, 0755, true); // 0755 permissions, true to create nested directories
    }

    if (!empty($_FILES['product_image']['name'])) {
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = str_replace(" ", "_", $_FILES['product_image']['name']); // Replace spaces with underscores
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('product_image')) {
            $upload_data = $this->upload->data();
            $product_data['product_image'] = $upload_data['file_name'];
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('dashboard/measureprice');
            return;
        }
    }

    $product_id = $this->input->post('id');

    if ($product_id) {
        // Update product
        $this->utility->update_product($product_id, $product_data);
        $this->session->set_flashdata('success', 'Product updated successfully!');
    } else {
        // Insert new product
        $this->utility->insert_product($product_data);
        $this->session->set_flashdata('success', 'Product added successfully!');
    }

    redirect('dashboard/index'); // Ensure this route is correct
}


public function edit($id) {
    $rev_net = $this->utility->product();
    $rev_nets = $this->utility->packages();
    $results = $this->utility->product_des();
    $product = $this->utility->get_product_by_id($id);
    if (!$product) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Product',
        'content_view' => 'dashboard/edit',
        'product' => $product,
        'network_result' => $results['result'],
        'rev_nets' => $rev_net['result'],
        'rev_net' => $rev_nets['result'],
    );
    $this->template->general_template2($data);
}

public function update_product($id) {
    $product_data = array(
        'measurement' => $this->input->post('measurement'),
        'price' => $this->input->post('price'),
    );

    // Handle image upload if a new image is provided
    if (!empty($_FILES['product_image']['name'])) {
        $upload_path = 'assets/img/product/';
        // Check if the directory exists and create it if it doesn't
        if (!is_dir($upload_path)) {
            if (!mkdir($upload_path, 0755, true)) {
                $this->session->set_flashdata('error', 'Failed to create upload directory.');
                redirect('dashboard/edit/' . $id);
                return;
            }
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = str_replace(" ", "_", $_FILES['product_image']['name']); // Replace spaces with underscores
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('product_image')) {
            $uploadData = $this->upload->data();
            $product_data['product_image'] = $uploadData['file_name']; // Assign the file name to 'product_image' key
               
        } else {
            $data['upload_error'] = $this->upload->display_errors();
            echo 'ddd'; die;
            $this->session->set_flashdata('error', 'Failed to upload image: ' . $data['upload_error']);
            redirect('dashboard/edit/' . $id); // Redirect back to the edit page if image upload fails
            return;
        }
    }

    if ($this->utility->update_product($id, $product_data)) {
        $this->session->set_flashdata('success', 'Product updated successfully!');
        redirect('dashboard/index'); // Redirect to the dashboard if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update product.');
        redirect('dashboard/edit/' . $id); // Redirect back to the edit page if update fails
    }
}

public function delete($id) {
    $this->utility->delete_product($id);
    $this->session->set_flashdata('success', 'Product deleted successfully!');
    redirect('dashboard/index');
}

  public function user_creation()
  {
      $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
      $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if ($this->form_validation->run() == false) {
          $this->index();
      } else {
        
          $firstname = $this->input->post('firstname');
          $lastname = $this->input->post('lastname');
          $email = $this->input->post('email');
          $password = md5($this->input->post('password'));
          $data = $this->utility->is_email_exist($email);
          if ($data['status_code'] == 0) {
          $send_data = $this->utility->user_creation( $firstname,$lastname,$email, $password);

          if ($send_data['status_code'] == 0) {
              $this->session->set_flashdata('success', 'Account Create successfully');
              return redirect('dashboard/index');
          } else {
              $this->session->set_flashdata('error', 'Operation failed');
              return redirect('dashboard/user_account');
          }
        }else {
            $this->session->set_flashdata('error', $data['message']);
            return redirect('dashboard/user_account');
        }
      }
   
  }



    
}
