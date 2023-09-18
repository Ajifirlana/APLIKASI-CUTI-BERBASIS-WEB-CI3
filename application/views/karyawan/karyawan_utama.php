<div class="box box-primary">
    <div class="box-header with-border">
        <div class="input-group">
            <div class="input-group-btn">
              <i type="text" class="btn btn-danger">Pengumuman</i>
            </div>
            <div>
              <?php  foreach ($datas->result() as $row) {  ?>
                <b class="form-control" readpnly><marquee puf style="color:black;"><?php echo $row->pengumuman ?></marquee></b> 
              <?php } ?>
            </div>
              <?php  foreach ($data->result() as $row) { }  ?>
        </div>
        <div class="pull-right"> <br>
            <a class="delete-row" data-original-title="Delete" href="index.php/karyawan/edit_profil/<?php echo $row->kd_karyawan; ?>"  title="Edit Data" >
                <i class="btn btn-success btn-icon-pg">Ubah Profile</i>
            </a>
        </div>
        <div class="pull-left"> <br>
            <div class="col-md-12">
              <?php echo form_open_multipart('karyawan/proses_input_absen') ?>
              <!--  <button class="btn btn-primary btn-icon-pg"><b></b>asd</button> -->
              <?php echo form_close(); ?>   
            </div>
        </div>
        <div class="pull-left"> <br>
            <div class="col-md-4">
              <?php echo form_open_multipart('karyawan/proses_input_absenplg') ?>
              <!--  <button class="btn btn-primary btn-icon-pg"><b></b>asd</button>-->
              <?php echo form_close(); ?>   
            </div>
        </div>
    </div>
    <div>
        <div>
            <div id="user-profile-1" class="user-profile row">
            <div class="col-sm-2"></div>
                <div class="col-xs-12 col-sm-3">             
                    <div> <br>
                        <span class='profile-picture'>
                        <img id='foto' class='editable img-responsive' alt='' Avatar'' src="assets/foto_karyawan/<?php echo $row->foto; ?>"/>
                        <br>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-xs-2 col-sm-2">
                    <table width="100%" height="100px">
                        <tr>
                          <td><h3><b><?php echo $row->nama_karyawan ?></b></h3></td>
                        </tr>
                        <tr>
                          <td><h4><?php echo $row->nik ?></h4></td>
                        </tr>
                        <tr>
                          <td><h5 class="fa fa-envelope">&nbsp;<?php echo $row->email ?></h5></td>
                        </tr>
                        <tr>
                          <td><h5 class="fa fa-phone">&nbsp;<?php echo $row->no_telp ?></h5></td>
                        </tr>
                        <tr>
                          <td><h5>&nbsp;<?php echo $row->alamat ?></h5></td>
                        </tr>                        
                    </table>
                </div>
            </div>
            <br> <br> <br>
            <div id="user-profile-1" class="user-profile row">
            <div class="col-sm-1"></div>
                <div class="col-xs-1 col-sm-3">             
                    <table>
                      <tr>
                          <td><b>Tempat / Tanggal Lahir</b></td>
                      </tr>
                      <tr>
                        <td><h5><?php echo $row->tempat_lahir ?>, <?php echo $row->tgl_lahir ?></h5></td>
                      </tr>
                    </table>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-xs-2 col-sm-3">
                    <table>
                      <tr>
                          <td><b>Pendidikan</b></td>
                      </tr>
                      <tr>
                        <td><h5><?php echo $row->no_ktp ?></h5></td>
                      </tr>
                    </table>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-xs-2 col-sm-3">
                    <table>
                      <tr>
                          <td><b>Jabatan</b></td>
                      </tr>
                      <tr>
                        <td><h5><?php echo $row->jabatan ?></h5></td>
                      </tr>
                    </table>
                </div>
            </div>
            <br> <br>
            <div id="user-profile-1" class="user-profile row">
            <div class="col-sm-1"></div>
                <div class="col-xs-1 col-sm-3">             
                    <table>
                      <tr>
                          <td><b>Agama</b></td>
                      </tr>
                      <tr>
                        <td><h5><?php echo $row->agama ?></h5></td>
                      </tr>
                    </table>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-xs-2 col-sm-3">
                    <table>
                      <tr>
                          <td><b>Jenis Kelamin</b></td>
                      </tr>
                      <tr>
                        <td><h5><?php echo $row->jk ?> </h5></td>
                      </tr>
                    </table>
                </div>
            <br> <br>
            <div id="user-profile-1" class="user-profile row">
            <div class="col-sm-1"></div>               
                <div class="col-sm-4"></div>
                <div class="col-xs-2 col-sm-3">
                    <table>
                      <tr>
                      </tr>
                    </table>
                </div>
            </div>            
            </div>
        </div>
    </div>                                       
</div>
<br>

<script type="text/javascript">
    $(document).ready(function() {      
      $().UItoTop({ easingType: 'easeOutQuart' });
      
    });
    </script>
    <a href="#" id="toTop"> </a>
<script type="text/javascript" src="assets/bootstrap/js/navigation.js"></script>












         
