<?php
    foreach ($data->result() as $row) {
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>EDIT DATA PENDIDIKAN</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('admin/proses_edit_pendidikan') ?>
        <div class="box-body">
            <div class="form-group">
                <label>PENDIDIKAN</label>
                <input type="text" class="form-control" name="pendidikan" value="<?php echo $row->pendidikan ?>">
                <input type="hidden" class="form-control" name="kd_pendidikan" value="<?php echo $row->kd_pendidikan ?>">
            </div>
             <div class="form-group">
                <label>STATUS <b style="color:red">*</b></label>
                <select class="form-control" name="status">
                    <option value="">--- Input Pilihan ---</option>
                    <option value="Berijazah">Berijazah</option>
                    <option value="Tidak Berijazah">Tidak Berijazah</option>
                </select> 
            </div>
            <div>
                <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                <a class="btn btn-primary" href="index.php/admin/tampil_pendidikan">Back</a>
            </div>
    <?php echo form_close(); ?>
</div>
<?php 
    }
?>