<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>SEMUA DATA PENDIDIKAN PEGAWAI</b></h3>    
            </div><br>
            <!-- <div> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a class="delete-row" data-original-title="Delete"  href="index.php/admin/input_karyawan"  title="Tambah Data" >
                    <i class="btn-lg btn-success btn-icon-pg">Tambah Data</i>
                </a>
            </div> <br> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr >
                          <th width="5%">No</th>
                          <th width="20%">Pendidikan</th>
                          <th width="10%">Status</th>
                          <th width="10%">NIK</th>
                          <th width="30%">Nama PEGAWAI</th>
                          <th width="25">Option</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr class="gradeX">
                          <?php
                            $no=1;
                           foreach ($data->result() as $row) {
                           ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row->pendidikan ?></td>
                          <td><?php echo $row->status ?></td>
                          <td><?php echo $row->nik ?></td>
                          <td><?php echo $row->nama_karyawan ?></td>
                          <td>
                               <a class="delete-row" data-original-title="Delete" href="index.php/admin/edit_pendidikan/<?php echo $row->kd_pendidikan; ?>"  title="Edit Data" >
                                    <i class="btn-sm btn-primary btn-icon-pg">Edit</i>
                                </a>
                                &nbsp;
                               <a class="delete-row" data-original-title="Delete" href="index.php/admin/hapus_pendidikan/<?php echo $row->kd_pendidikan; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" title="Hapus Data" >
                                    <i class="btn-sm btn-danger">Hapus</i>
                                </a>
                          </td>
                    </tr>
                          <?php
                              }
                           ?>
                </tbody>
                <tfoot align="center">
                    <tr>
                          <th width="5%">No</th>
                          <th width="20%">Pendidikan</th>
                          <th width="10%">Status</th>
                          <th width="10%">NIK</th>
                          <th width="30%">Nama Pegawai</th>
                          <th width="25">Option</th>
                  </tr>
                </tfoot>
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