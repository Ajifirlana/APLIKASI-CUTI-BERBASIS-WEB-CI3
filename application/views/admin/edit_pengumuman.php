		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>EDIT DATA PENGUMUMAN</h3>
            </div>
            <!-- /.box-header -->
            <?php
           foreach ($data->result() as $row) {
            ?>
            <!-- form start -->
            <?php echo form_open_multipart('admin/proses_edit_pengumuman') ?>
                  <div class="box-body">
                      <div class="form-group">
                          <label>ID PENGUMUMAN</label>
                          <input type="text" class="form-control" name="kd_pengumuman" value="<?php echo $row->kd_pengumuman ?>" disabled>
                          <input type="hidden" class="form-control" name="kd_pengumuman" value="<?php echo $row->kd_pengumuman ?>">
                      </div>
                      <div class="form-group">
                          <label>PENGUMUMAN</label>
                          <textarea name="pengumuman" id="news" <?php echo $row->pengumuman ?></textarea>
                          <script type="text/javascript">
                              var editor = CKEDITOR.replace('news');  
                          </script>
                      </div>
                        <button type="submit" class="btn btn-success">Update</button> &nbsp &nbsp 
                        <a class="btn btn-primary" href="index.php/admin/tampil_pengumuman">Back</a>
                      </div>
                  </div>
          <?php echo form_close(); ?>

          <?php 
            }
          ?>
    </div>
