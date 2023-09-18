		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>INPUT DATA AGAMA</h3>
            </div>
            <!-- form start -->
          <?php echo form_open_multipart('admin/proses_input_agama') ?>
              	  <div class="box-body">
                    	<div class="form-group">
                      		<label>AGAMA</label>
                      		<input type="text" class="form-control" name="agama" placeholder="Input Agama" required>
                    	</div>
                  		<div>
                    		<button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                    		<button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a class="btn btn-primary" href="index.php/admin/tampil_agama">Back</a>
                  		</div>
                  </div>
          <?php echo form_close(); ?>
    </div>