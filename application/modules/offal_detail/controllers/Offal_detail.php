<?php
class Offal_detail extends MX_Controller
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
                'title' => 'Edit offal Detail',
                'content_view' => 'offal_detail/measureprice'
               
            );
            $this->template->general_template2($data);
        
    }
  public function update_offal_detail($id) {
    // Get values from form input
    $killogramm = $this->input->post('killogramm');
    $quantity = $this->input->post('quantity');
    
    $offal_detail_data = array(
        'offal_detail_name' => $this->input->post('offal_detail_name'),
        'killogramm' => $killogramm,
        'quantity' => $quantity,
        'product_type' => $this->input->post('product_type'),
        'total' => $killogramm * $quantity, // Calculate total dynamically
        'time_out' => date('Y-m-d H:i:s'),
    );

    if ($this->utility->update_offal_detail($id, $offal_detail_data)) {
        $this->session->set_flashdata('success', 'offal detail updated successfully!');
        redirect('offal_detail/index'); // Redirect to the offal_detail index if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update offal detail.');
        redirect('offal_detail/edit/' . $id); // Redirect back to the edit page if update fails
    }
}


public function index() {
    $offal_details = $this->utility->get_all_offal_detail();

    $data = array(
        'title' => 'offal Detail',
        'content_view' => 'offal_detail/index',
        'offal_details' => $offal_details
    );

    $this->template->general_template2($data);
}

public function save_offal_detail() {
    $offal_detail_data = array(
        'offal_detail_name' => $this->input->post('offal_detail_name'),
        'killogramm' => $this->input->post('killogramm'),
        'quantity' => $this->input->post('quantity'),
        'piece' => $this->input->post('piece'),
        'product_type' => $this->input->post('product_type'),
        'product_part' => $this->input->post('product_part'),
        'total' => $this->input->post('killogramm') * $this->input->post('quantity'),
        'time_in' => date('Y-m-d H:i:s')
    );

    $offal_detail_id = $this->input->post('id');

    if ($offal_detail_id) {
        // Update existing offal detail
        $offal_detail_data['time_out'] = date('Y-m-d H:i:s');
        $this->utility->update_offal_detail($offal_detail_id, $offal_detail_data);
        $this->session->set_flashdata('success', 'offal detail updated successfully!');
    } else {
        // Insert new offal detail
        $this->utility->insert_offal_detail($offal_detail_data);
        $this->session->set_flashdata('success', 'offal detail added successfully!');
    }

    redirect('offal_detail/index');
}

public function edit($id) {
    $offal_detail = $this->utility->get_offal_detail_by_id($id);
    if (!$offal_detail) {
        show_404();
    }

    $data = array(
        'title' => 'Edit offal Detail',
        'content_view' => 'offal_detail/edit',
        'offal_detail_data' => $offal_detail
    );

    $this->template->general_template2($data);
}

public function delete($id) {
    $this->utility->delete_offal_detail($id);
    $this->session->set_flashdata('success', 'offal detail deleted successfully!');
    redirect('offal_detail/index');
}




    
}
