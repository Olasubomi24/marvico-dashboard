<div class="pc-container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Offal Detail</h4>
            <?php echo form_open("offal_detail/update_offal_detail/{$offal_detail_data->id}"); ?>

            <input type="hidden" name="id" value="<?php echo $offal_detail_data->id; ?>">

            <div class="form-group mb-3">
                <label for="offal_detail_name">offal Detail Name</label>
                <input type="text" class="form-control" name="offal_detail_name" placeholder="offal Detail Name"
                    value="<?php echo isset($offal_detail_data->offal_detail_name) ? $offal_detail_data->offal_detail_name : ''; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="killogramm">Kilogram</label>
                <input type="text" class="form-control" name="killogramm" placeholder="Kilogram"
                    value="<?php echo isset($offal_detail_data->killogramm) ? $offal_detail_data->killogramm : ''; ?>"
                    required>
            </div>

            <div class="form-group mb-3">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity"
                    value="<?php echo isset($offal_detail_data->quantity) ? $offal_detail_data->quantity : ''; ?>"
                    required>
            </div>
            <div class="form-group mb-3">
                <label for="piece">Pieces</label>
                <input type="number" class="form-control" name="piece" placeholder="Piece"
                    value="<?php echo isset($offal_detail_data->piece) ? $offal_detail_data->piece : ''; ?>" required>
            </div>


            <div class="form-group mb-3">
                <label for="product_type">Product Type</label>
                <select class="form-control" name="product_type" required>
                    <option value="Chicken"
                        <?php echo (isset($offal_detail_data->product_type) && $offal_detail_data->product_type == 'Chicken') ? 'selected' : ''; ?>>
                        Chicken</option>
                    <option value="Turkey"
                        <?php echo (isset($offal_detail_data->product_type) && $offal_detail_data->product_type == 'Turkey') ? 'selected' : ''; ?>>
                        Turkey</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="product_part">Product Part</label>
                <select class="form-control" name="product_part" required>
                    <option value="Gizzard"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Gizzard') ? 'selected' : ''; ?>>
                        Gizzard</option>
                    <option value="Neck"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Neck') ? 'selected' : ''; ?>>
                        Neck</option>
                    <option value="Liver"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Liver') ? 'selected' : ''; ?>>
                        Liver</option>
                    <option value="Heart"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Heart') ? 'selected' : ''; ?>>
                        Heart</option>
                    <option value="Head and Feet"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Head and Feet') ? 'selected' : ''; ?>>
                        Head and Feet</option>
                    <option value="Lap"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Lap') ? 'selected' : ''; ?>>
                        Lap</option>
                    <option value="Wings"
                        <?php echo (isset($offal_detail_data->product_part) && $offal_detail_data->product_part == 'Wings') ? 'selected' : ''; ?>>
                        Wings</option>
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