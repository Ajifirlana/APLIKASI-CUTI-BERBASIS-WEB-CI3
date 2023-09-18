<title>SURAT CUTI</title>
<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
<title>SURAT CUTI</title>
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>HISTORI DATA CUTI</b></h3>    
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead >
                    <tr>
                        <th width="5%">No</th>
                        <th width="5%">Nama</th>
                        <th width="10%">Tgl Pengajuan</th>
                        <th width="10%">Jumlah Hari</th>
                        <th width="10%">Dari Tgl</th>
                        <th width="10%">Sampai Tgl</th>
                        <th width="10%">Jenis Cuty</th>
                        <th width="20%">Alasan</th>
                        <th width="20%">Alamat Selama Cuti</th>
                        <th width="20%">Status</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php
                            $no=1;
                           foreach ($data->result() as $row) {
                           ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row->nama_karyawan ?></td>
                          <td><?php echo $row->tgl_pengajuan ?></td>
                          <td><?php echo $row->jml_hari ?></td>
                          <td><?php echo $row->tgl_mulai ?></td>
                          <td><?php echo $row->tgl_akhir ?></td>
                          <td><?php echo $row->jenis_cuty ?></td>
                          <td><?php echo $row->alasan ?></td>
                          <td><?php echo $row->alamat_selama_cuti ?></td>
                          <td><?php 
                                if($row->persetujuan==''){
                                  ?>
                                     <i class="btn-xs btn-danger">Belum Dikonfirmasi</i>
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
                          <td>
                              <a class="delete-row" data-original-title="Delete" href="laporan_cuti/index/<?php echo $row->kd_cuty; ?>"  title="Print Data" target="popup">
                                <?php if ($row->persetujuan=='Disetujui'): ?>
                                  <a class="delete-row" data-original-title="Delete" href="<?php echo base_url("karyawan/laporan_penetapan/".$row->kd_cuty)?>"  title="Print" target="blank">
                                        <button class="btn-success">
                                          <i class="fa fa-print"> Print</i>
                                        </button>
                                      </a>
                                <?php endif ?>
                              </a>
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