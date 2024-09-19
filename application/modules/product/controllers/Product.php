<?php
class Product extends MX_Controller
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
    $products = $this->utility->get_all_product();

   // print_r($products); die;
    $data = array(
        'title' => 'Product List',
        'content_view' => 'product/index',
        'products' => $products
    );

    $this->template->general_template2($data);
}



        
   
    public function measureprice(){

            $data = array(
                'title' => 'product',
                'content_view' => 'product/measureprice'
               
            );
            $this->template->general_template2($data);
        
  }

  public function save_product() {
    $product_data = array(
        'Product_name' => $this->input->post('Product_name'),
    );

    $Product_Id = $this->input->post('Product_Id');

    if ( $Product_Id) {
        // Update product
        $this->utility->update_products( $Product_Id, $product_data);
        $this->session->set_flashdata('success', 'Product Description  updated successfully!');
    } else {
        // Insert new product
        $this->utility->insert_products($product_data);
        $this->session->set_flashdata('success', 'Product Description added successfully!');
    }

    redirect('product/index'); // Ensure this route is correct
}


public function edit($Product_Id) {
    $product = $this->utility->get_products_by_id($Product_Id);
    if (!$product) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Product',
        'content_view' => 'product/edit',
        'product' => $product
    );
    $this->template->general_template2($data);
}

public function update_product($Product_Id) {
    $product_data = array(
        'Product_name' => $this->input->post('Product_name')
    );



    if ($this->utility->update_products($Product_Id, $product_data)) {
        $this->session->set_flashdata('success', 'Product updated successfully!');
        redirect('product/index'); // Redirect to the product if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update product.');
        redirect('product/edit/' . $Product_Id); // Redirect back to the edit page if update fails
    }
}

public function delete($Product_Id) {
    $this->utility->deleteProduct($Product_Id);
    $this->session->set_flashdata('success', 'Product deleted successfully!');
    redirect('product/index');
}




    
}
