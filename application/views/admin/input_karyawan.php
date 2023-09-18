		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>INPUT DATA PEGAWAI</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          <?php echo form_open_multipart('admin/proses_input_karyawan') ?>
              	  <div class="box-body">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>NOMOR INDUK PEGAWAI <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="nik" placeholder="Input NIP Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>PASSWORD <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="password" placeholder="Input Password" required>
                          </div>
                          <div class="form-group">
                              <label>NAMA PEGAWAI <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="nama_karyawan" placeholder="Input Nama Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>TEMPAT LAHIR <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="tempat_lahir" placeholder="Input Tempat Lahir Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>TANGGAL LAHIR <b style="color:red">*</b></label>
                              <input type="date" class="form-control" name="tgl_lahir" placeholder="Input Tanggal Lahir" required>
                          </div>
                           <div class="form-group">
                              <label>JENIS KELAMIN <b style="color:red">*</b></label>
                              <select class="form-control" name="jk">
                                  <option value="">--- Input Pilihan ---</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select> 
                          </div>
                          <div class="form-group">
                              <label>NO TELEPHONE <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="no_telp" placeholder="Input No Telephone Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>EMAIL <b style="color:red">*</b></label>
                              <input type="email" class="form-control" name="email" placeholder="Input Email Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>ALAMAT <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="alamat" placeholder="Input Alamat Pegawai" required>
                          </div>
                          <div class="form-group">
                              <label>AGAMA <b style="color:red">*</b></label>
                              <select class="form-control" name="kd_agama">
                                  <?php foreach ($dataku->result() as $row) {
                                      ?>
                                        <option value="<?php echo $row->kd_agama ?>"> <?php echo $row->agama ?></option>
                                      <?php
                                    }
                                  ?>                   
                              </select> 
                          </div>
                          </div>
                      <div class="col-md-6">
                          <div class="form-group">
                          <div class="form-group">
                              <label>PENDIDIKAN <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="no_ktp" placeholder="Input Gelar Pendidikan" required>
                          </div>
                          <div class="form-group">
                              <label>JABATAN <b style="color:red">*</b></label>
                              <select class="form-control" name="kd_jabatan">
                                  <?php foreach ($data->result() as $row) {
                                      ?>
                                        <option value="<?php echo $row->kd_jabatan ?>"> <?php echo $row->jabatan ?></option>
                                      <?php
                                    }
                                  ?>                   
                              </select> 
                          </div>
                          <div class="form-group">

                          <div class="form-group">
                              <label>FOTO <b style="color:red">*</b></label>
                              <input type="file" class="form-control" name="userfile" required>
                          </div>
                      </div>
                    <!-- /.box-body -->
                    		<div align="center">
                      		<button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                      		<button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                          <a class="btn btn-primary" href="index.php/admin/tampil_karyawan">Back</a>
                    		</div>
                  </div>     
          <?php echo form_close(); ?>
    </div>