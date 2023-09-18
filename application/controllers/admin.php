<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index(){
		$username               = 	$this->session->userdata('username');
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/admin_utama';
		$data['title'] 			=	' Dashboard';
		$this->load->view('admin/admin_home',$data);	
	}

	public function home(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/admin_utama';
		$data['title'] 			=	' Dashboard';
		$this->load->view('admin/admin_home',$data);	
	}

	/*Detail Karyawan*/
	public function detail_karyawan($kd_karyawan){
		$data['kd_karyawan']	=	$kd_karyawan;
//		$data['data']			=	$this->db->get_where('tbl_karyawan',$data);
		$data['menu']			=	'admin/admin_menu';
		$data['content']  		=	'admin/detail_karyawan';
		$data['title'] 			= 	'Detail Data Pegawai';
		$data['data'] 			= 	$this->db->query("SELECT * FROM tbl_karyawan 
													  left join (tbl_jabatan,tbl_agama) on 
													  tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan and 
													  tbl_karyawan.kd_agama=tbl_agama.kd_agama
													  where tbl_karyawan.kd_karyawan='$kd_karyawan'"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Konfirmasi Admin data cuty*/
	public function konfirmasi_cuty($kd_cuty){
		$this->db->query("update tbl_cuty set persetujuan='Disetujui' where kd_cuty=$kd_cuty");
		redirect('admin/tampil_cuty');
	}

	/*Konfirmasi Admin data cuty*/
	public function konfirmasi_cuty_tolak($kd_cuty){
		$this->db->query("update tbl_cuty set persetujuan='Ditolak' where kd_cuty=$kd_cuty");
		redirect('admin/tampil_cuty');
	} 

	/*Input Data Agama*/
	public function input_agama(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/input_agama';
		$data['title'] 			=	'Input Data Agama';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses untuk memasukan data ke tabel agama*/
	public function proses_input_agama(){
		$agama 					=	$this->input->post('agama');
		$data 					=	array('agama' => $agama);
		$this->db->insert('tbl_agama',$data);
		redirect('admin/tampil_agama');
	}

	/*Input Data Jabatan*/
	public function input_jabatan(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/input_jabatan';
		$data['title'] 			=	'Input Data Jabatan';
		$this->load->view('admin/admin_home',$data);
	}
	/*proses untuk memasukan data ke tabel jabatan*/
	public function proses_input_jabatan(){
		$jabatan 				=	$this->input->post('jabatan');
		$data 					=	array('jabatan' => $jabatan);
		$this->db->insert('tbl_jabatan',$data);
		redirect('admin/tampil_jabatan');
	}


	/*Input Data Karyawan*/
	public function input_karyawan(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/input_karyawan';
		$data['title'] 			=	'Input Data Pegawai';
		$data['data']			=	$this->db->get('tbl_jabatan');
		$data['dataku']			=	$this->db->get('tbl_agama');
		$this->load->view('admin/admin_home',$data);
	}
	/*proses untuk memasukan data ke tabel karyawan*/
	public function proses_input_karyawan(){
		$nik 					= 	$this->input->post('nik');
		$password 				= 	$this->input->post('password');
		$nama_karyawan 			= 	$this->input->post('nama_karyawan');
		$tempat_lahir 			= 	$this->input->post('tempat_lahir');
		$tgl_lahir 				= 	$this->input->post('tgl_lahir');
		$jk 					= 	$this->input->post('jk');
		$no_telp 				= 	$this->input->post('no_telp');
		$email 					= 	$this->input->post('email');
		$alamat 				= 	$this->input->post('alamat');
		$kd_agama 				= 	$this->input->post('kd_agama');
		$gol_darah 				= 	$this->input->post('gol_darah');
		$no_ktp 				= 	$this->input->post('no_ktp');
		$kd_jabatan 			= 	$this->input->post('kd_jabatan');
		$bio 					= 	$this->input->post('bio');
        $foto 		  			= 	$_FILES['userfile']['name'];;
		$config['upload_path']  = 	'assets/foto_karyawan';
        $config['allowed_types']= 	'gif|jpg|png|JPG|jpeg|JPEG';
        $config['max_size']     = 	5200;
        $config['max_width']    = 	5024;
        $config['max_height']   = 	5768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload()){
        $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload', $error);
        echo "gagal ( Mingkin Ukuran Foto Terlalu Besar";
        }
        else{
        $data = array('upload_data'		=> $this->upload->data());
		$data = array('nik'				=> $nik,
					  'password'		=> $password,
					  'nama_karyawan'	=> $nama_karyawan,
					  'tempat_lahir'	=> $tempat_lahir,
					  'tgl_lahir'		=> $tgl_lahir,
					  'jk'				=> $jk,
					  'no_telp'			=> $no_telp,
					  'email'			=> $email,
					  'alamat'			=> $alamat,
					  'kd_agama'		=> $kd_agama,
					  'gol_darah'		=> $gol_darah,
					  'no_ktp'			=> $no_ktp,
					  'kd_jabatan'		=> $kd_jabatan,
					  'bio'				=> $bio,
					  'foto'			=> $foto
					  );
		$this->db->insert('tbl_karyawan',$data);
		redirect('admin/tampil_karyawan');
		}
	}

	/*Input Data Pengumuman*/
	public function input_pengumuman(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/input_pengumuman';
		$data['title'] 			=	'Input Data Pengumuman';
		$this->load->view('admin/admin_home',$data);
	}
	/*proses untuk memasukan data ke tabel pengumuman*/
	public function proses_input_pengumuman(){
		$pengumuman 			=	$this->input->post('pengumuman');
		$data 					=	array('pengumuman' => $pengumuman);
		$this->db->insert('tbl_pengumuman',$data);
		redirect('admin/tampil_pengumuman');
	}

	

	/*Tampil Data Agama*/
	public function tampil_agama(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_agama';
		$data['title']			=	'Data Agama';
		$data['data']			=	$this->db->get('tbl_agama');
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Jabatan*/
	public function tampil_jabatan(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_jabatan';
		$data['title']			=	'Data Jabatan';
		$data['data']			=	$this->db->get('tbl_jabatan');
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Karyawan*/
	public function tampil_karyawan(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_karyawan';		
		$data['title'] 			= 	'Data Pegawai';
		$data['data'] 			= 	$this->db->query("SELECT * FROM tbl_karyawan 
													  left join (tbl_jabatan,tbl_agama) on 
													  tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan and 
													  tbl_karyawan.kd_agama=tbl_agama.kd_agama ORDER BY kd_karyawan DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Cuty*/
	public function tampil_cuty(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_cuty';
		$data['title']			=	'Data Cuty';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_cuty
													  left join tbl_karyawan on
													  tbl_cuty.nik=tbl_karyawan.nik
													  ORDER BY tbl_cuty.kd_cuty
													  DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}
     function download_arsip($kd_cuty){
         $row  = $this->db->query("SELECT * FROM tbl_cuty WHERE kd_cuty='$kd_cuty'")->row();   
         $file = FCPATH . 'assets/file_arsip/'.$row->file_arsip;
            if (file_exists($file)) 
            {
                force_download($file, file_get_contents($file));
            } 
            else 
            {
                 show_error('File not found.');
            }
        }

	/*Tampil Data Pengumuman*/
	public function tampil_pengumuman(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_pengumuman';
		$data['title']			=	'Data Pengumuman';
		$data['data']			=	$this->db->query('SELECT * FROM tbl_pengumuman ORDER BY kd_pengumuman DESC');
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Keluarga*/
	public function tampil_keluarga(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_keluarga';
		$data['title']			=	'Data Keluarga';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_keluarga
													  left join tbl_karyawan on
													  tbl_keluarga.nik=tbl_karyawan.nik
													  ORDER BY tbl_keluarga.kd_keluarga
													  DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Pendidikan*/
	public function tampil_pendidikan(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_pendidikan';
		$data['title']			=	'Data Keluarga';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_pendidikan
													  left join tbl_karyawan on
													  tbl_pendidikan.nik=tbl_karyawan.nik
													  ORDER BY tbl_pendidikan.kd_pendidikan
													  DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Absensi*/
	public function tampil_absen(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_absen';
		$data['title']			=	'Data Absensi';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_absen
													  left join tbl_karyawan on
													  tbl_absen.nik=tbl_karyawan.nik
													  ORDER BY tbl_absen.kd_absen
													  DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Tampil Data Absensi pulang*/
	public function tampil_absen_pulang(){
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/tampil_absen_pulang';
		$data['title']			=	'Data Absensi Pulang';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_absenplg
													  left join tbl_karyawan on
													  tbl_absenplg.nik=tbl_karyawan.nik
													  ORDER BY tbl_absenplg.kd_absen
													  DESC"
													  );
		$this->load->view('admin/admin_home',$data);
	}

	/*Edit Data Agama*/
	public function edit_agama($kd_agama){
		$data['kd_agama']		=	$kd_agama;
		$data['data']			=	$this->db->get_where('tbl_agama',$data);
		$data['menu']			= 	'admin/admin_menu';
		$data['content']  		=	'admin/edit_agama';
		$data['title'] 			= 	'Edit Data Agama';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses edit agama*/
	public function proses_edit_agama(){
		$kd_agama				=	$this->input->post('kd_agama');
		$agama 					=	$this->input->post('agama');
		$data 					=	array('kd_agama'	=> $kd_agama ,
										  'agama'		=> $agama
										  );
		$this->db->where('kd_agama',$kd_agama);
		$this->db->update('tbl_agama',$data);
		redirect('admin/tampil_agama');
	}

	/*Edit Data Jabatan*/
	public function edit_jabatan($kd_jabatan){
		$data['kd_jabatan']		=	$kd_jabatan;
		$data['data']			=	$this->db->get_where('tbl_jabatan',$data);
		$data['menu']			=	'admin/admin_menu';
		$data['content']  		=	'admin/edit_jabatan';
		$data['title'] 			= 	'Edit Data Jabatan';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses Edit Jabatan*/
	public function proses_edit_jabatan(){
		$kd_jabatan				= 	$this->input->post('kd_jabatan');
		$jabatan				= 	$this->input->post('jabatan');
		$data 					=	array('kd_jabatan'	=> $kd_jabatan ,
										  'jabatan'		=> $jabatan
										  );
		$this->db->where('kd_jabatan',$kd_jabatan);
		$this->db->update('tbl_jabatan',$data);
		redirect('admin/tampil_jabatan');
	}

	/*Edit Data Karyawan*/
	public function edit_karyawan($kd_karyawan){
		$data['kd_karyawan']	=	$kd_karyawan;
		$data['data']			=	$this->db->get_where('tbl_karyawan',$data);
		$data['data_jabatan']	=	$this->db->get('tbl_jabatan');
		$data['data_agama']		=	$this->db->get('tbl_agama');
		$data['menu']			=	'admin/admin_menu';
		$data['content']  		=	'admin/edit_karyawan';
		$data['title'] 			= 	'Edit Data Pegawai';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses Edit Data Karyawan*/
	public function proses_edit_karyawan(){
		$kd_karyawan			= 	$this->input->post('kd_karyawan');
		$nik					= 	$this->input->post('nik');
		$password				= 	$this->input->post('password');
		$nama_karyawan			= 	$this->input->post('nama_karyawan');
		$tempat_lahir			= 	$this->input->post('tempat_lahir');
		$tgl_lahir				= 	$this->input->post('tgl_lahir');
		$jk						= 	$this->input->post('jk');
		$no_telp				= 	$this->input->post('no_telp');
		$email					= 	$this->input->post('email');
		$alamat					= 	$this->input->post('alamat');
		$kd_agama				= 	$this->input->post('kd_agama');
		$gol_darah				= 	$this->input->post('gol_darah');
		$no_ktp					= 	$this->input->post('no_ktp');
		$kd_jabatan				= 	$this->input->post('kd_jabatan');
		$bio					= 	$this->input->post('bio');
        $foto   				= 	$_FILES['userfile']['name'];;

		if($foto == '')
		{
				$data 			= array('password' 		=> $password,										
										'nama_karyawan' => $nama_karyawan,
										'tempat_lahir' 	=> $tempat_lahir,
										'tgl_lahir' 	=> $tgl_lahir,
										'jk' 			=> $jk,
										'no_telp' 		=> $no_telp,
										'email' 		=> $email,
										'alamat' 		=> $alamat,
										'kd_agama' 		=> $kd_agama,
										'gol_darah' 	=> $gol_darah,
										'no_ktp' 		=> $no_ktp,
										'kd_jabatan' 	=> $kd_jabatan,
										'bio' 			=> $bio
										);
				$this->db->where ('kd_karyawan',$kd_karyawan);
				$this->db->update('tbl_karyawan',$data);
				redirect('admin/tampil_karyawan');
		}else{
				$config['upload_path']   = 	'assets/foto_karyawan';
        		$config['allowed_types'] = 	'gif|jpg|png|JPG|jpeg|JPEG';
        		$config['max_size']      = 	5200;
        		$config['max_width']     = 	5024;
        		$config['max_height']    = 	5768;
        		$this->load->library('upload', $config);

        		if ( ! $this->upload->do_upload()){
            		$error = array('error' => $this->upload->display_errors());
					//redirect('admin/tampil_karyawan');
				}else{
					$data 				= array('upload_data'	=> $this->upload->data());
					$dataku 			= array('password' 		=> $password,												
												'nama_karyawan' => $nama_karyawan,
												'tempat_lahir' 	=> $tempat_lahir,
												'tgl_lahir' 	=> $tgl_lahir,
												'jk' 			=> $jk,
												'no_telp' 		=> $no_telp,
												'email' 		=> $email,
												'alamat' 		=> $alamat,
												'kd_agama' 		=> $kd_agama,
												'gol_darah' 	=> $gol_darah,
												'no_ktp' 		=> $no_ktp,
												'kd_jabatan' 	=> $kd_jabatan,
												'bio' 			=> $bio,
												'foto' 			=> $foto
					  			  				);

					$this->db->where ('kd_karyawan',$kd_karyawan);
					$this->db->update('tbl_karyawan',$dataku);
					redirect('admin/tampil_karyawan');
				}
		}
	}

	/*Edit Data Pengumuman*/
	public function edit_pengumuman($kd_pengumuman){
		$data['kd_pengumuman']	=	$kd_pengumuman;
		$data['data']			=	$this->db->get_where('tbl_pengumuman',$data);
		$data['menu']			=	'admin/admin_menu';
		$data['content']  		=	'admin/edit_pengumuman';
		$data['title'] 			= 	'Edit Data Pengumuman';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses Edit Pengumuman*/
	public function proses_edit_pengumuman(){
		$kd_pengumuman			= 	$this->input->post('kd_pengumuman');
		$pengumuman				= 	$this->input->post('pengumuman');
		$data 					=	array('kd_pengumuman'	=> $kd_pengumuman ,
										  'pengumuman'		=> $pengumuman
										  );
		$this->db->where('kd_pengumuman',$kd_pengumuman);
		$this->db->update('tbl_pengumuman',$data);
		redirect('admin/tampil_pengumuman');
	}

	/*Edit Data Keluarga*/
	public function edit_keluarga($kd_keluarga){
		$data['kd_keluarga']	=	$kd_keluarga;
		$data['data']			=	$this->db->get_where('tbl_keluarga',$data);
		$data['menu']			= 	'admin/admin_menu';
		$data['content']  		=	'admin/edit_keluarga';
		$data['title'] 			= 	'Edit Data Keluarga';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses edit Keluarga*/
	public function proses_edit_keluarga(){
		$kd_keluarga			= 	$this->input->post('kd_keluarga');
		$nama					= 	$this->input->post('nama');
		$status					= 	$this->input->post('status');
		$telephone				= 	$this->input->post('telephone');
		$keterangan				= 	$this->input->post('keterangan');
		$data 					=	array('kd_keluarga'	=> $kd_keluarga ,
										  'nama'		=> $nama ,
										  'status'		=> $status ,
										  'telephone'	=> $telephone ,
										  'keterangan'	=> $keterangan 
										  );
		$this->db->where('kd_keluarga',$kd_keluarga);
		$this->db->update('tbl_keluarga',$data);
		redirect('admin/tampil_keluarga');
	}


	/*Edit Data Pendidikan*/
	public function edit_pendidikan($kd_pendidikan){
		$data['kd_pendidikan']	=	$kd_pendidikan;
		$data['data']			=	$this->db->get_where('tbl_pendidikan',$data);
		$data['menu']			= 	'admin/admin_menu';
		$data['content']  		=	'admin/edit_pendidikan';
		$data['title'] 			= 	'Edit Data Pendidikan';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses edit Pendidikan*/
	public function proses_edit_pendidikan(){
		$kd_pendidikan			= 	$this->input->post('kd_pendidikan');
		$pendidikan				= 	$this->input->post('pendidikan');
		$status					= 	$this->input->post('status');
		$data 					=	array('kd_pendidikan'	=> $kd_pendidikan ,
										  'pendidikan'		=> $pendidikan ,
										  'status'			=> $status
										  );
		$this->db->where('kd_pendidikan',$kd_pendidikan);
		$this->db->update('tbl_pendidikan',$data);
		redirect('admin/tampil_pendidikan');
	}


	/*Edit Password*/
	public function edit_password(){
		$username				=	$this->session->userdata('username');
		$data['menu']			=	'admin/admin_menu';
		$data['content']		=	'admin/edit_password';
		$data['title']			=	'Edit Password';
		$this->load->view('admin/admin_home',$data);
	}
	/*Proses Edit Password*/
	public function proses_edit_password(){
		$username				=	$this->session->userdata('username');
		$password				= 	$this->input->post('password');
		$data 					=	array('password'		=> $password 
										  );
		$this->db->where('username',$username);
		$this->db->update('tbl_admin',$data);
		redirect('admin/home');
	}

	/*Hapus Data agama*/
	public function hapus_agama($kd_agama){
		$this->db->delete('tbl_agama', array('kd_agama'=>$kd_agama));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_agama ?>");
			</script>
			<?php	
		redirect('admin/tampil_agama');		
	}


	/*Hapus Data Jabatan*/
	public function hapus_jabatan($kd_jabatan){
		$this->db->delete('tbl_jabatan', array('kd_jabatan'=>$kd_jabatan));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_jabatan ?>");
			</script>
			<?php	
		redirect('admin/tampil_jabatan');		
	}

	/*Hapus Data Karyawan*/
	public function hapus_karyawan($kd_karyawan){
		$this->db->delete('tbl_karyawan', array('kd_karyawan'=>$kd_karyawan));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_karyawan ?>");
			</script>
			<?php	
		redirect('admin/tampil_karyawan');		
	}

	/*Hapus Data Pengumuman*/
	public function hapus_pengumuman($kd_pengumuman){
		$this->db->delete('tbl_pengumuman', array('kd_pengumuman'=>$kd_pengumuman));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_pengumuman ?>");
			</script>
			<?php	
		redirect('admin/tampil_pengumuman');		
	}

	/*Hapus Data Cuty*/
	public function hapus_cuty($kd_cuty){
		$this->db->delete('tbl_cuty', array('kd_cuty'=>$kd_cuty));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_cuty ?>");
			</script>
			<?php	
		redirect('admin/tampil_cuty');		
	}

	/*Hapus Data Keluarga*/
	public function hapus_keluarga($kd_keluarga){
		$this->db->delete('tbl_keluarga', array('kd_keluarga'=>$kd_keluarga));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_keluarga ?>");
			</script>
			<?php	
		redirect('admin/tampil_keluarga');		
	}

	/*Hapus Data Pendidikan*/
	public function hapus_pendidikan($kd_pendidikan){
		$this->db->delete('tbl_pendidikan', array('kd_pendidikan'=>$kd_pendidikan));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_pendidikan ?>");
			</script>
			<?php	
		redirect('admin/tampil_pendidikan');		
	}


	public function hapus_absen_plg($kd_absen){
		$this->db->delete('tbl_absenplg', array('kd_absen'=>$kd_absen));
			?>	
			<script type="text/javascript">
			alert("sukses di hapus data <?php echo $kd_absen ?>");
			</script>
			<?php	
		redirect('admin/tampil_absen_pulang');		
	}


}

