<?php
    foreach ($data->result() as $row) {
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>INPUT DATA PENDIDIKAN</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_edit_pendidikan') ?>
        <div class="box-body">
            <div class="form-group">
                <label>ID PENDIDIKAN</label>
                <input type="text" class="form-control" name="kd_pendidikan" value="<?php echo $row->kd_pendidikan ?>" readonly>
                <input type="hidden" class="form-control" name="kd_pendidikan" value="<?php echo $row->kd_pendidikan ?>">
            </div>
            <div class="form-group">
                <label>INPUT PENDIDIKAN ( Mulai Dari SD/SMP/SMA/Perguruan Tinggi) <b style="color:red">*</b></label>
                <input type="text" class="form-control" name="pendidikan" value="<?php echo $row->pendidikan ?>">
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
                <a class="btn btn-danger" href="index.php/admin/tampil_pendidikan">Back</a>
            </div>
    <?php echo form_close(); ?>
</div>
<?php 
    }
?>