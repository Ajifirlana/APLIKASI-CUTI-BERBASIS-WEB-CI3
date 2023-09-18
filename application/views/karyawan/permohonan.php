 
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><b>HISTORI DATA CUTI</b></h3>    
            </div><br>
            <!-- /.box-header -->
            <div class="box-body">

            
              <table id="myTable"class="table table-striped" style="width:100%">
    <thead>
        <tr>
                      <th>No</th> 
                      <th >Jenis Cuty</th>
                      <th >Rentang Permohonan</th> 
                      <th >Status</th>
                      <th >File</th>    
                      <th >Option</th>    
                      
                    </tr>
    </thead>
    <tbody>
      <?php $no=1;
                           foreach ($data->result() as $row) {
                           ?>
              
<tr>
                     
                     <td><?php echo $no++; ?></td>
                      <td><?php echo $row->jenis_cuty ?>
                      <td><?php echo $row->jml_hari ?> Hari <br> <?php echo $row->tgl_mulai ?> - <?php echo $row->tgl_mulai ?></td>
                      
                      <td><?php 
                            if($row->persetujuan==''){
                              ?>
                                 <i class="btn-xs btn-danger">Menunggu</i>
                              <?php
                            }else{
                                if($row->persetujuan=='Disetujui'){
                                  ?>                                
                                     <i class="btn-xs btn-success btn-icon-pg">Disetujui</i>
                                  <?php
                                }else{
                                  ?>                                
                                     <i class="btn-xs btn-danger btn-icon-pg">Ditolak</i>
                                  <?php }
                            }
                           ?>
                      </td>
                       <td>  
                        <?php 
                       if (!empty($row->file_arsip)) {?>
                      <a href="<?php echo base_url('karyawan/download_arsip/'.$row->kd_cuty);?>">Download Arsip</a>
                      <?php }else{?>
                        File Tidak Ada
                      <?php }?>
                      </td>
                      
                      <td>
                          <a class="delete-row" data-original-title="Delete" href="laporan_cuti/index/<?php echo $row->kd_cuty; ?>"  title="Print Data" target="popup">
                            <?php if ($row->persetujuan=='Disetujui'): ?>
                              <a class="print-row" data-original-title="Print" href="<?php echo base_url("karyawan/laporan_penetapan/".$row->kd_cuty)?>"  title="Print" target="blank">
                                    <button class="btn btn-warning">
                                      <i class="fa fa-print"> Cetak</i>
                                    </button>
                                  </a>
                            <?php endif ?>
                          </a>
                      </td>
                    
             </tr>             <?php }?>
      <!-- Data akan dimuat di sini -->
    </tbody>
</table>

            </div>
            <!-- /.box-body -->
