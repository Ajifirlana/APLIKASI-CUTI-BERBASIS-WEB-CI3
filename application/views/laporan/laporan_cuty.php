<br> <br>
<h2><center>Laporan Data Cuti</h2>
    <table align="center" width="100%" border="1">                     
        <tr >                            
            <th width="2%">No</th>
            <th width="5%">NIP</th>
            <th width="10%">Nama</th>
            <th width="10%">Tanggal Pengajuan</th>
            <th width="7%">Jumlah Hari</th>
            <th width="10%">Tgl Mulai</th>                        
            <th width="10%">Tgl Akhir</th>                        
            <th width="10%">Jenis Cuti</th>                        
            <th width="10%">Alasan</th>                        
            <th width="8%">Persetujuan</th>                        
        </tr>
  <?php $no=1; foreach ($data->result() as $row) :?>
          <tr class="gradeX" align="center">
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nik; ?></td>
            <td><?php echo $row->nama_karyawan; ?></td>
            <td><?php echo $row->tgl_pengajuan; ?></td>
            <td><?php echo $row->jml_hari; ?></td>
            <td><?php echo $row->tgl_mulai; ?></td>
            <td><?php echo $row->tgl_akhir; ?></td>
            <td><?php echo $row->jenis_cuty; ?></td>
            <td><?php echo $row->alasan; ?></td>
            <td><?php echo $row->persetujuan; ?></td>
          </tr>
  <?php endforeach; ?>                     
    </table>
    <br>
    <script type="text/javascript">print();</script>
    
</script>
</div>