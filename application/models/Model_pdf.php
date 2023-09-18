 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class model_pdf extends CI_Model {

  	function detail($id) {
		// $hasil = $this->db->query(" SELECT 	tbl_cuty.nik,
		// 									tbl_cuty.jml_hari,
		// 									tbl_karyawan.nama_karyawan
		// 						 	FROM tbl_cuty
		// 							INNER JOIN tbl_karyawan ON tbl_cuty.nik=tbl_karyawan.nik
		// 							where tbl_cuty.kd_cuty
		// 							");
		// return $hasil->result();

		
		$this->db->select('tbl_cuty.nik,tbl_cuty.alasan,tbl_cuty.alamat_selama_cuti,tbl_cuty.jml_hari,tbl_cuty.tgl_mulai,tbl_cuty.tgl_akhir,tbl_cuty.jml_hari,tbl_karyawan.nama_karyawan,tbl_karyawan.no_telp,tbl_jabatan.jabatan');
		$this->db->from('tbl_cuty');
		$this->db->where('tbl_cuty.kd_cuty', $id);
		$this->db->join('tbl_karyawan', 'tbl_cuty.nik = tbl_karyawan.nik');
		$this->db->join('tbl_jabatan', 'tbl_karyawan.kd_jabatan = tbl_jabatan.kd_jabatan');
		$query = $this->db->get();
		return $query->result();
	}

	function laporan_penetapan($id){

		$this->db->select('*');
		$this->db->from('tbl_cuty');
		$this->db->join('tbl_karyawan','tbl_cuty.nik=tbl_karyawan.nik');
		$this->db->join('tbl_jabatan','tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan');
		$this->db->where('kd_cuty' , $id);

		$query = $this->db->get();
		return $query->row();
	}

	function get_atasan($var_atasan){

		$this->db->select('*');
		$this->db->from('tbl_karyawan');
		$this->db->where('nik' , $var_atasan);
		$query = $this->db->get();
		return $query->row();	
	}
				
}