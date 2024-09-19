<div class="pc-container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-left">
                        <h4 class="mb-3 f-w-600"><span style="color: #000080;">Package Form</span></h4>
                        <p class="text-muted mb-4">Add or Edit Package</p>
                    </div>
                    <div class="">
                        <?php echo form_open('package/save_product'); ?>
                        <!-- Measurement -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="measurement">Package Name</label>
                            <input type="text" class="form-control" placeholder="Product Name" name="package_name"
                                value="<?php echo isset($product_data['package_name']) ? $product_data['package_name'] : ''; ?>" required>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group text-left my-2">
                            <button type="submit" class="btn text-white btn-block mt-2" style="background-color: #008000;">
                                <?php echo isset($product_data) ? 'Update Product' : 'Save Product'; ?>
                            </button>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if($this->session->flashdata('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '<?php echo $this->session->flashdata('success'); ?>',
            showConfirmButton: false,
            timer: 2000
        });
    <?php endif; ?>

    <?php if($this->session->flashdata('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?php echo $this->session->flashdata('error'); ?>',
            showConfirmButton: true
        });
    <?php endif; ?>
</script>
