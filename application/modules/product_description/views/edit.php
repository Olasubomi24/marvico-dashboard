<!-- application/views/product_description/edit.php -->
<div class="pc-container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Product</h4>
                                        <td><?php echo $product->Product_Description_name; ?></td>
            <?php echo form_open('product_description/update_product/'.$product->Product_Description_id); ?>
                     
            <div class="form-group">
                <label for="measurement">Product Description</label>
                <input type="text" class="form-control" name="Product_Description_name" value="<?php echo set_value('Product_Description_name', $product->Product_Description_name); ?>">
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
            window.location.href = "<?php echo site_url('product_description/index'); ?>";
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