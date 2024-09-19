<!-- application/views/dashboard/edit.php -->
<div class="pc-container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Product</h4>
            <?php echo form_open_multipart('dashboard/update_product/'.$product->id); ?>
            
            <div class="form-group">
                <label for="product_description_id">Product Description</label>
                <select class="form-control" name="product_description_id" id="product_description_id" disabled>
                    <?php foreach($network_result as $row) {
                        echo '<option value="'.$row['Product_Description_id'].'"'.($row['Product_Description_id'] == $product->product_description_id ? ' selected' : '').'>'.$row['Product_Description_name'].'</option>'; 
                    } ?>
                </select>
                <input type="hidden" name="product_description_id" value="<?php echo $product->product_description_id; ?>">
            </div>
            
            <div class="form-group">
                <label for="package_id">Package</label>
                <select class="form-control" name="package_id" id="package_id" disabled>
                    <?php foreach($rev_net as $row) {
                        echo '<option value="'.$row['package_id'].'"'.($row['package_id'] == $product->package_id ? ' selected' : '').'>'.$row['package_name'].'</option>'; 
                    } ?>
                </select>
                <input type="hidden" name="package_id" value="<?php echo $product->package_id; ?>">
            </div>
            
            <div class="form-group">
                <label for="product_id">Product</label>
                <select class="form-control" name="product_id" id="product_id" disabled>
                    <?php foreach($rev_nets as $row) {
                        echo '<option value="'.$row['Product_id'].'"'.($row['Product_id'] == $product->product_id ? ' selected' : '').'>'.$row['Product_name'].'</option>'; 
                    } ?>
                </select>
                <input type="hidden" name="product_id" value="<?php echo $product->product_id; ?>">
            </div>
            
            <div class="form-group">
                <label for="measurement">Measurement</label>
                <input type="text" class="form-control" name="measurement" value="<?php echo set_value('measurement', $product->measurement); ?>">
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" name="price" value="<?php echo set_value('price', $product->price); ?>">
            </div>
            
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control-file" name="product_image">
                <?php if ($product->product_image): ?>
                    <img src="<?php echo base_url('uploads/'.$product->product_image); ?>" alt="Product Image" width="100">
                <?php endif; ?>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Product</button>
            
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert for showing success or error messages -->
<script type="text/javascript">
    <?php if($this->session->flashdata('success')): ?>
        Swal.fire({
            title: 'Success!',
            text: "<?php echo $this->session->flashdata('success'); ?>",
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = "<?php echo site_url('dashboard/index'); ?>";
        });
    <?php elseif($this->session->flashdata('error')): ?>
        Swal.fire({
            title: 'Error!',
            text: "<?php echo $this->session->flashdata('error'); ?>",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    <?php endif; ?>
</script>