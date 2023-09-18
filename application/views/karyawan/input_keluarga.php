<div class="box box-primary">
    <div class="box-header with-border">
        <h3>INPUT DATA KELUARGA</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_input_keluarga') ?>
        <div class="box-body">
            <div class="form-group">
                <label>NAMA</label>
                <input type="text" class="form-control" name="nama" required>
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
                <input type="text" class="form-control" name="telephone" required>
            </div>
            <div class="form-group">
                <label>KETERANGAN</label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="index.php/admin/tampil_karyawan">Back</a>
            </div>
    <?php echo form_close(); ?>
</div>