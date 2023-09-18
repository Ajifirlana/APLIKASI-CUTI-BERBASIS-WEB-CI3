		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>EDIT DATA AGAMA</h3>
            </div>
            <!-- /.box-header -->
            <?php
           foreach ($data->result() as $row) {
            ?>
            <!-- form start -->
            <?php echo form_open_multipart('admin/proses_edit_agama') ?>
                  <div class="box-body">
                      <div class="form-group">
                          <label>ID AGAMA</label>
                          <input type="text" class="form-control" name="kd_agama" value="<?php echo $row->kd_agama ?>" disabled>
                          <input type="hidden" class="form-control" name="kd_agama" value="<?php echo $row->kd_agama ?>">
                      </div>
                      <div class="form-group">
                          <label>AGAMA</label>
                          <input type="text" class="form-control" name="agama" value="<?php echo $row->agama ?>">
                      </div>
                      <div>
                        <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                        <a class="btn btn-primary" href="index.php/admin/tampil_agama">Back</a>
                      </div>
                  </div>
          <?php echo form_close(); ?>

           <?php 
              }
               ?>
    </div>
