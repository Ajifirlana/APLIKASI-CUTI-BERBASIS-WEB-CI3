<?php
Class Laporan_cuti extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        // ini_set(“magic_quotes_runtime”, 0);
    }
    
    function index($id){
        // echo $id;
        // die();
        $id = intval($id);
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',7);
        // mencetak string 

        $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'ANAK LAMPIRAN 1.b',0,1);
        // $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'PERATURAN BADAN KEPEGAWAIAN NEGARA',0,1);
        // $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'REPUBLIK INDONESIA',0,1);
        // $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'NO 24 TAHUN 2017',0,1);
        // $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'TENTANG',0,1);
        // $pdf->Cell(110,4,'',0,0);
        // $pdf->Cell(80,4,'TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI',0,1);
        // $pdf->Cell(110,4,'',0,1);
        // $pdf->Cell(110,4,'',0,0);

         $cuti = $this->model_pdf->detail($id);
        // echo $cuti;
        foreach ($cuti as $row){

        $pdf->Cell(190,7,'',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'FORMULIR PERMINTAAN DAN PEMBERIAN CUTI',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(180,7,'',0,1);
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(190,4,'I. DATA PEGAWAI',1,1);
        $pdf->Cell(30,4,'NAMA',1,0);
        $pdf->Cell(70,4,$row->nama_karyawan,1,0);
        $pdf->Cell(30,4,'NIP',1,0);
        $pdf->Cell(60,4,$row->nik,1,1);
        $pdf->Cell(30,4,'JABATAN',1,0);
        $pdf->Cell(70,4,$row->jabatan,1,0);
        $pdf->Cell(30,4,'MASA KERJA',1,0);
        $pdf->Cell(60,4,'',1,1);
        $pdf->Cell(30,4,'LIMIT KERJA',1,0);
        $pdf->Cell(160,4,'',1,0);

        $pdf->Cell(180,5,'',0,1);

        $pdf->Cell(190,4,'II. JENIS CUTI YANG DIAMBIL **',1,1);
        $pdf->Cell(40,4,'1. CUTI TAHUNAN',1,0);
        $pdf->Cell(50,4,'',1,0);
        $pdf->Cell(45,4,'2. CUTI BESAR',1,0);
        $pdf->Cell(55,4,'',1,1);
        $pdf->Cell(40,4,'3. CUTI SAKIT',1,0);
        $pdf->Cell(50,4,'',1,0);
        $pdf->Cell(45,4,'4. CUTI MELAHIRKAN',1,0);
        $pdf->Cell(55,4,'',1,1);
        $pdf->Cell(40,4,'5. CUTI KARENA ALASAN PENTING',1,0);
        $pdf->Cell(50,4,'',1,0);
        $pdf->Cell(45,4,'6. CUTI DILUAR TANGGUNGAN NEGARA',1,0);
        $pdf->Cell(55,4,'',1,0);

        $pdf->Cell(180,5,'',0,1);

        $pdf->Cell(190,4,'III. ALASAN CUTI',1,1);
        $pdf->Cell(190,8,$row->alasan,1,0);

        $pdf->Cell(180,9,'',0,1);

        $pdf->Cell(190,4,'IV. LAMANYA CUTI',1,1);
        $pdf->Cell(25,4,'SELAMA',1,0);
        $pdf->Cell(10,4,$row->jml_hari,1,0,'C');
        $pdf->Cell(15,4,'HARI',1,0,'C');
        $pdf->Cell(30,4,'MULAI TANGGAL',1,0);
        $pdf->Cell(50,4,$row->tgl_mulai,1,0,'C');
        $pdf->Cell(10,4,'S.D',1,0);
        $pdf->Cell(50,4,$row->tgl_akhir,1,0,'C');

        $pdf->Cell(180,5,'',0,1);

        $pdf->Cell(190,4,'V. CATATAN CUTI ***',1,1);
        $pdf->Cell(70,4,'1. CUTI TAHUNAN',1,0);
        $pdf->Cell(70,4,'2. CUTI BESAR',1,0);
        $pdf->Cell(50,4,'',1,1);
        $pdf->Cell(25,4,'TAHUN',1,0);
        $pdf->Cell(15,4,'SISA',1,0);
        $pdf->Cell(30,4,'KETERANGAN',1,0);
        $pdf->Cell(70,4,'3. CUTI SAKIT',1,0);
        $pdf->Cell(50,4,'',1,1);
        $pdf->Cell(25,4,'N. 2',1,0);
        $pdf->Cell(15,4,'',1,0);
        $pdf->Cell(30,4,'',1,0);
        $pdf->Cell(70,4,'4. CUTI MELAHIRKAN',1,0);
        $pdf->Cell(50,4,'',1,1);
        $pdf->Cell(25,4,'N. 1',1,0);
        $pdf->Cell(15,4,'',1,0);
        $pdf->Cell(30,4,'',1,0);
        $pdf->Cell(70,4,'5. CUTI KARENA ALASAN PENTING',1,0);
        $pdf->Cell(50,4,'',1,1);
        $pdf->Cell(25,4,'N. ',1,0);
        $pdf->Cell(15,4,'',1,0);
        $pdf->Cell(30,4,'',1,0);
        $pdf->Cell(70,4,'5. CUTI DILUAR TANGGUNGAN NEGARA',1,0);
        $pdf->Cell(50,4,'',1,1);

         $pdf->Cell(180,1,'',0,1);

        $pdf->Cell(190,4,'VI. ALAMAT SELAMA MENJALANKAN CUTI',1,1);
        $pdf->Cell(70,4,'Alamat Lengkap',1,0);
        $pdf->Cell(20,4,'TELEPHONE',1,0,'C');
        $pdf->Cell(100,4,$row->no_telp,1,1,'C');
        $pdf->Cell(70,19,$row->alamat_selama_cuti,1,0);
        $pdf->Cell(120,3,'HORMAT SAYA',0,1,'C');
        $pdf->Cell(70,4,'',0,0);
        $pdf->Cell(120,10,'',0,1,'C');
        $pdf->Cell(70,6,'',0,0);
        $pdf->Cell(120,3,$row->nama_karyawan,0,1,'C');
        $pdf->Cell(70,4,'',0,0);
        $pdf->Cell(60,3,'NIP :',0,0,'R');
        $pdf->Cell(60,3,$row->nik,0,1,'L');

        $pdf->Cell(180,1,'',0,1);

        $pdf->Cell(190,4,'VII. PERTIMBANGAN ATASAN LANGSUNG **',1,1);
        $pdf->Cell(33,4,'DISETUJUI',1,0);
        $pdf->Cell(43,4,'PERUBAHAN****',1,0);
        $pdf->Cell(52,4,'DITANGGUHKAN****',1,0);
        $pdf->Cell(62,4,'TIDAK DISETUJUI****',1,1);
        $pdf->Cell(33,4,'',1,0);
        $pdf->Cell(43,4,'',1,0);
        $pdf->Cell(52,4,'',1,0);
        $pdf->Cell(62,4,'',1,1);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(62,4,'',0,1);
        $pdf->Cell(180,1,'',0,1);

        $pdf->Cell(190,4,'VIII. PERTIMBANGAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **',1,1);
        $pdf->Cell(33,4,'DISETUJUI',1,0);
        $pdf->Cell(43,4,'PERUBAHAN****',1,0);
        $pdf->Cell(52,4,'DITANGGUHKAN****',1,0);
        $pdf->Cell(62,4,'TIDAK DISETUJUI****',1,1);
        $pdf->Cell(33,4,'',1,0);
        $pdf->Cell(43,4,'',1,0);
        $pdf->Cell(52,4,'',1,0);
        $pdf->Cell(62,4,'',1,1);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(62,4,'',0,1);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(9,4,'Jakarta,',0,0);
        $pdf->Cell(50,4,date('d-m-Y'),0,1);
        $pdf->Cell(62,4,'',0,1);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(62,4,'',0,1);
        $pdf->Cell(33,4,'',0,0);
        $pdf->Cell(43,4,'',0,0);
        $pdf->Cell(52,4,'',0,0);
        $pdf->Cell(62,4,'KABAG BNPP',0,1);
        $pdf->Cell(128,4,'',0,0);
        $pdf->Cell(62,4,'GUTMEN NAINGGOLAN, SH, M.HUM',0,1);
        $pdf->Cell(128,4,'',0,0);
        $pdf->Cell(62,4,'NIP 1501115',0,1);

        $pdf->Cell(180,2,'',0,1);

        $pdf->Cell(190,4,'CATATAN :',0,1);
        $pdf->Cell(190,4,'* Coret yang tidak perlu',0,1);
        $pdf->Cell(190,4,'** Pilih salah satu dengan memberi tanda centang/ceklis',0,1);
        $pdf->Cell(190,4,'*** Diisi oleh pejabat yang menangani bidang kepegawaian sebelum PNS mengajukan cuti',0,1);
        $pdf->Cell(190,4,'**** Diberi tanda centang dan alasannya',0,1);
        $pdf->Cell(190,4,'N = Cuti tahun berjalan',0,1);
        $pdf->Cell(190,4,'N-1   = Sisa Cuti 1 Tahun Sebelumnya',0,1);
        $pdf->Cell(190,4,'N-2   = Sisa Cuti Tahunan Sebelumnya',0,1);
        

        
        }
        $pdf->Output();




        /*$pdf->SetFont('Arial','',10);
        $cuti = $this->db->get('tbl_cuty')->result();
        foreach ($cuti as $row){
            $pdf->Cell(34,6,$row->kd_cuty,1,0);
            $pdf->Cell(34,6,$row->nik,1,0);
            $pdf->Cell(30,6,$row->jml_hari,1,1);
        }
        $pdf->Output();*/
    }


}