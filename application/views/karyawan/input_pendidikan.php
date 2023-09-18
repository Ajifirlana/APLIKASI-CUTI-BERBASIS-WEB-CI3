<div class="box box-primary">
    <div class="box-header with-border">
        <h3>INPUT DATA PENDIDIKAN</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_input_pendidikan') ?>
        <div class="box-body">
            <div class="form-group">
                <label>INPUT PENDIDIKAN ( Mulai Dari SD/SMP/SMA/Perguruan Tinggi) <b style="color:red">*</b></label>
                <input type="text" class="form-control" name="pendidikan" placeholder="Contoh : SDN 149/IX Kota Jambi" required>
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
                <button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="index.php/admin/tampil_pendidikan">Back</a>
            </div>
    <?php echo form_close(); ?>
</div>