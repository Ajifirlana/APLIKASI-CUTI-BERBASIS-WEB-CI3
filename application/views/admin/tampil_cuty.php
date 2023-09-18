<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>SEMUA DATA CUTI</b></h3>    
            </div><br>
           <!--  <div> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a class="delete-row" data-original-title="Delete"  href="index.php/admin/input_agama"  title="Tambah Data" >
                    <i class="btn-lg btn-success btn-icon-pg">Tambah Data</i>
                </a>
            </div> <br> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead >
                    <tr>
                        <th width="5%">No</th>
                        <th width="11%">Nama|NIP</th> 
                        <th width="11%">Jenis Cuti</th>
                        <th width="22%">Rentang Permohonan</th> 
                        <th>File</th>
                        <th width="5%">Status</th>
                        <th width="22%">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php
                            $no=1;
                           foreach ($data->result() as $row) {
                           ?>
                          <td><?php echo $no++; ?></td>
                          <td> <?php echo $row->nama_karyawan ?><br><?php echo $row->nik ?></td> 
                          <td><?php echo $row->jenis_cuty ?></td>
                          <td><?php echo $row->jml_hari ?> Hari <br> <?php echo $row->tgl_mulai ?> - <?php echo $row->tgl_akhir ?></td>
                        <td>
                      <a href="<?php echo base_url('admin/download_arsip/'.$row->kd_cuty);?>">Download Arsip</a></td>
                          <td>
                                <?php 
                                if($row->persetujuan==''){
                                  ?>
                                     <i class="btn-xs btn-danger">Menunggu</i>

                                  <?php
                                }else{
                                  if($row->persetujuan=='Disetujui'){
                                    ?>                                
                                      <i class="btn-xs btn-success btn-icon-pg">Disetujui</i> 
                                    <?php
                                  }else{
                                      ?>
                                        <i class="btn-xs btn-danger btn-icon-pg">Ditolak</i>
                                      <?php
                                  }
                                }
                               ?>      
                          </td>
                          <td align="center">
                              <?php 
                                if($row->persetujuan==''){
                                  ?>
                                      
        <?php if ($this->session->userdata('role')=="KABAG") {?>

          <a class="validasi-row" data-original-title="Validasi" href="index.php/admin/konfirmasi_cuty/<?php echo $row->kd_cuty; ?>"  title="Validasi" >
                                    <button class="btn btn-success">
                                       Validasi
                                    </button>
                                      </a>
        <a class="validasi-row" data-original-title="Validasi" href="index.php/admin/konfirmasi_cuty_tolak/<?php echo $row->kd_cuty; ?>"  title="Validasi" >
    <button class="btn btn-danger">
       Tidak Valid
    </button>
      </a>
                                    <?php }?>


                                 
   <?php if ($this->session->userdata('role')=="ADMIN") {?>
    
    <a class="validasi-row" data-original-title="Validasi" href="index.php/admin/konfirmasi_cuty/<?php echo $row->kd_cuty; ?>"  title="Validasi" >
    <button class="btn btn-success">
       Validasi
    </button>
      </a>
      
<a class="validasi-row" data-original-title="Validasi" href="index.php/admin/konfirmasi_cuty_tolak/<?php echo $row->kd_cuty; ?>"  title="Validasi" >
    <button class="btn btn-danger">
       Tidak Valid
    </button>
      </a>
    <?php }?>
                                  <?php
                                }else{
                                  ?>           
        <?php if ($this->session->userdata('role')!="KABAG") {?>     
                                      <a class="delete-row" data-original-title="Delete" href="<?php echo base_url("karyawan/laporan_penetapan/".$row->kd_cuty)?>"  title="Print" target="blank">
                                          <button class="btn btn-warning">
                                            <i class="fa fa-print"> Cetak</i>
                                          </button>
                                      </a>
                                    <?php }?>
&nbsp;
&nbsp;
&nbsp;
                  
                                     
                                    </button>
                                    </a>
                                  <?php
                                }
                               ?> 

                                    &nbsp;  &nbsp;  &nbsp;
                                   <!--<a class="delete-row" data-original-title="Delete" href="index.php/admin/hapus_cuty/<?php echo $row->kd_cuty; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" title="Hapus Data" >
                                        <i class="btn-xs btn-danger">Hapus</i>
                                    </a>-->
                                    <!-- &nbsp;
                                    <a class="delete-row" data-original-title="Delete" href="index.php/laporan/laporan_cuty_admin/<?php echo $row->kd_cuty; ?>"  title="Print Data" target="popup">
                                        <i class="btn-xs btn-warning btn-icon-pg">Print</i>
                                    </a> -->
                          </td>
                    </tr>
                          <?php
                              /*$no++;*/
                              }
                           ?>
                </tbody> 
              </table>
            </div>
            <!-- /.box-body -->
<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>