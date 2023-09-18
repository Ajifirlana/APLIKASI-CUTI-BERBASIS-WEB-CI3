<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {
        
         function __construct(){
                parent::__construct();
                
                $this->load->library('ciqrcode');            
        $this->load->library('pdf');
         $this->load->helper(array('form', 'url','download'));
                }
        public function index(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/karyawan_utama';
                $data['title']                  =       'Dashboard';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_karyawan 
                                                                                                          left join (tbl_jabatan,tbl_agama) on 
                                                                                                          tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan and 
                                                                                                          tbl_karyawan.kd_agama=tbl_agama.kd_agama
                                                                                                          where tbl_karyawan.nik='$nik'"
                                                                                                          );
                $data['datas']                  =       $this->db->query("SELECT * FROM tbl_pengumuman ORDER BY kd_pengumuman DESC limit 1");
                $this->load->view('karyawan/karyawan_home',$data);      
        }

        public function home(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/karyawan_utama';
                $data['title']                  =       'Dashboard';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_karyawan 
                                                                                                          left join (tbl_jabatan,tbl_agama,tbl_keluarga) on 
                                                                                                          tbl_karyawan.kd_jabatan=tbl_jabatan.kd_jabatan and 
                                                                                                          tbl_karyawan.kd_agama=tbl_agama.kd_agama
                                                                                                          where tbl_karyawan.nik='$nik'"
                                                                                                          );
                $data['datas']                  =       $this->db->query("SELECT * FROM tbl_pengumuman ORDER BY kd_pengumuman DESC limit 1");
                $this->load->view('karyawan/karyawan_home',$data);
        }

        /*Edit Profil*/
        public function edit_profil($kd_karyawan){
                $data['kd_karyawan']    =       $kd_karyawan;
                $data['data']                   =   $this->db->get_where('tbl_karyawan',$data);
                $data['data_jabatan']   =       $this->db->get('tbl_jabatan');
                $data['data_agama']             =       $this->db->get('tbl_agama');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/edit_profil';
                $data['title']                  =       'Edit Profil';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Edit Profil*/
        public function proses_edit_profil(){
                $kd_karyawan                    =       $this->input->post('kd_karyawan');
                $nama_karyawan                  =       $this->input->post('nama_karyawan');
                $tempat_lahir                   =       $this->input->post('tempat_lahir');
                $tgl_lahir                              =       $this->input->post('tgl_lahir');
                $jk                                             =       $this->input->post('jk');
                $no_telp                                =       $this->input->post('no_telp');
                $email                                  =       $this->input->post('email');
                $alamat                                 =       $this->input->post('alamat');
                $kd_agama                               =       $this->input->post('kd_agama');
                $gol_darah                              =       $this->input->post('gol_darah');
                $no_ktp                                 =       $this->input->post('no_ktp');
                $bio                                    =       $this->input->post('bio');
        $foto                                   =       $_FILES['userfile']['name'];

                if($foto == '')
                {
                                $data                   = array('nama_karyawan' => $nama_karyawan,                                                                              
                                                                                'tempat_lahir'  => $tempat_lahir,
                                                                                'tgl_lahir'     => $tgl_lahir,
                                                                                'jk'                    => $jk,
                                                                                'no_telp'               => $no_telp,
                                                                                'email'                 => $email,
                                                                                'alamat'                => $alamat,
                                                                                'kd_agama'              => $kd_agama,
                                                                                'gol_darah'     => $gol_darah,
                                                                                'no_ktp'                => $no_ktp,
                                                                                'bio'                   => $bio
                                                                                );
                                $this->db->where ('kd_karyawan',$kd_karyawan);
                                $this->db->update('tbl_karyawan',$data);
                                redirect('karyawan/home');
                }else{
                                $config['upload_path']   =      'assets/foto_karyawan';
                        $config['allowed_types'] =      'gif|jpg|png|JPG|jpeg|JPEG';
                        $config['max_size']      =      5200;
                        $config['max_width']     =      5024;
                        $config['max_height']    =      5768;
                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload()){
                        $error = array('error' => $this->upload->display_errors());
                                        //redirect('admin/tampil_karyawan');
                                }else{
                                        $data                           = array('upload_data'   => $this->upload->data());
                                        $dataku                         = array('nama_karyawan' => $nama_karyawan,                                                                                      
                                                                                                'tempat_lahir'  => $tempat_lahir,
                                                                                                'tgl_lahir'     => $tgl_lahir,
                                                                                                'jk'                    => $jk,
                                                                                                'no_telp'               => $no_telp,
                                                                                                'email'                 => $email,
                                                                                                'alamat'                => $alamat,
                                                                                                'kd_agama'              => $kd_agama,
                                                                                                'bio'                   => $bio,
                                                                                                'foto'                  => $foto
                                                                                                );
                                        $this->db->where ('kd_karyawan',$kd_karyawan);
                                        $this->db->update('tbl_karyawan',$dataku);
                                        redirect('karyawan/home');
                                }
                }
        }

