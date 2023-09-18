		<div class="box box-primary">
            <div class="box-header with-border">
              <h3>INPUT DATA PENGUMUMAN</h3>
            </div>
            <!-- form start -->
          <?php echo form_open_multipart('admin/proses_input_pengumuman') ?>
              	  <div class="box-body">
                    	<div class="form-group">
                      		<label>PENGUMUMAN</label>
                      		<textarea name="pengumuman" id="news" ></textarea>
                          <script type="text/javascript">
                              var editor = CKEDITOR.replace('news');  
                          </script>
                    	</div>
                  		<div>
                    		<button type="submit" class="btn btn-success">Save</button> &nbsp &nbsp 
                    		<button type="reset" class="btn btn-danger">Reset</button> &nbsp &nbsp
                        <a class="btn btn-primary" href="index.php/admin/tampil_pengumuman">Back</a>
                  		</div>
                  </div>
          <?php echo form_close(); ?>
    </div>