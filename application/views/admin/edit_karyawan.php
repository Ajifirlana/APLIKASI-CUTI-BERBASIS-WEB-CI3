    <div class="box box-primary">
            <div class="box-header with-border">
              <h3>EDIT DATA PEGAWAI</h3>
            </div>
            <!-- /.box-header -->
            <?php
           foreach ($data->result() as $row) {
            ?>
            <!-- form start -->
          <?php echo form_open_multipart('admin/proses_edit_karyawan') ?>
                  <div class="box-body">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>NOMOR INDUK PEGAWAI <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="nik" value="<?php echo $row->nik ?>" disabled>
                              <input type="hidden" class="form-control" name="kd_karyawan" value="<?php echo $row->kd_karyawan ?>">
                          </div>
                          <div class="form-group">
                              <label>PASSWORD <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="password" value="<?php echo $row->password ?>">
                          </div>
                          <div class="form-group">
                              <label>NAMA PEGAWAI <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="nama_karyawan" value="<?php echo $row->nama_karyawan ?>">
                          </div>
                           <div class="form-group">
                              <label>TEMPAT LAHIR <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row->tempat_lahir ?>">
                          </div>
                          <div class="form-group">
                              <label>TANGGAL LAHIR <b style="color:red">*</b></label>
                              <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row->tgl_lahir ?>">
                          </div>
                           <div class="form-group">
                              <label>JENIS KELAMIN</label>
                              <select class="form-control" name="jk">
                                  <option value="">--- Input Pilihan ---</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select> 
                          </div>
                          <div class="form-group">
                              <label>NO TELEPHONE <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="no_telp" value="<?php echo $row->no_telp ?>">
                          </div>
                          <div class="form-group">
                              <label>EMAIL <b style="color:red">*</b></label>
                              <input type="email" class="form-control" name="email" value="<?php echo $row->email ?>">
                          </div>
                          <div class="form-group">
                              <label>ALAMAT <b style="color:red">*</b></label>
                              <input type="text" class="form-control" name="alamat" value="<?php ECHO $row->alamat ?>">
                          </div>
                          <div class="form-group">
                              <label>AGAMA <b style="color:red">*</b></label>
                              <select class="form-control" name="kd_agama">
                                  <?php foreach ($data_agama->result() as $v_agama) {
                                      ?>
                                        <option value="<?php echo $v_agama->kd_agama ?>"> <?php echo $v_agama->agama ?></option>
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
                              <input type="text" class="form-control" name="no_ktp" value="<?php echo $row->no_ktp ?>">
                          </div>
                          <div class="form-group">
                              <label>JABATAN <b style="color:red">*</b></label>
                              <select class="form-control" name="kd_jabatan">
                                  <?php foreach ($data_jabatan->result() as $v_jabatan) {
                                      ?>
                                        <option value="<?php echo $v_jabatan->kd_jabatan ?>"> <?php echo $v_jabatan->jabatan ?></option>
                                      <?php
                                    }
                                  ?>                   
                              </select> 
                          </div>
                          <div class="form-group">

                          <div class="form-group">
                              <label>FOTO <b style="color:red">*</b></label>
                              <input type="file" class="form-control" name="userfile">
                          </div>
                      </div>
                    <!-- /.box-body -->
                        <div align="center">
                          <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                          <a class="btn btn-primary" href="index.php/admin/tampil_karyawan">Back</a>
                        </div>
                  </div>     
          <?php echo form_close(); ?>
               <?php 
            }
           ?>
    </div>