<?php
class Transaction_details extends MX_Controller
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
        'content_view' => 'transaction_details/index',
        'products' => $products
    );

    $this->template->general_template2($data);
}



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
            'title' => 'transaction_details',
            'content_view' => 'transaction_details/index2',
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

    
    public function transaction(){
        $rev_nets = $this ->utility -> packages();
            $data = array(
                'title' => 'transaction_details',
                'content_view' => 'transaction_details/index',
                'rev_net' => $rev_nets['result'],
               
            );
            $this->template->general_template2($data);
        
  }



    
}
