<div class="box box-primary">
    <div class="box-header with-border">
        <h3>Cuti Sakit</h3>
    </div>
            <!-- form start -->
    <?php echo form_open_multipart('karyawan/proses_input_cuty_tahunan') ?>
        <div class="box-body">
            <div class="form-group">
                <label>Jenis Permohonan Cuti</label>
                <input type="text" class="form-control" name="jenis_cuty" value="Cuti Sakit" readonly>
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
                <label>JUMLAH HARI</label>
                <input type="number" class="form-control" name="jml_hari" placeholder="Misalnya 12 Hari" required>
            </div>

            <div class="form-group">
                <label>Alamat Selama Cuti</label>
                <textarea class="form-control" name="alamat_selama_cuti" placeholder="Isi Alamat Selama Cuti" required></textarea>
            </div>
            <div class="form-group">
                <label>Upload File</label>
                <input type="file"  name="file_arsip" required class="form-control">
            </div>  
            <div class="form-group">
                <label>Atasan Saya</label>
<select name="id_atasan" class="form-control">
    <?php foreach($atasan_saya->result() as $row){?>
    <option value="<?php echo $row->nik?>"><?php echo $row->nik?> || <?php echo $row->nama_karyawan?></option>
<?php }?>
</select>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Kirim</button> &nbsp &nbsp 
                <button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                <a class="btn btn-primary" href="index.php/karyawan/">Back</a>
                </div>
            </div>
    <?php echo form_close(); ?>
</div>