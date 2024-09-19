<?php
Class Template extends MX_Controller
{

    public function __construct(){

        parent::__construct();
    }

    public function auth_template($data){
$this->load->view('auth_template', $data);
    }
public function general_template($data){
    $this->load->view('general_template', $data);
}

public function general_template2($data){
    $this->load->view('general_template2', $data);
}
public function general_template3($data){
    $this->load->view('general_template3', $data);
}

public function landing_template($data){
    $this->load->view('landing_template', $data);
}

public function errors($data){
    $this->load->view('errors', $data);
}



}
?>