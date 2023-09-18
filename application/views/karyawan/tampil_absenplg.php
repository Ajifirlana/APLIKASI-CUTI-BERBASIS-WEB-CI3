<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>DATA ABSENSI MASUK</b></h3>    
            </div><br>
            <div class="box-body">
              <table id="table1" class="table table-bordered table-striped">
                <thead>
                    <tr >
                          <th width="5%">No</th>
                          <th width="20%">TANGGAL</th>
                          <th width="20%">NIK</th>
                          <th width="30%">Nama Karyawan</th>
                          <th width="20%">Jam Absen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php
                            $no=1;
                           foreach ($data->result() as $row) {
                           ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row->tgl ?></td>
                          <td><?php echo $row->nik ?></td>
                          <td><?php echo $row->nama_karyawan ?></td>
                          <td><?php echo $row->jam ?></td>
                    </tr>
                          <?php
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