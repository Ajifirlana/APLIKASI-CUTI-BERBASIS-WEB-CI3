<br> <br>
<h2><center>Form Cuti Pegawai</h2>
    <table align="center" width="100%" border="1">
  <?php $no=1; foreach ($data->result() as $row) :?>
          <tr>
              <td>NIP</td>
              <td>:</td>
              <td><?php echo $row->nik; ?></td>
          </tr>
          <tr>
              <td>Nama Pegawai</td>
              <td>:</td>
              <td><?php echo $row->nama_karyawan; ?></td>
          </tr>
          <tr>
              <td>Tanggal Pengajuan</td>
              <td>:</td>
              <td><?php echo $row->tgl_pengajuan; ?></td>
          </tr>
          <tr>
              <td>Tanggal Mulai Cuti</td>
              <td>:</td>
              <td><?php echo $row->tgl_mulai; ?></td>
          </tr>
          <tr>
              <td>Tanggal Akhir cuti</td>
              <td>:</td>
              <td><?php echo $row->tgl_akhir; ?></td>
          </tr>
          <tr>
              <td>Jenis Cuti</td>
              <td>:</td>
              <td><?php echo $row->jenis_cuty; ?></td>
          </tr>
          <tr>
              <td>Alasan cuti</td>
              <td>:</td>
              <td><?php echo $row->alasan; ?></td>
          </tr>
          <tr>
              <td>Persetujuan</td>
              <td>:</td>
              <td><?php echo $row->persetujuan; ?></td>
          </tr>
  <?php endforeach; ?>                     
    </table>
    <br>
    <script type="text/javascript">print();</script>
    
</script>
</div>