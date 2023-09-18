<div class="box box-primary">
    <div class="box-header with-border">
        <h3><?php echo $title ?></h3>
    </div>

            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_upload_arsip') ?>
        <div class="box-body">
           
            <div class="form-group">
                <label>File Arsip</label>
                <p style="color:blue;">Note : <b style="color:red;">Nama file yang di upload tidak boleh menggunakan spasi</b></p>

                <input type="file" class="form-control" name="userfile" required="">
            </div>
            
            <div>
                <button type="submit" class="btn btn-success">Kirim</button> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="index.php/karyawan/permohonan">Back</a>
                </div>
            </div>
    <?php echo form_close(); ?>
</div>