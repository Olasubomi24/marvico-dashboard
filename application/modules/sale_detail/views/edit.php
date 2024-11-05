<div class="pc-container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Sale Detail</h4>
            <?php echo form_open("sale_detail/update_sale_detail/{$sale_detail_data->id}"); ?>

            <input type="hidden" name="id" value="<?php echo $sale_detail_data->id; ?>">

            <div class="form-group mb-3">
                <label for="sale_person">Sale Detail Name</label>
                <input type="text" class="form-control" name="sale_person" placeholder="Sale Person Name"
                    value="<?php echo isset($sale_detail_data->sale_person) ? $sale_detail_data->sale_person : ''; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="killogramm">Kilogram</label>
                <input type="text" class="form-control" name="killogramm" placeholder="Kilogram"
                    value="<?php echo isset($sale_detail_data->killogramm) ? $sale_detail_data->killogramm : ''; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity"
                    value="<?php echo isset($sale_detail_data->quantity) ? $sale_detail_data->quantity : ''; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="product_type">Product Type</label>
                <select class="form-control" name="product_type" required>
                    <!-- Chicken Options -->
                    <option value="Chicken"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken') ? 'selected' : ''; ?>>
                        Chicken</option>
                    <option value="Chicken Laps"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Laps') ? 'selected' : ''; ?>>
                        Chicken Laps</option>
                    <option value="Chicken Head"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Head') ? 'selected' : ''; ?>>
                        Chicken Head</option>
                    <option value="Chicken Foot"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Foot') ? 'selected' : ''; ?>>
                        Chicken Foot</option>
                    <option value="Chicken Wings"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Wings') ? 'selected' : ''; ?>>
                        Chicken Wings</option>
                    <option value="Chicken Gizzard"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Gizzard') ? 'selected' : ''; ?>>
                        Chicken Gizzard</option>
                    <option value="Chicken Neck"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Neck') ? 'selected' : ''; ?>>
                        Chicken Neck</option>
                    <option value="Chicken Liver"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Chicken Liver') ? 'selected' : ''; ?>>
                        Chicken Liver</option>

                    <!-- Turkey Options -->
                    <option value="Turkey"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey') ? 'selected' : ''; ?>>
                        Turkey</option>
                    <option value="Turkey Laps"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Laps') ? 'selected' : ''; ?>>
                        Turkey Laps</option>
                    <option value="Turkey Head"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Head') ? 'selected' : ''; ?>>
                        Turkey Head</option>
                    <option value="Turkey Foot"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Foot') ? 'selected' : ''; ?>>
                        Turkey Foot</option>
                    <option value="Turkey Wings"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Wings') ? 'selected' : ''; ?>>
                        Turkey Wings</option>
                    <option value="Turkey Gizzard"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Gizzard') ? 'selected' : ''; ?>>
                        Turkey Gizzard</option>
                    <option value="Turkey Neck"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Neck') ? 'selected' : ''; ?>>
                        Turkey Neck</option>
                    <option value="Turkey Liver"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Turkey Liver') ? 'selected' : ''; ?>>
                        Turkey Liver</option>

                    <!-- Fish Option -->
                    <option value="Fish"
                        <?php echo (isset($sale_detail_data->product_type) && $sale_detail_data->product_type == 'Fish') ? 'selected' : ''; ?>>
                        Fish</option>
                </select>
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