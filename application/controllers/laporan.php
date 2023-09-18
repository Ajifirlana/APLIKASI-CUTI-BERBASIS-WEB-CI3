<?php 

class Laporan extends ci_controller{

	function laporan_karyawan(){
		$data['data']		= $this->db->get('tbl_karyawan');	
		$data['content']	= 'laporan/laporan_karyawan';
		$data['title']		= ' Laporan Data Pegawai';
		$data['data'] 		= 	$this->db->query("SELECT * FROM tbl_karyawan 
												  left join (tbl_jabatan,tbl_agama) on 
												  tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan and 
												  tbl_karyawan.kd_agama=tbl_agama.kd_agama 
												  ORDER BY tbl_karyawan.nik"
												  );
		$this->load->view('laporan/home_laporan',$data);
	}

	function laporan_cuty(){
		$data['data']		= $this->db->get('tbl_cuty');	
		$data['content']	= 'laporan/laporan_cuty';
		$data['title']		= ' Laporan Data Cuti';
		$data['data']			=	$this->db->query("SELECT * FROM tbl_cuty
													  left join tbl_karyawan on
													  tbl_cuty.nik=tbl_karyawan.nik
													  ORDER BY tbl_cuty.kd_cuty"
													  );
		$this->load->view('laporan/home_laporan',$data);
	}

	function laporan_cuty_karyawan(){
		$nik                = 	$this->session->userdata('nik');
		$data['data']		= 	$this->db->get('tbl_cuty');	
		$data['content']	= 	'laporan/laporan_cuty_karyawan';
		$data['title']		= 	' Laporan Data Cuti';
		$data['data']		=	$this->db->query("SELECT * FROM tbl_cuty
													  left join tbl_karyawan on
													  tbl_cuty.nik=tbl_karyawan.nik
													  where tbl_cuty.nik='$nik'
													  ORDER BY tbl_cuty.kd_cuty"
													  );
		$this->load->view('laporan/home_laporan',$data);
	}

	function laporan_cuty_admin($kd_cuty){
		$data['kd_cuty']	=	$kd_cuty;
		$data['data']		= 	$this->db->get('tbl_cuty');	
		$data['content']	= 	'laporan/laporan_cuty_karyawan';
		$data['title']		= 	' Laporan Data Cuti';
		$data['data']		=	$this->db->query("SELECT * FROM tbl_cuty
													  left join tbl_karyawan on
													  tbl_cuty.nik=tbl_karyawan.nik
													  ORDER BY tbl_cuty.kd_cuty"
													  );
		$this->load->view('laporan/home_laporan',$data);
	}

}


 ?>