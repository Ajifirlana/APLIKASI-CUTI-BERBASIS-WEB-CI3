		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>EDIT DATA JABATAN</h3>
            </div>
            <!-- /.box-header -->
            <?php
           foreach ($data->result() as $row) {
            ?>
            <!-- form start -->
            <?php echo form_open_multipart('admin/proses_edit_jabatan') ?>
                  <div class="box-body">
                      <div class="form-group">
                          <label>ID JABATAN</label>
                          <input type="text" class="form-control" name="kd_jabatan" value="<?php echo $row->kd_jabatan ?>" disabled>
                          <input type="hidden" class="form-control" name="kd_jabatan" value="<?php echo $row->kd_jabatan ?>">
                      </div>
                      <div class="form-group">
                          <label>JABATAN</label>
                          <input type="text" class="form-control" name="jabatan" value="<?php echo $row->jabatan ?>">
                      </div>
                      <div>
                        <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                        <a class="btn btn-primary" href="index.php/admin/tampil_jabatan">Back</a>
                      </div>
                  </div>
          <?php echo form_close(); ?>

           <?php 
              }
               ?>
    </div>
