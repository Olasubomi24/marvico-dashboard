<?php
class Package extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->library('session');
        $this->load->module('utility');
        $this->load->library('upload');
       
    }

public function index() {
    $products = $this->utility->get_all_package();

   // print_r($products); die;
    $data = array(
        'title' => 'Product List',
        'content_view' => 'package/index',
        'products' => $products
    );

    $this->template->general_template2($data);
}



        
   
    public function measureprice(){

            $data = array(
                'title' => 'product',
                'content_view' => 'package/measureprice'
               
            );
            $this->template->general_template2($data);
        
  }

  public function save_product() {
    $product_data = array(
        'package_name' => $this->input->post('package_name'),
    );
    $package_id = $this->input->post('package_id');

    if ( $package_id) {
        // Update product
        $this->utility->update_packages( $package_id, $product_data);
        $this->session->set_flashdata('success', 'Package Description  updated successfully!');
    } else {
        // Insert new product
        $this->utility->insert_packages($product_data);
        $this->session->set_flashdata('success', 'Package Description added successfully!');
    }

    redirect('package/index'); // Ensure this route is correct
}


public function edit($package_id) {
    $product = $this->utility->get_packages_by_id($package_id);
    if (!$product) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Product',
        'content_view' => 'package/edit',
        'product' => $product
    );
    $this->template->general_template2($data);
}

public function update_product($package_id) {
    $product_data = array(
        'package_name' => $this->input->post('package_name')
    );



    if ($this->utility->update_packages($package_id, $product_data)) {
        $this->session->set_flashdata('success', 'Package updated successfully!');
        redirect('package/index'); // Redirect to the product if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update package.');
        redirect('package/edit/' . $package_id); // Redirect back to the edit page if update fails
    }
}

public function delete($package_id) {
    $this->utility->deletepackages($package_id);
    $this->session->set_flashdata('success', 'Package deleted successfully!');
    redirect('package/index');
}




    
}
