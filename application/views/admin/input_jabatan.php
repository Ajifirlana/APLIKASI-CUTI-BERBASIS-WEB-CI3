		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>INPUT DATA JABATAN</h3>
            </div>
            <!-- form start -->
          <?php echo form_open_multipart('admin/proses_input_jabatan') ?>
              	  <div class="box-body">
                    	<div class="form-group">
                      		<label>JABATAN</label>
                      		<input type="text" class="form-control" name="jabatan" placeholder="Input Jabatan" required>
                    	</div>
                  		<div>
                    		<button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                    		<button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a class="btn btn-primary" href="index.php/admin/tampil_jabatan">Back</a>
                  		</div>
                  </div>
          <?php echo form_close(); ?>
    </div>