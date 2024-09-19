<?php
class Product_description extends MX_Controller
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
    $products = $this->utility->get_all_product_description();
    $data = array(
        'title' => 'Product List',
        'content_view' => 'product_description/index',
        'products' => $products
    );

    $this->template->general_template2($data);
}



        
   
    public function measureprice(){

            $data = array(
                'title' => 'product_description',
                'content_view' => 'product_description/measureprice'
               
            );
            $this->template->general_template2($data);
        
  }

  public function save_product() {
    $product_data = array(
        'Product_Description_name' => $this->input->post('Product_Description_name'),
    );



    $Product_Description_id = $this->input->post('Product_Description_id');

    if ( $Product_Description_id) {
        // Update product
        $this->utility->update_product( $Product_Description_id, $product_data);
        $this->session->set_flashdata('success', 'Product Description  updated successfully!');
    } else {
        // Insert new product
        $this->utility->insert_product_description($product_data);
        $this->session->set_flashdata('success', 'Product Description added successfully!');
    }

    redirect('product_description/index'); // Ensure this route is correct
}


public function edit($Product_Description_id) {
    $product = $this->utility->get_product_description_by_id($Product_Description_id);
    if (!$product) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Product',
        'content_view' => 'product_description/edit',
        'product' => $product
    );
    $this->template->general_template2($data);
}

public function update_product($Product_Description_id) {
    $product_data = array(
        'Product_Description_name' => $this->input->post('Product_Description_name')
    );



    if ($this->utility->update_product_description($Product_Description_id, $product_data)) {
        $this->session->set_flashdata('success', 'Product updated successfully!');
        redirect('product_description/index'); // Redirect to the product_description if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update product.');
        redirect('product_description/edit/' . $Product_Description_id); // Redirect back to the edit page if update fails
    }
}

public function delete($Product_Description_id) {
    $this->utility->deleteProductDescription($Product_Description_id);
    $this->session->set_flashdata('success', 'Product deleted successfully!');
    redirect('product_description/index');
}




    
}
