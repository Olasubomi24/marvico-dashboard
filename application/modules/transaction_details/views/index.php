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
    <!-- [ breadcrumb ] end -->

    <!-- <?php // echo form_open('dashboard/index'); ?>
    <div class="row">
        <div class="col-md-6 col-sm-4">
            <div class="form-group">
                <label class="floating-label" for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-4">
            <div class="form-group">
                <label class="floating-label" for="inserted">Date</label>
                <input type="date" name="inserted" id="inserted" class="form-control">
            </div>
        </div>

        <div class="col-md-6 col-sm-4">
            <div class="form-group">
                <label class="floating-label" for="inserted_end">End Date</label>
                <input type="date" name="inserted_end" id="inserted_end" class="form-control">
            </div>
        </div>
    </div>
    <button class="btn mb-3" style="background-color: #1b856a; color:#fff;" type="submit" name="submit">Submit</button>
    <?php  // echo form_close(); ?> -->

    <div class="row">
        <!-- [ form-element ] start -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Transaction</strong>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="example" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>USER ID</th>
                                    <th>EMAIL</th>
                                    <th>PHONE NUMBER</th>
                                    <th>REGISTER NAME</th>
                                    <th>SENDER NAME</th>
                                    <th>PAID AMOUNT</th>
                                    <th>TRANSACTION REFERENCE</th>
                                    <th>PAYMENT STATUS</th>
                                    <th>SUB TOTAL</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th>PAYMENT DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($rev_net as $product): ?>
                                <tr onclick="window.location='<?php //echo site_url('agent/transaction')?>'">
                                    <td><?php echo !empty($product['user_id']) ? $product['user_id'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['email']) ? $product['email'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['phonenumber']) ? $product['phonenumber'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['register_name']) ? $product['register_name'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['sender_name']) ? $product['sender_name'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['paid_amount']) ? $product['paid_amount'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['tran_reference']) ? $product['tran_reference'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['payment_status']) ? $product['payment_status'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['subtotal']) ? $product['subtotal'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['total_amount']) ? $product['total_amount'] : 'N/A'; ?></td>
                                    <td><?php echo !empty($product['payment_dt']) ? $product['payment_dt'] : 'N/A'; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
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