// PROSES PENGAJUAN CUTI

        /*Input Cuty Tahunan*/
        public function input_cuty_tahunan(){

                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );

                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_tahunan';
                $data['title']                  =       'Input Cuty Tahunan';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Input Cuty Tahunan*/
        public function proses_input_cuty_tahunan(){
                $nik=   $this->session->userdata('nik');
                $kd_karyawan=   $this->session->userdata('kd_karyawan');
                $jml_hari=      $this->input->post('jml_hari');
                $tgl_mulai=     $this->input->post('tgl_mulai');
                $tgl_akhir=     $this->input->post('tgl_akhir');
                $jenis_cuty=    $this->input->post('jenis_cuty');
                $alasan =       $this->input->post('alasan');
                $alamat_selama_cuti=    $this->input->post('alamat_selama_cuti');
                $atasan = $this->input->post('id_atasan');
                $date =  date('d-m-y');
                $filename=$_FILES['file_arsip']['name'];
                $filename= time().$filename;
                $filename = str_replace(' ','',$filename);
               
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");
                if($v->num_rows() <> 0){
                        echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                }else{

                         $config['upload_path']   =      './assets/file_arsip/';
                        $config['allowed_types'] =      'pdf';
                        $config['max_size']      =      15200;
                        $config['max_width']     =      5024;
                        $config['max_height']    =      5768;
                        $config['file_name'] = $filename;
                        $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file_arsip')){
                        $error = array('error' => $this->upload->display_errors());
                                
                }else{          
                      
                        $data=  array('nik'=> $nik ,
                        'kd_karyawan'=> $kd_karyawan,
                        'jml_hari'      => $jml_hari,
                        'tgl_mulai'=> $tgl_mulai ,
                        'tgl_akhir'             => $tgl_akhir ,
                        'jenis_cuty'            => $jenis_cuty,
                        'tgl_pengajuan' => date('d-m-y'),
                        'alamat_selama_cuti'    => $alamat_selama_cuti,
                        'alasan'                        => $alasan ,
                        'atasan'                        => $atasan,
                        'file_arsip'    => $filename,);
                        
                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                                }
                        
                }
        }

        
        /*input_cuty_besar*/
        public function input_cuty_besar(){

                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_besar';
                $data['title']                  =       'Input Cuty Besar';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses input_cuty_besar*/
        public function proses_input_cuty_besar(){
                $nik                    =       $this->session->userdata('nik');
                $kd_karyawan            =       $this->session->userdata('kd_karyawan');
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $alasan                                 =       $this->input->post('alasan');
                $atasan = $this->input->post('id_atasan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'kd_karyawan'         => $kd_karyawan,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan, 
                                                                                                  'atasan'                      => $atasan 
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }
        


        /*input_cuty_sakit*/
        public function input_cuty_sakit(){

                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_sakit';
                $data['title']                  =       'Input Cuty Sakit';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses input_cuty_sakit*/
        public function proses_input_cuty_sakit(){
                $nik                    =       $this->session->userdata('nik');
                $kd_karyawan            =       $this->session->userdata('kd_karyawan');
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $alasan                                 =       $this->input->post('alasan');

                $atasan = $this->input->post('id_atasan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'kd_karyawan'         => $kd_karyawan,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan , 
                                                                                                  'atasan'                      => $atasan 
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }
        


        /*input_cuty_melahirkan*/
        public function input_cuty_melahirkan(){

                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_melahirkan';
                $data['title']                  =       'Input Cuty melahirkan';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses input_cuty_melahirkan*/
        public function proses_input_cuty_melahirkan(){
                $nik                    =       $this->session->userdata('nik');
                $kd_karyawan            =       $this->session->userdata('kd_karyawan');
                $atasan = $this->input->post('id_atasan');
                
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $alasan                                 =       $this->input->post('alasan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'kd_karyawan'         => $kd_karyawan,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan , 
                                                                                                  'atasan'                      => $atasan 
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }
        
        


        /*input_cuty_melahirkan*/
        public function input_cuty_penting(){
                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_penting';
                $data['title']                  =       'Input Cuty penting';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses input_cuty_melahirkan*/
        public function proses_input_cuty_penting(){
                $nik                    =       $this->session->userdata('nik');
                $atasan = $this->input->post('id_atasan');
                $kd_karyawan            =       $this->session->userdata('kd_karyawan');
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $alasan                                 =       $this->input->post('alasan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'kd_karyawan'         => $kd_karyawan,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan , 
                                                                                                  'atasan'                      => $atasan
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }
        
        


        /*input_cuty_melahirkan*/
        public function input_cuty_negara(){
                $data['atasan_saya']                    =       $this->db->query("SELECT * FROM tbl_karyawan "
                                                                                                          );
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_negara';
                $data['title']                  =       'Input Cuty negara';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses input_cuty_melahirkan*/
        public function proses_input_cuty_negara(){
                $nik                    =       $this->session->userdata('nik');
                $kd_karyawan            =       $this->session->userdata('kd_karyawan');
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $atasan = $this->input->post('id_atasan');
                $alasan                                 =       $this->input->post('alasan');
                $tgl_pengajuan                  =       $this->input->post('tgl_pengajuan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'kd_karyawan'         => $kd_karyawan,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan , 
                                                                                                  'atasan'                      => $atasan 
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }
        
        
        
        /*Input Cuty UMUM*/
        public function input_cuty_umum(){
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_cuty_umum';
                $data['title']                  =       'Input Cuty Umum';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Input Cuty Umum*/
        public function proses_input_cuty_umum(){
                $nik                    =       $this->session->userdata('nik');
                $jml_hari                               =       $this->input->post('jml_hari');
                $tgl_mulai                              =       $this->input->post('tgl_mulai');
                $tgl_akhir                              =       $this->input->post('tgl_akhir');
                $jenis_cuty                             =       $this->input->post('jenis_cuty');
                $alasan                                 =       $this->input->post('alasan');
                $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


                        if($v->num_rows() <> 0){                                
                                echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
                        }else{
                                $data                                   =       array('nik'                             => $nik ,
                                                                                                  'jml_hari'            => $jml_hari,
                                                                                                  'tgl_mulai'           => $tgl_mulai ,
                                                                                                  'tgl_akhir'           => $tgl_akhir ,
                                                                                                  'jenis_cuty'          => $jenis_cuty, 
                                                                                                  'tgl_pengajuan'       => date('d-m-y'), 
                                                                                                  'alamat_selama_cuti'  => $alamat_selama_cuti, 
                                                                                                  'alasan'                      => $alasan 
                                                                                                  );
                                $this->db->insert('tbl_cuty',$data);
                                redirect('karyawan/permohonan_cuty');
                        }
        }

// PROSES PENGAJUAN CUTI

        // /*Input Cuty Umum*/
        // public function input_cuty_umum(){
        //      $data['menu']                   =       'karyawan/karyawan_menu';
        //      $data['content']                =       'karyawan/input_cuty_umum';
        //      $data['title']                  =       'Input Cuty Umum';
        //      $this->load->view('karyawan/karyawan_home',$data);
        // }
        // /*Proses Input Cuty Umum*/
        // public function proses_input_cuty_umum(){
        //      $nik                    =       $this->session->userdata('nik');
        //      $jml_hari                               =       $this->input->post('jml_hari');
        //      $tgl_mulai                              =       $this->input->post('tgl_mulai');
        //      $tgl_akhir                              =       $this->input->post('tgl_akhir');
        //      $jenis_cuty                             =       $this->input->post('jenis_cuty');
        //      $alasan                                 =       $this->input->post('alasan');
        //      $alamat_selama_cuti             =       $this->input->post('alamat_selama_cuti');
        //      $date =  date('d-m-y');
        //      $v = $this->db->query("SELECT * from tbl_cuty where nik='$nik' and tgl_pengajuan='$date'");


        //              if($v->num_rows() <> 0){                                
        //                      echo"Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok";
        //              }else{
        //                      $data                                   =       array('nik'                             => $nik ,
        //                                                                                        'jml_hari'            => $jml_hari,
        //                                                                                        'tgl_mulai'           => $tgl_mulai ,
        //                                                                                        'tgl_akhir'           => $tgl_akhir ,
        //                                                                                        'jenis_cuty'          => $jenis_cuty, 
        //                                                                                        'tgl_pengajuan'       => date('d-m-y'), 
        //                                                                                        'alamat_selama_cuti'  => $alamat_selama_cuti, 
        //                                                                                        'alasan'                      => $alasan 
        //                                                                                        );
        //                      $this->db->insert('tbl_cuty',$data);
        //                      redirect('karyawan/permohonan_cuty');
        //              }
        // }

        /*Input Data Keluarga*/
        public function input_keluarga(){
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_keluarga';
                $data['title']                  =       'Input Data Keluarga';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        public function proses_input_keluarga(){
                $nik                    =       $this->session->userdata('nik');
                $nama                                   =       $this->input->post('nama');
                $status                                 =       $this->input->post('status');
                $telephone                              =       $this->input->post('telephone');
                $keterangan                             =       $this->input->post('keterangan');
                $data                                   =       array('nik'                     => $nik ,
                                                                                  'nama'                => $nama ,
                                                                                  'status'              => $status ,
                                                                                  'telephone'   => $telephone ,
                                                                                  'keterangan'  => $keterangan
                                                                                  );
                $this->db->insert('tbl_keluarga',$data);
                redirect('karyawan/tampil_keluarga');
        }

        /*Input Data Pendidikan*/
        public function input_pendidikan(){
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/input_pendidikan';
                $data['title']                  =       'Input Data Pendidikan';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        public function proses_input_pendidikan(){
                $nik                    =       $this->session->userdata('nik');
                $pendidikan                             =       $this->input->post('pendidikan');
                $status                                 =       $this->input->post('status');
                $data                                   =       array('nik'                             => $nik ,
                                                                                  'pendidikan'          => $pendidikan ,
                                                                                  'status'                      => $status
                                                                                  );
                $this->db->insert('tbl_pendidikan',$data);
                redirect('karyawan/tampil_pendidikan');
        }

        /*Tampil Keluarga*/
        public function tampil_keluarga(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/tampil_keluarga';
                $data['title']                  =       'Data Keluarga';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_keluarga
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_keluarga.nik=tbl_karyawan.nik
                                                                                                          where tbl_keluarga.nik='$nik'
                                                                                                          ORDER BY tbl_keluarga.kd_keluarga
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }

        /*Tampil Pendidikan*/
        public function tampil_pendidikan(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/tampil_pendidikan';
                $data['title']                  =       'Data Pendidikan';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_pendidikan
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_pendidikan.nik=tbl_karyawan.nik
                                                                                                          where tbl_pendidikan.nik='$nik'
                                                                                                          ORDER BY tbl_pendidikan.kd_pendidikan
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }

        /*Tampil Data Cuty*/
        public function histori_cuty(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/histori_cuty';
                $data['title']                  =       'Data Cuty';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_cuty
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_cuty.nik=tbl_karyawan.nik
                                                                                                          where tbl_cuty.nik='$nik'
                                                                                                          ORDER BY tbl_cuty.kd_cuty
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }
                /*Tampil Data Permohonan*/
                public function permohonan(){
                        $nik                    =       $this->session->userdata('nik');
                        $data['menu']                   =       'karyawan/karyawan_menu';
                        $data['content']                =       'karyawan/permohonan';
                        $data['title']                  =       'Data Cuty';
                        $data['data']                   =       $this->db->query("SELECT * FROM tbl_cuty
                                                                                                                  left join tbl_karyawan on
                                                                                                                  tbl_cuty.nik=tbl_karyawan.nik
                                                                                                                  where tbl_cuty.nik='$nik'
                                                                                                                  ORDER BY tbl_cuty.kd_cuty
                                                                                                                  DESC"
                                                                                                                  );
        
                                                                                                                  $this->load->view('karyawan/karyawan_home',$data);
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


        function upload_arsip(){
$data['atasan'] = $this->db->query("SELECT * FROM tbl_karyawan");
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['title']                  =       'Upload Arsip';
        $data['content'] =      'karyawan/upload_arsip';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        function proses_upload_arsip(){

                $nik    = $this->session->userdata('nik');
                $kd_karyawan = $this->session->userdata('kd_karyawan');

                $persetujuan = 'Disetujui';
                
                $filename                       =       $_FILES['userfile']['name'];
                
                $config['upload_path']   =      'assets/file_arsip';
                        $config['allowed_types'] =      'jpg|png|pdf';
                        $config['max_size']      =      5200;
                        $config['max_width']     =      5024;
                        $config['max_height']    =      5768;
                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload()){
                        $error = array('error' => $this->upload->display_errors());
                                        // redirect('admin/tampil_karyawan');
                                }else{ 

                                        $data                           = array('file_arsip'    => $filename,
                                                'nik'   => $nik,
                                                'kd_karyawan'   => $kd_karyawan,
                                                'persetujuan'   => $persetujuan);
                                //var_dump($data);      
                                $this->db->where('nik',$nik);
                                $this->db->update('tbl_cuty',$data);
                                        redirect('karyawan/permohonan');

                                }
        }

        /*Tampil Data Penetapan*/
        public function tampil_penetapan(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/tampil_penetapan';
                $data['title']                  =       'Data Cuty';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_cuty
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_cuty.nik=tbl_karyawan.nik
                                                                                                          where tbl_cuty.nik='$nik'
                                                                                                          ORDER BY tbl_cuty.kd_cuty
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }

        function laporan_penetapan($id){
        
        $id = intval($id);
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
                $pdf->SetTitle('Hasil Cetak Cuti');
                // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',7);
        // mencetak string 

        $pdf->Cell(110,4,'',0,0);
        
       $cuti = $this->model_pdf->laporan_penetapan($id);
       
       date_default_timezone_set("Asia/Bangkok");
       $gambar = base_url("assets/img/logo_bnpp.png");
                $bulan = date('m');
                        
        $teks2 = 'BADAN NASIONAL PENGELOLA PERBATASAN';
        $teks3 = 'REPUBLIK INDONESIA';
        $teks5 = 'Jl. Kebon Sirih No.31A, RT.1/RW.5, Kb. Sirih, Jakarta Pusat Kode Pos 10340';
        
                $teks6 = "Jakarta, ".date('d-m-y', strtotime($cuti->tgl_pengajuan));
                $judul_isi = "SURAT IZIN CUTI ".strtoupper($cuti->jenis_cuty)."";
                $nomor_surat = "NOMOR :       CP/".date('d/m/Y');
                $kalimat_utama="Diberikan  ".$cuti->jenis_cuty." untuk tahun ".date("Y")." teruntuk pegawai";
                $textnama="Nama";
                $textnip="NIP";
                $nama_pegawai  = ":" .strtoupper($cuti->nama_karyawan);
                $nik = $cuti->nik;
                $textjabatan = "Jabatan";
          $jabatan = ": ".$cuti->jabatan;
        $satuan    ="Satuan Organisasi : DIVISI KEPEGAWAIAN";


          $nama_atasan = ":".$cuti->atasan;
          $var_atasan = $cuti->atasan;
      $get_atasan = $this->model_pdf->get_atasan($var_atasan);
    $parse_atasan= $get_atasan->nama_karyawan;

$textB = "b. Setelah selesai menjalankan cuti ".$cuti->jenis_cuty." wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa ";
        $teks7 = "KEPALA BAGIAN KEPEGAWAIAN";
        $kota ="KOTA DKI JAKARTA";
         $sekre ="KABAG";
         $qrcode = base_url("assets/img/qrcode.png");
        $name= "Gutmen Nainggolan, SH, M.HUM";
        $pembina = "197608272007031002";
        $nip ="";
        $pdf->Image($gambar,10,10,20,25);

$pdf->SetFont('Times','B','17');
$pdf->Cell(7,10,$teks2,0,1,'C');
//TEKS3
$pdf->Cell(30);
$pdf->SetFont('Times','B','18');
$pdf->Cell(0,6,$teks3,0,1,'C');

$pdf->SetFont('Times','I','8');
$pdf->Cell(25);
$pdf->Cell(0,6,$teks5,0,1,'C');
//LINE
$pdf->SetLineWidth(1);
$pdf->Line(10,36,200,36);
$pdf->SetLineWidth(0);
$pdf->Line(10,37,200,37);
//TEKS6
$pdf->Cell(20);
$pdf->SetFont('Times','b','12');
$pdf->Cell(298,20,$teks6,0,1,'C');
//judul_isi


   $pdf->SetY(50);
   $pdf->SetFont('Times','b','12');
$pdf->Cell(0,20,$judul_isi,0,1,'C');
//nomor_surat
   $pdf->SetY(58);
   $pdf->SetFont('Times','b','12');
$pdf->Cell(123,22,$nomor_surat,0,1,'');
//

   $pdf->SetY(65);
$pdf->SetFont('Times','b','12');
$pdf->Cell(125,20,$kalimat_utama,0,1,'');

//nama_pengajuan

$pdf->Ln(5);
$pdf->SetFont('Times','b','12');
$pdf->Cell(40, 10, 'Nama',0, 0, 'L');
$pdf->Cell(40, 10, ':'.strtoupper($cuti->nama_karyawan), 0, 0, 'L');

$pdf->Ln(10);
$pdf->Cell(40, 10, 'NIP', 0, 0, 'L');
$pdf->Cell(40, 10, ':'.strtoupper($cuti->nik), 0, 0, 'L');

$pdf->Ln(10);
$pdf->Cell(40, 10, 'Jabatan', 0, 0, 'L');
$pdf->Cell(0, 10, ':'.strtoupper($cuti->jabatan), 0, 1, 'L');

$pdf->Cell(40, 10, 'Satuan Organisasi', 0, 0, 'L');
$pdf->Cell(0, 10, ':KABAG BNPP', 0, 1, 'L');

$pdf->Cell(40, 10, 'Nama Atasan', 0, 0, 'L');
$pdf->Cell(0, 10, ':'.$parse_atasan , 0, 1, 'L');

$pdf->Ln(10);

$pdf->Cell(40, 10, "Selama ".$cuti->jml_hari." hari kerja.terhitung mulai tanggal ".date('d-m-Y', strtotime($cuti->tgl_mulai))." sampai dengan ".date('d-m-Y', strtotime($cuti->tgl_akhir)), 0, 0, 'L');
$pdf->Ln(10);
$pdf->Cell(40, 10, "dengan ketentuan sebagai berikut", 0, 0, 'L');
$pdf->Ln(10);

$pdf->Cell(40, 10, "Sebelum menjalankan cuti ".$cuti->jenis_cuty." wajib menyerahkan pekerjaan kepada atasan", 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(40, 10, " langsungnya", 0, 0, 'L');
// $pdf->Ln(20);
// $pdf->Cell(40,10,$isi_bawah,1,0,'C');
//satuan
//    $pdf->SetY(110);
// $pdf->SetFont('Times','b','12');
// $pdf->Cell(60,20,$ketentuan_sbg,0,1,'C');
//

//TEKS7
   $pdf->SetY(225);
$pdf->SetFont('Times','B','12');
$pdf->Cell(260,5,$teks7,0,0,'C');
//TEKS7
   $pdf->SetY(230);
$pdf->SetFont('Times','B','12');
$pdf->Cell(260,5,$kota,0,0,'C');
//TEKSAJI
   $pdf->SetY(235);
$pdf->SetFont('Times','B','12');
$pdf->Cell(260,5,$sekre,0,0,'C');
//TEKS AJI FIRLANA

   $pdf->SetY(260);
  $pdf->Image($qrcode,130,240,20,25);
//TEKS AJI
   $pdf->SetY(265);
$pdf->SetFont('Times','BU','12');
$pdf->Cell(260,5,$name,0,0,'C');
//TEKS AJI
   $pdf->SetY(270);
$pdf->SetFont('Times','B','12');
$pdf->Cell(260,5,$pembina,0,0,'C');
//TEKS7
   $pdf->SetY(270);
                $pdf->SetFont('Times','B','12');
                $pdf->Cell(155,5,$nip,0,0,'R');
    $pdf->Output();

    }





        /*Tampil Data Absensi*/
        public function tampil_absen(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/tampil_absen';
                $data['title']                  =       'Data Absen Masuk';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_absen
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_absen.nik=tbl_karyawan.nik
                                                                                                          where tbl_absen.nik='$nik'
                                                                                                          ORDER BY tbl_absen.kd_absen
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }
        public function proses_input_absen(){
                $nik                    =       $this->session->userdata('nik');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_absen where nik='$nik' and tgl='$date'");


                        if($v->num_rows() <> 0){
                                ?>
                                <script type="text/javascript">
                                        alert("Maaf !!! Anda Telah Melakukan Absen Masuk Hari ini !!!");
                                        window.location='<?php base_url(); ?>karyawan/home';
                                </script>
                                <?php                           
                        }else{
                                $data                                   =       array('nik'             => $nik ,
                                                                                                  'tgl'         => date('d-m-y')
                                                                                                  );
                                $this->db->insert('tbl_absen',$data);
                                redirect('karyawan/home');
                        }
        }

        /*Tampil Data Absensi Pulang*/
        public function tampil_absenplg(){
                $nik                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/tampil_absenplg';
                $data['title']                  =       'Data Absen Pulang';
                $data['data']                   =       $this->db->query("SELECT * FROM tbl_absenplg
                                                                                                          left join tbl_karyawan on
                                                                                                          tbl_absenplg.nik=tbl_karyawan.nik
                                                                                                          where tbl_absenplg.nik='$nik'
                                                                                                          ORDER BY tbl_absenplg.kd_absen
                                                                                                          DESC"
                                                                                                          );
                $this->load->view('karyawan/karyawan_home',$data);
        }
        public function proses_input_absenplg(){
                $nik                    =       $this->session->userdata('nik');
                $date =  date('d-m-y');
                $v = $this->db->query("SELECT * from tbl_absenplg where nik='$nik' and tgl='$date'");


                        if($v->num_rows() <> 0){
                                ?>
                                <script type="text/javascript">
                                        alert("Maaf !!! Anda Telah Melakukan Absen Pulang Hari ini !!!");
                                        window.location='<?php base_url(); ?>karyawan/home';
                                </script>
                                <?php                           
                        }else{
                                $data                                   =       array('nik'             => $nik ,
                                                                                                  'tgl'         => date('d-m-y')
                                                                                                  );
                                $this->db->insert('tbl_absenplg',$data);
                                redirect('karyawan/home');
                        }
        }

        /*Edit Data Keluarga*/
        public function edit_keluarga($kd_keluarga){
                $data['kd_keluarga']    =       $kd_keluarga;
                $data['data']                   =       $this->db->get_where('tbl_keluarga',$data);
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'Karyawan/edit_keluarga';
                $data['title']                  =       'Edit Data Keluarga';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Edit Keluarga*/
        public function proses_edit_keluarga(){
                $kd_keluarga                    =       $this->input->post('kd_keluarga');
                $nama                                   =       $this->input->post('nama');
                $status                                 =       $this->input->post('status');
                $telephone                              =       $this->input->post('telephone');
                $keterangan                             =       $this->input->post('keterangan');
                $data                                   =       array('kd_keluarga'     => $kd_keluarga ,
                                                                                  'nama'                => $nama ,
                                                                                  'status'              => $status ,
                                                                                  'telephone'           => $telephone ,
                                                                                  'keterangan'          => $keterangan 
                                                                                  );
                $this->db->where('kd_keluarga',$kd_keluarga);
                $this->db->update('tbl_keluarga',$data);
                redirect('karyawan/tampil_keluarga');
        }

        /*Edit Data Pendidikan*/
        public function edit_pendidikan($kd_pendidikan){
                $data['kd_pendidikan']  =       $kd_pendidikan;
                $data['data']                   =       $this->db->get_where('tbl_pendidikan',$data);
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'Karyawan/edit_pendidikan';
                $data['title']                  =       'Edit Data Pendidikan';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Edit Pendidikan*/
        public function proses_edit_pendidikan(){
                $kd_pendidikan                  =       $this->input->post('kd_pendidikan');
                $pendidikan                             =       $this->input->post('pendidikan');
                $status                                 =       $this->input->post('status');
                $keterangan                             =       $this->input->post('keterangan');
                $data                                   =       array('kd_pendidikan'   => $kd_pendidikan ,
                                                                                  'pendidikan'          => $pendidikan ,
                                                                                  'status'                      => $status 
                                                                                  );
                $this->db->where('kd_pendidikan',$kd_pendidikan);
                $this->db->update('tbl_pendidikan',$data);
                redirect('karyawan/tampil_pendidikan');
        }


        /*Pesan Cuty*/
        public function permohonan_cuty(){
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/permohonan_cuty';
                $data['title']                  =       'Cuty Tahunan';
                $this->load->view('karyawan/karyawan_home',$data);
        }       

        /*Edit Password*/
        public function edit_password(){
                $nik                                    =       $this->session->userdata('nik');
                $data['menu']                   =       'karyawan/karyawan_menu';
                $data['content']                =       'karyawan/edit_password';
                $data['title']                  =       'Edit Password';
                $this->load->view('karyawan/karyawan_home',$data);
        }
        /*Proses Edit Password*/
        public function proses_edit_password(){
                $nik                                    =       $this->session->userdata('nik');
                $password                               =       $this->input->post('password');
                $data                                   =       array('password'                => $password 
                                                                                  );
                $this->db->where('nik',$nik);
                $this->db->update('tbl_karyawan',$data);
                redirect('karyawan/home');
        }



}