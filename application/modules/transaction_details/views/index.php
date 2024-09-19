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
    user_id, email, phonenumber , product_items , register_name, paid_amount,tran_reference,trans_id,total_amount, payment_dt
    <div class="pcoded-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Product List</strong>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="example" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>ID<th>
                                        <th>EMAIL</th>
                                        <th>NUMBER</th>
                                        <th>ITEMS</th>
                                        <th>NAME</th>
                                        <th>AMOUNT</th>
                                        <th>REFERENCE</th>
                                        <th>TRANS ID</th>
                                        <th>TOTAL</th>
                                        <th>PAYMENT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products)) : ?>
                                    <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo $product->user_id; ?></td>
                                        <td><?php echo $product->email; ?></td>
                                        <td><?php echo $product->phonenumber; ?></td>
                                        <td><?php echo $product->product_items; ?></td>
                                        <td><?php echo $product->register_name; ?></td>
                                        <td><?php echo $product->paid_amount; ?></td>
                                        <td><?php echo $product->tran_reference;?></td>
                                        <td><?php echo $product->trans_id;?></td>
                                        <td><?php echo $product->total_amount;?></td>
                                        <td><?php echo $product->payment_dt;?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else : ?>
                                    <tr>
                                        <td colspan="8">No products available</td>
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