<div class="box box-primary">
    <div class="box-header with-border">
        <h3>AJUKAN CUTI UMUM</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_input_cuty_umum') ?>
        <div class="box-body">
            <div class="form-group">
                <label>JUMLAH HARI</label>
                <input type="number" class="form-control" name="jml_hari" placeholder="Misalnya 12 Hari" required>
                <!-- <input type="hidden" class="form-control" name="jenis_cuty" value="Umum"> --> 
            </div>
            <div class="form-group">
                <label>Jenis Permohonan Cuti</label>
                <select class="form-control" name="jenis_cuty">
                    <option value="">--- Input Pilihan ---</option>
                    <option value="CUTI BESAR">CUTI BESAR</option>
                    <option value="CUTI SAKIT">CUTI SAKIT</option>
                    <option value="CUTI MELAHIRKAN">CUTI MELAHIRKAN</option>
                    <option value="CUTI KARENA ALASAN PENTING">CUTI KARENA ALASAN PENTING</option>
                    <option value="CUTI DILUAR TANGGUNGAN NEGARA">CUTI DILUAR TANGGUNGAN NEGARA</option>
                </select> 
            </div>
            <div class="form-group"> 
                <label>Alasan</label>
                <textarea class="form-control" name="alasan" placeholder="Isi Alasan Anda" required></textarea>
            </div>
            <div class="form-group">
                <label>DARI TANGGAL</label>
                <input type="date" class="form-control" name="tgl_mulai" required>
            </div>
            <div class="form-group">
                <label>SAMPAI TANGGAL</label>
                <input type="date" class="form-control" name="tgl_akhir" required>
            </div>
            <div class="form-group">
                <label>Alamat Selama Cuti</label>
                <textarea class="form-control" name="alamat_selama_cuti" placeholder="Isi Alamat Selama Cuti" required></textarea>
            </div>
            <div class="form-group">
                <label>Upload File</label>
                <input type="file"  name="userfile" required class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-success">Kirim</button> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="index.php/karyawan/">Back</a>
                </div>
            </div>
    <?php echo form_close(); ?>
</div>