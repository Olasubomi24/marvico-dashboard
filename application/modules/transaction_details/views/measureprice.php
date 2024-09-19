<div class="pc-container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-left">
                        <h4 class="mb-3 f-w-600"><span style="color: #000080;">Product Form</span></h4>
                        <p class="text-muted mb-4">Add or Edit Product</p>
                    </div>
                    <div class="">
                        <?php echo form_open_multipart('dashboard/save_product'); ?>
                        
                        <!-- Product Description -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="product_description_id">Product Description</label>
                            <select class="form-control" name="product_description_id" id="product_description_id">
                                <option>Select Description:</option>
                                <?php foreach($network_result as $row): ?>
                                    <option value="<?php echo $row['Product_Description_id']; ?>" 
                                        <?php echo (isset($product_data['product_description_id']) && $product_data['product_description_id'] == $row['Product_Description_id']) ? 'selected' : ''; ?>>
                                        <?php echo $row['Product_Description_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Product -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="product_id">Products</label>
                            <select class="form-control" name="product_id" id="product_id">
                                <option>Select Product:</option>
                                <?php foreach($rev_nets as $row): ?>
                                    <option value="<?php echo $row['Product_id']; ?>" 
                                        <?php echo (isset($product_data['product_id']) && $product_data['product_id'] == $row['Product_id']) ? 'selected' : ''; ?>>
                                        <?php echo $row['Product_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Package -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="package_id">Package</label>
                            <select class="form-control" name="package_id" id="package_id">
                                <option>Select Package:</option>
                                <?php foreach($rev_net as $row): ?>
                                    <option value="<?php echo $row['package_id']; ?>" 
                                        <?php echo (isset($product_data['package_id']) && $product_data['package_id'] == $row['package_id']) ? 'selected' : ''; ?>>
                                        <?php echo $row['package_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Measurement -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="measurement">Measurement</label>
                            <input type="text" class="form-control" placeholder="Measurement" name="measurement"
                                value="<?php echo isset($product_data['measurement']) ? $product_data['measurement'] : ''; ?>" required>
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="price">Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price" 
                                value="<?php echo isset($product_data['price']) ? $product_data['price'] : ''; ?>" required>
                        </div>

                        <!-- Product Image -->
                        <div class="form-group mb-3">
                            <label class="floating-label" for="product_image">Product Image</label>
                            <input type="file" class="form-control" name="product_image">
                            <?php if(isset($product_data['product_image'])): ?>
                                <img src="<?php echo base_url('uploads/products/' . $product_data['product_image']); ?>" width="100" class="mt-2">
                            <?php endif; ?>
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
