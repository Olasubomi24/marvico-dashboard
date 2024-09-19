<div class="pc-container">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ 7day transaction ] end -->
    <div class="pcoded-content">

        <p class="fw-bold">Last 7 days MTN transactions<?php // echo $i?>. <?php //echo $data['local_name']?></p>
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- visitors  start -->
            <div class="col-md-6 col-lg-3">
                <?php foreach($subscribtion_mtn_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Subscription</h5>
                        <span class="d-block  f-20">Total number of subscription: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-warning border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($renewal_mtn_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Renewal</h5>
                        <span class="d-block  f-20">Total number of renewal: &#8358; <?php  echo $data['TotalRevenue']?><span>                              
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-warning border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($churn_mtn_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Churn</h5>
                        <span class="d-block  f-20">Total number of churn: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-warning border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($total_revenue_mtn_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Total Revenue</h5>
                        <span class="d-block  f-20">Total revenue generated: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-warning border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <!-- [ 7day transaction ] end -->
    <div class="pcoded-content">

        <p class="fw-bold">Last 7 days AIRTEL transactions<?php // echo $i?>. <?php //echo $data['local_name']?></p>
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- visitors  start -->
            <div class="col-md-6 col-lg-3">
                <?php foreach($subscribtion_airtel_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Subscription</h5>
                        <span class="d-block  f-20">Total number of subscription: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                
                                <div class="progress">
                                    <div class="progress-bar bg-danger" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-danger border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($renewal_airtel_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Renewal</h5>
                        <span class="d-block  f-20">Total number of renewal: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-danger border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($churn_airtel_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Churn</h5>
                        <span class="d-block  f-20">Total number of churn: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-danger border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($total_revenue_airtel_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Total Revenue</h5>
                        <span class="d-block  f-20">Total revenue generated: &#8358; <?php  echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-danger border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
    <!-- [ year transaction ] end -->
    <div class="pcoded-content">

        <p class="fw-bold">Last 7 days GLO transactions<?php // echo $i?>. <?php //echo $data['local_name']?></p>
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- visitors  start -->
            <div class="col-md-6 col-lg-3">
                <?php foreach($subscribtion_glo_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Subscription</h5>
                        <span class="d-block  f-20">Total number of subscription:
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-success border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($renewal_glo_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Renewal</h5>
                        <span class="d-block  f-20">otal number of renewal:
                            <?php echo $data['TotalRevenue']?><span>

                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-success border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($churn_glo_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Churn</h5>
                        <span class="d-block f-20">Total number of Churn:
                            <?php echo $data['TotalRevenue']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-success border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6 col-lg-3">
                <?php foreach($total_revenue_glo_seven_day_data as $data){?>
                <div class="card statustic-card">
                    <div class="card-body text-center">
                        <h5 class="text-left">Total Revenue</h5>
                        <span class="d-block  f-20">Total revenue generated :
                            <?php echo $data['TransactionCount']?><span>
                                <div class="progress">
                                    <div class="progress-bar bg-success" style="width:85%"></div>
                                </div>
                    </div>
                    <div class="card-footer bg-success border-0">
                        <h6 class="text-white m-b-0"></h6>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>



    <style>
    .hhh {
        color: #1b856a;
    }

    .bg-hhh {
        background-color: #1b856a;
    }
    </style>