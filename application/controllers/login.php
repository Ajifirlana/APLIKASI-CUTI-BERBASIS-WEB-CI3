<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index(){
		$this->load->view('login.php');
	}


	public function proses_login()
	{
		if(isset($_POST['login']))
		{
			$nik = $this->input->post('nik');
			$password = $this->input->post('password');
			$sql = "SELECT * FROM tbl_karyawan where nik = '".$this->db->escape_like_str($nik)."' and password = '".
			$this->db->escape_like_str($password)."'";
			$rs=$this->db->query($sql);

			if($rs->num_rows() > 0){
				$myuser = $rs->row();
				$this->session->set_userdata('nik',$myuser->nik);

				$this->session->set_userdata('kd_karyawan',$myuser->kd_karyawan);
				redirect('karyawan');
			}else{
				?>
				<script type="text/javascript">
					alert("Gagal Login !!! Password Atau Username Salah !!!");
					window.location='<?php base_url(); ?>login';
				</script>
				<?php
			}
		}
	}

	public function redirect(){
		$this->load->view('v_redirect');
	}
	public function redirect_logout(){
		$this->load->view('v_redirect_logout');	
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}