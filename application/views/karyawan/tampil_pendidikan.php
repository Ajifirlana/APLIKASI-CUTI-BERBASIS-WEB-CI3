            <div>
                <div class="box-header">
                  <h3 class="box-title"><b>RIWAYAT PENDIDIKAN</b></h3>    
                </div><br>
                <div> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a class="delete-row" data-original-title="Delete"  href="index.php/karyawan/input_pendidikan"  title="Tambah Data" >
                    <i class="btn-sm btn-success btn-icon-pg">Tambah Pendidikan</i>
                </a>
            </div> <br>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                          <th width="5%">No</th>
                          <th width="40%">Pendidikan</th>
                          <th width="30%">Status</th>
                          <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php $no=1; foreach ($data->result() as $row) { ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $row->pendidikan ?></td>
                          <td><?php echo $row->status ?></td>
                          <td>                               
                              <a class="delete-row" data-original-title="Delete" href="index.php/karyawan/edit_pendidikan/<?php echo $row->kd_pendidikan; ?>"  title="Edit Data" >
                                    <i class="btn-sm btn-primary btn-icon-pg">Edit</i>
                                </a>
                                &nbsp;
                          </td>
                    </tr>
                          <?php } ?>
                </tfoot>
              </table>
            </div>