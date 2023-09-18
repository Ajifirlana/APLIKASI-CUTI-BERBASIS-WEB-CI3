<?php
    foreach ($data->result() as $row) {
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3>EDIT DATA KELUARGA</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('admin/proses_edit_keluarga') ?>
        <div class="box-body">
            <div class="form-group">
                <label>NAMA</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $row->nama ?>">
                <input type="hidden" class="form-control" name="kd_keluarga" value="<?php echo $row->kd_keluarga ?>">
            </div>
            <div class="form-group">
                <label>STATUS <b style="color:red">*</b></label>
                <select class="form-control" name="status">
                    <option value="">--- Input Pilihan ---</option>
                    <option value="Ayah">Ayah</option>
                    <option value="Ibu">Ibu</option>
                    <option value="Kakak">Kakak</option>
                    <option value="Adik">Adik</option>
                    <option value="Saudara">Saudara</option>
                </select> 
            </div>
            <div class="form-group">
                <label>NO TELEPHONE</label>
                <input type="text" class="form-control" name="telephone" value="<?php echo $row->telephone ?>">
            </div>
            <div class="form-group">
                <label>KETERANGAN</label>
                <input type="text" class="form-control" name="keterangan" value="<?php echo $row->keterangan ?>">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                <a class="btn btn-primary" href="index.php/karyawan/tampil_keluarga">Back</a>
            </div>
    <?php echo form_close(); ?>
</div>
<?php 
    }
?>