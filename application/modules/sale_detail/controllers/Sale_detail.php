<?php
class Sale_detail extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->library('session');
        $this->load->module('utility');
        $this->load->library('upload');
       
    }


   public function measureprice(){
       
            $data = array(
                'title' => 'Edit Process Detail',
                'content_view' => 'sale_detail/measureprice'
               
            );
            $this->template->general_template2($data);
        
    }
  public function update_sale_detail($id) {
    // Get values from form input
    $killogramm = $this->input->post('killogramm');
    $quantity = $this->input->post('quantity');
    
    $sale_detail_data = array(
        'killogramm' => $killogramm,
        'quantity' => $quantity,
        'product_type' => $this->input->post('product_type'),
        'total' => $killogramm * $quantity, // Calculate total dynamically
        'time_out' => date('Y-m-d H:i:s'),
    );

    if ($this->utility->update_sale_detail($id, $sale_detail_data)) {
        $this->session->set_flashdata('success', 'Process detail updated successfully!');
        redirect('sale_detail/index'); // Redirect to the sale_detail index if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update process detail.');
        redirect('sale_detail/edit/' . $id); // Redirect back to the edit page if update fails
    }
}


public function index() {
    $sale_details = $this->utility->get_all_sale_detail();

    $data = array(
        'title' => 'Process Detail',
        'content_view' => 'sale_detail/index',
        'sale_details' => $sale_details
    );

    $this->template->general_template2($data);
}

public function save_sale_detail() {
    $sale_detail_data = array(
        'sale_person' => $this->input->post('sale_person'),
        'recipient' => $this->input->post('recipient'),
        'killogramm' => $this->input->post('killogramm'),
        'quantity' => $this->input->post('quantity'),
        'product_type' => $this->input->post('product_type'),
        'location' => $this->input->post('location'),
        'total' => $this->input->post('killogramm') * $this->input->post('quantity'),
        'time_in' => date('Y-m-d H:i:s')
    );

    $sale_detail_id = $this->input->post('id');

    if ($sale_detail_id) {
        // Update existing process detail
        $sale_detail_data['time_out'] = date('Y-m-d H:i:s');
        $this->utility->update_sale_detail($sale_detail_id, $sale_detail_data);
        $this->session->set_flashdata('success', 'Process detail updated successfully!');
    } else {
        // Insert new process detail
        $result = $this->utility->insert_sale_detail($sale_detail_data);
        
        if (is_string($result)) {
            // If result is a string, it contains an error message
            $this->session->set_flashdata('error', $result);
        } else {
            // If result is true, insertion was successful
            $this->session->set_flashdata('success', 'Process detail added successfully!');
        }
    }

    redirect('sale_detail/index');
}


public function edit($id) {
    $sale_detail = $this->utility->get_sale_detail_by_id($id);
    if (!$sale_detail) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Process Detail',
        'content_view' => 'sale_detail/edit',
        'sale_detail_data' => $sale_detail
    );

    $this->template->general_template2($data);
}

public function delete($id) {
    $this->utility->delete_sale_detail($id);
    $this->session->set_flashdata('success', 'Process detail deleted successfully!');
    redirect('sale_detail/index');
}




    
}
