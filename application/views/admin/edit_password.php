<div class="box box-primary">
    <div class="box-header with-border">
        <h3>EDIT PASSWORD</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('admin/proses_edit_password') ?>
        <div class="box-body">
            <div class="form-group">
                <label>INPUT PASSWORD BARU</label>
                <input type="password" class="form-control" name="password" placeholder="Input Passwword Baru">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                <a class="btn btn-danger" href="index.php/admin/home">Cancel</a>
            </div>
    <?php echo form_close(); ?>
</div>
