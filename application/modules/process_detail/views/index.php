<div class="pc-container">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Productions Details</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Production Detail List</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Kilogram</th>
                                        <th>Quantity</th>
                                        <th>Product Type</th>
                                        <th>Total</th>
                                        <th>Previous Product Balance</th>
                                        <th>Current Product Balance</th>
                                       
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($process_details)) : ?>
                                        <?php foreach ($process_details as $process_detail) : ?>
                                            <tr onclick="window.location='<?php echo site_url('process_detail/measureprice')?>'">
                                                <td><?php echo $process_detail->id; ?></td>
                                                <td><?php echo $process_detail->process_detail_name; ?></td>
                                                <td><?php echo $process_detail->killogramm; ?></td>
                                                <td><?php echo $process_detail->quantity; ?></td>
                                                <td><?php echo $process_detail->product_type; ?></td>
                                                <td><?php echo $process_detail->total; ?></td>
                                                <td><?php echo $process_detail->old_product_balance; ?></td>
                                                <td><?php echo $process_detail->product_balance; ?></td>
                                            
                                                <td><?php echo $process_detail->time_in; ?></td>
                                                <td><?php echo $process_detail->time_out; ?></td>
                                                <!-- <td>
                                                    <a href="<?php //echo base_url('process_detail/edit/' . $process_detail->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php //echo base_url('process_detail/delete/' . $process_detail->id); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td> -->
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="8">No process details available</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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