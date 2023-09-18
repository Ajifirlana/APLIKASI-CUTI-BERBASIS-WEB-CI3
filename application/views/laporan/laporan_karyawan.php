<h2><center>Laporan Data Pegawai</h2>
    <table align="center" width="100%" border="1" >                     
        <tr >                            
            <td >No</td>
            <td >NIP</td>
            <td >Nama</td>
            <td >TTL</td>
            <td >JK</td>
            <td >No Telphone</td>                        
            <td >Alamat</td>                        
            <td >Agama</td>                        
            <td >Pendidikan</td>                        
            <td >Jabatan</td>                        
        </tr>
  <?php $no=1; foreach ($data->result() as $row) :?>
          <tr class="gradeX" align="center">
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nik; ?></td>
            <td><?php echo $row->nama_karyawan; ?></td>
            <td><?php echo $row->tempat_lahir; ?>, <?php echo $row->tgl_lahir; ?></td>
            <td><?php echo $row->jk; ?></td>
            <td><?php echo $row->no_telp; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td><?php echo $row->agama; ?></td>
            <td><?php echo $row->no_ktp; ?></td>
            <td><?php echo $row->jabatan; ?></td>
          </tr>
  <?php endforeach; ?>                     
    </table>
    <br>
    <script type="text/javascript">print();</script>
</script>
</div>