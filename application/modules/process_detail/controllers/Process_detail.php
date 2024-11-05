<?php
class Process_detail extends MX_Controller
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
                'content_view' => 'process_detail/measureprice'
               
            );
            $this->template->general_template2($data);
        
    }
  public function update_process_detail($id) {
    // Get values from form input
    $killogramm = $this->input->post('killogramm');
    $quantity = $this->input->post('quantity');
    
    $process_detail_data = array(
        'killogramm' => $killogramm,
        'quantity' => $quantity,
        'product_type' => $this->input->post('product_type'),
        'total' => $killogramm * $quantity, // Calculate total dynamically
        'time_out' => date('Y-m-d H:i:s'),
    );

    if ($this->utility->update_process_detail($id, $process_detail_data)) {
        $this->session->set_flashdata('success', 'Process detail updated successfully!');
        redirect('process_detail/index'); // Redirect to the process_detail index if update is successful
    } else {
        $this->session->set_flashdata('error', 'Failed to update process detail.');
        redirect('process_detail/edit/' . $id); // Redirect back to the edit page if update fails
    }
}


public function index() {
    $process_details = $this->utility->get_all_process_detail();

    $data = array(
        'title' => 'Process Detail',
        'content_view' => 'process_detail/index',
        'process_details' => $process_details
    );

    $this->template->general_template2($data);
}

public function save_process_detail() {
    $process_detail_data = array(
        'process_detail_name' => $this->input->post('process_detail_name'),
        'killogramm' => $this->input->post('killogramm'),
        'quantity' => $this->input->post('quantity'),
        'product_type' => $this->input->post('product_type'),
        'total' => $this->input->post('killogramm') * $this->input->post('quantity'),
        'time_in' => date('Y-m-d H:i:s')
    );

    $process_detail_id = $this->input->post('id');

    if ($process_detail_id) {
        // Update existing process detail
        $process_detail_data['time_out'] = date('Y-m-d H:i:s');
        $this->utility->update_process_detail($process_detail_id, $process_detail_data);
        $this->session->set_flashdata('success', 'Process detail updated successfully!');
    } else {
        // Insert new process detail
        $this->utility->insert_process_detail($process_detail_data);
        $this->session->set_flashdata('success', 'Process detail added successfully!');
    }

    redirect('process_detail/index');
}

public function edit($id) {
    $process_detail = $this->utility->get_process_detail_by_id($id);
    if (!$process_detail) {
        show_404();
    }

    $data = array(
        'title' => 'Edit Process Detail',
        'content_view' => 'process_detail/edit',
        'process_detail_data' => $process_detail
    );

    $this->template->general_template2($data);
}

public function delete($id) {
    $this->utility->delete_process_detail($id);
    $this->session->set_flashdata('success', 'Process detail deleted successfully!');
    redirect('process_detail/index');
}




    
}
