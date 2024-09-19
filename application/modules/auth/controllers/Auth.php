<?php
class Auth extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('authmodel');
        $this->load->module('utility');

    }

    public function index()
    {

        $data = array(
            'content_view' => 'auth/login.php',
            'title' => 'LOGIN',
        );

        $this->template->auth_template($data);
    }

    public function reset_password()
    {

        $data = array(
            'content_view' => 'auth/reset_password.php',
            'title' => 'Reset password',
        );

        $this->template->auth_template($data);
    }

    
    public function user_account()
    {

        $data = array(
            'content_view' => 'auth/user_account.php',
            'title' => 'User  Account',
        );

        $this->template->auth_template($data);
    }

    public function create_account()
    {

        $data = array(
            'content_view' => 'auth/create_account.php',
            'title' => 'Create account',
        );

        $this->template->auth_template($data);
    }


    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $send_data = $this->utility->user_login($email, $password);

            if ($send_data['status_code'] == '0') {
                $customer_data = array(
                    'customer_email' => $send_data['user_details'][0]->email,
                    'customer_name' => $send_data['user_details'][0]->full_name,
                    'lastname' => $send_data['user_details'][0]->lastname,
                    'firstname' => $send_data['user_details'][0]->firstname
                );
                $this->session->set_userdata($customer_data);
                return redirect('dashboard/index');
            } else {
                $this->session->set_flashdata('error', 'Email or Password is not correct');
                $this->index();
            }
        }
    }

    public function reset_password_update()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $send_data = $this->utility->change_password($email, $password);

            if ($send_data['status_code'] == 0) {
                $this->session->set_flashdata('success', 'Password changed successfully');
                $this->index();
            } else {
                $this->session->set_flashdata('error', 'Operation failed');
                $this->reset_password();
            }
        }
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
            $send_data = $this->utility->user_creation( $firstname,$lastname,$email, $password);
 
            if ($send_data['status_code'] == 0) {
                $this->session->set_flashdata('success', 'Password changed successfully');
                $this->index();
            } else {
                $this->session->set_flashdata('error', 'Operation failed');
                $this->reset_password();
            }
        }
    }





    public function sign_out()
    {
        session_destroy();
        redirect('auth');
    }
}