<div class="pc-container">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-header-title">
                        <h5 class="m-b-10">product</h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
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
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($products)) : ?>
                                    <?php foreach ($products as $product) : ?>
                                    <tr>
                                        <td><?php echo $product->Product_Id; ?></td>
                                        <td><?php echo $product->Product_name; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('product/edit/' . $product->Product_Id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('product/delete/' . $product->Product_Id); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
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