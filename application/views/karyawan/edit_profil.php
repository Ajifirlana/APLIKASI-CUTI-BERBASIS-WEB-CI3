<?php  foreach ($data->result() as $row) {  ?>

<?php echo form_open_multipart('karyawan/proses_edit_profil') ?>
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="pull-right">
            <div align="center">
              <a class="btn btn-danger" href="index.php/karyawan/home">Back</a> &nbsp &nbsp 
              <button type="submit" class="btn btn-success">Update</button> 
              </div>
        </div>
    </div>
    <div>
        <div>
            <div id="user-profile-1" class="user-profile row">
            <div class="col-sm-1"></div>
            <div class="col-xs-12 col-sm-6">
                <table width="100%" height="100px">
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text" > Nama Lengkap &nbsp;</i></td>
                          <td><input type="text" class="form-control" name="nama_karyawan" value="<?php echo $row->nama_karyawan ?>"></td>
                          <input type="hidden" class="form-control" name="kd_karyawan" value="<?php echo $row->kd_karyawan ?>" readonly>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Tempat Lahir &nbsp;&nbsp;&nbsp;&nbsp;</i></td>
                          <td><input type="text" class="form-control" name="tempat_lahir" value="<?php echo $row->tempat_lahir ?>"></td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Tanggal Lahir &nbsp;&nbsp;&nbsp;</i></td>
                          <td><input type="date" class="form-control" name="tgl_lahir" value="<?php echo $row->tgl_lahir ?>"></td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Jenis Kelamin &nbsp;&nbsp;&nbsp;</i></td>
                          <td>
                            <select class="form-control" name="jk">
                                  <option value="">--- Input Pilihan ---</option>
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                              </select> 
                          </td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">No Telepone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
                          <td><input type="text" class="form-control" name="no_telp" value="<?php echo $row->no_telp ?>"></td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
                          <td><input type="email" class="form-control" name="email" value="<?php echo $row->email ?>"></td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Alamat&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</i></td>
                          <td><input type="text" class="form-control" name="alamat" value="<?php echo $row->alamat ?>"></td>
                      </tr>
                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</i></td>
                          <td>
                            <select class="form-control" name="kd_agama">
                                  <?php foreach ($data_agama->result() as $v_agama) {
                                      ?>
                                        <option value="<?php echo $v_agama->kd_agama ?>"> <?php echo $v_agama->agama ?></option>
                                      <?php
                                    }
                                  ?>                   
                              </select>
                          </td>
                      </tr>

                      <tr>
                          <td width="100px"><i class="btn btn-primary" type="text">Pendidikan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></td>
                          <td><input type="text" class="form-control" name="no_ktp" value="<?php echo $row->no_ktp ?>"></td>
                      </tr>
                </table>
            </div>
            <div class="col-xs-12 col-sm-4 center">       
                    <div>
                        <br>
                        <center>
                            
                        </center>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-8 center"><br>            
                    <div>
                       
                          <td>
                              </script>
                          </td>
                    </div>
            </div>
        </div>
    </div>                                 
</div>
<?php echo form_close(); ?>
<?php   } ?>
