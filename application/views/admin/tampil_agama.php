<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>SEMUA DATA AGAMA</b></h3>    
            </div><br>
            <div> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a class="delete-row" data-original-title="Delete"  href="index.php/admin/input_agama"  title="Tambah Data" >
                    <i class="btn-lg btn-success btn-icon-pg">Tambah Data</i>
                </a>
            </div> <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead >
                    <tr>
                        <th width="5%">No</th>
                        <th width="40%">Agama</th>
                        <th width="35%">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php
                            $no=1;
                           foreach ($data->result() as $row) {
                           ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row->agama ?></td>
                          <td align="center">
                               <a class="delete-row" data-original-title="Delete" href="index.php/admin/edit_agama/<?php echo $row->kd_agama; ?>"  title="Hapus Data" >
                                    <i class="btn-sm btn-primary btn-icon-pg">Edit</i>
                                </a>
                                &nbsp
                               <a class="delete-row" data-original-title="Delete" href="index.php/admin/hapus_agama/<?php echo $row->kd_agama; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" title="Hapus Data" >
                                    <i class="btn-sm btn-danger">Hapus</i>
                                </a>
                          </td>
                    </tr>
                          <?php
                              /*$no++;*/
                              }
                           ?>
                </tbody>
                <tfoot align="center">
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