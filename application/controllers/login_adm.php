<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_adm extends CI_Controller {

	function index(){
		$this->load->view('login_adm.php');
	}


	public function proses_login_adm(){
		if(isset($_POST['login_adm'])){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$sql = "SELECT * FROM tbl_admin where username ='".$this->db->escape_like_str($username)."' and password ='".$this->db->escape_like_str($password)."'";
			$rs=$this->db->query($sql);

			if($rs->num_rows() > 0){
				$myuser = $rs->row();
				$this->session->set_userdata('username',$myuser->username);
				$this->session->set_userdata('role',$myuser->role);
				redirect('admin');
			}else{
				?>
				<script type="text/javascript">
					alert("Gagal Login !!! Password Atau Username Salah !!!");
					window.location='<?php base_url(); ?>login_adm';
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
		redirect('login_adm');
	}

}