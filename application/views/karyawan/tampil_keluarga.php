            <div>
                <div class="box-header">
                  <h3 class="box-title"><b>DATA KELUARGA</b></h3>    
                </div><br>
                <div> &nbsp &nbsp &nbsp &nbsp &nbsp
                <a class="delete-row" data-original-title="Delete"  href="index.php/karyawan/input_keluarga"  title="Tambah Data" >
                    <i class="btn-sm btn-success btn-icon-pg">Tambah Keluarga</i>
                </a>
            </div> <br>
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                          <th width="5%">No</th>
                          <th width="20%">Nama</th>
                          <th width="10%">Status</th>
                          <th width="15%">No Telephone</th>
                          <th width="40%">Keterangan</th>
                          <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="gradeX">
                          <?php $no=1; foreach ($data->result() as $rows) { ?>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $rows->nama ?></td>
                          <td><?php echo $rows->status ?></td>
                          <td><?php echo $rows->telephone; ?></td>
                          <td><?php echo $rows->keterangan ?></td>
                          <td>                               
                              <a class="delete-row" data-original-title="Delete" href="index.php/karyawan/edit_keluarga/<?php echo $rows->kd_keluarga; ?>"  title="Edit Data" >
                                    <i class="btn-sm btn-primary btn-icon-pg">Edit</i>
                                </a>
                                &nbsp;
                          </td>
                    </tr>
                          <?php } ?>
                </tfoot>
              </table>
            </div>