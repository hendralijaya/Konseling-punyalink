<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KonselingController extends CI_Controller {

	public function index()
	{
		// $this->load->model('Kategori_layanan_konseling_model','kategori_layanan_konseling');
		// $this->load->model('Layanan_konseling_model','layanan_konseling');
		$this->load->model('Konseling_model','kategori_layanan_konseling');
		$this->load->model('Konseling_model','layanan_konseling');
		$data['kategori_layanan_konseling'] = $this->kategori_layanan_konseling->getAllKategori();
		$id = NULL !== $this->input->post('id', TRUE) ? $this->input->post('id', TRUE) : $data['kategori_layanan_konseling'][0]['id'];
		$data['layanan_konseling'] = $this->layanan_konseling->getLayananKonselingByCategoryId($id);
		$this->load->view('home_konseling/partials/head.php',$data);
		$this->load->view('home_konseling/partials/header.php',$data);
		$this->load->view('home_konseling/v_home_konseling.php',$data);
		$this->load->view('home_konseling/partials/footer.php',$data);
		$this->load->view('home_konseling/partials/js.php',$data);
	}

	public function daftarKonselor()
	{
		$this->load->model('Konseling_model','provinsi');
		$data['provinsi'] = $this->provinsi->getProvinsi();
		$this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_daftar_konselor', $data);
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');
		}
	public function storeDaftarKonselor()
	{
		// Informasi Pribadi Konselor
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_hp','No HP', 'required');
		$this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|alpha|trim');
		// $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required|alpha|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		// End Informasi Pribadi Konselor

		// Informasi Pendidikan Pengalaman
		$this->form_validation->set_rules('gelar_S1', 'Gelar S1', 'required');
		$this->form_validation->set_rules('universitas_S1', 'Universitas S1', 'required');
		$this->form_validation->set_rules('jurusan_S1', 'Jurusan S1', 'required');
		$this->form_validation->set_rules('angkatan_S1', 'Angkatan S1', 'required');
		$this->form_validation->set_rules('dari_S1', 'Dari S1', 'required');
		$this->form_validation->set_rules('sampai_S1', 'Sampai S1', 'required');
		$this->form_validation->set_rules('gelar_S2', 'Gelar S2', 'required');
		$this->form_validation->set_rules('universitas_S2', 'Universitas S2', 'required');
		$this->form_validation->set_rules('jurusan_S2', 'Jurusan S2', 'required');
		$this->form_validation->set_rules('angkatan_S2', 'Angkatan S2', 'required');
		$this->form_validation->set_rules('dari_S2', 'Dari S2', 'required');
		$this->form_validation->set_rules('sampai_S2', 'Sampai S2', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('organisasi', 'Organisasi', 'required');
		// End Informasi Pendidikan Pengalaman

		// Informasi Rekening Bank
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('alamat_cabang', 'Alamat Cabang', 'required');
		$this->form_validation->set_rules('nama_rekening', 'Nama Rekening', 'required');
		$this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
		// End Informasi Rekening Bank
		$dataInformasiPribadi = [
			'nama' => $this->input->post('nama',TRUE),
			'email' => $this->input->post('email',TRUE),
			'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
			'no_hp' => $this->input->post('no_hp',TRUE),
			'no_ktp' => $this->input->post('no_ktp',TRUE),
			'provinsi' => $this->input->post('provinsi',TRUE),
			'kabupaten_kota' => $this->input->post('kabupaten_kota',TRUE),
			'alamat' => $this->input->post('alamat',TRUE),
		];
		$dataPendidikanPengalaman = [
			'gelar_S1' => $this->input->post('gelar_S1',TRUE),
			'universitas_S1' => $this->input->post('universitas_S1',TRUE),
			'jurusan_S1' => $this->input->post('jurusan_S1',TRUE),
			'angkatan_S1' => $this->input->post('angkatan_S1',TRUE),
			'dari_S1' => $this->input->post('dari_S1',TRUE),
			'sampai_S1' => $this->input->post('sampai_S1',TRUE),
			'gelar_S2' => $this->input->post('gelar_S2',TRUE),
			'universitas_S2' => $this->input->post('universitas_S2',TRUE),
			'jurusan_S2' => $this->input->post('jurusan_S2',TRUE),
			'angkatan_S2' => $this->input->post('angkatan_S2',TRUE),
			'dari_S2' => $this->input->post('dari_S2',TRUE),
			'sampai_S2' => $this->input->post('sampai_S2',TRUE),
			'pekerjaan' => $this->input->post('pekerjaan',TRUE),
			'organisasi' => $this->input->post('organisasi',TRUE),
		];
		$dataInformasiRekeningBank = [
			'nama_bank' => $this->input->post('nama_bank',TRUE),
			'alamat_cabang' => $this->input->post('alamat_cabang',TRUE),
			'nama_rekening' => $this->input->post('nama_rekening',TRUE),
			'nomor_rekening' => $this->input->post('nomor_rekening',TRUE)
		];
		$informasiPribadiId = $this->Konseling_model->storeInformasiPribadiKonselor($dataInformasiPribadi);
		$pendidikanPengalamanId = $this->Konseling_model->storePendidikanPengalamanKonselor($dataPendidikanPengalaman);
		$informasiRekeningBankId = $this->Konseling_model->storeInformasiRekeningBankKonselor($dataInformasiRekeningBank);

		$dataKonselor = [
			'informasi_pribadi_konselor_id' => $informasiPribadiId,
			'informasi_rekening_bank_konselor_id' => $informasiRekeningBankId,
			'pendidikan_pengalaman_konselor_id' => $pendidikanPengalamanId
		];
		$idKonselor = $this->Konseling_model->storeKonselor($dataKonselor);
		$this->session->set_userdata('konselor_id',$idKonselor);
		redirect('konselingcontroller/testdasarkonselor');
	}

	public function dokumenKonselor()
	{
			// load view
			$this->load->view('home_konseling/partials/head.php');
			$this->load->view('home_konseling/partials/header.php');
			$this->load->view('home_konseling/v_dokumen.php');
			$this->load->view('home_konseling/partials/footer.php');
			$this->load->view('home_konseling/partials/js.php');
	}

	public function storeDokumenKonselor()
	{
		$fotoPas = uploadFile('foto_pas','./uploads/konselor/','jpg|png|jpeg');
		$fotoKtp = uploadFile('foto_ktp','./uploads/konselor/','jpg|png|jpeg',false);
		$fotoIjazahS1 = uploadFile('foto_ijazah_s1','./uploads/konselor/','pdf',false);
		$fotoIjazahS2 = uploadFile('foto_ijazah_s2','./uploads/konselor/','pdf',false);
		$CV = uploadFile('cv','./uploads/konselor/','pdf',false);
		$skck = uploadFile('skck','./uploads/konselor/','pdf',false);
		$npwp = uploadFile('npwp','./uploads/konselor/','pdf',false);
		$data = [
			'foto_pas' => $fotoPas,
			'foto_ktp' => $fotoKtp,
			'foto_ijazah_s1' => $fotoIjazahS1,
			'foto_ijazah_s2' => $fotoIjazahS2,
			'cv' => $CV,
			'skck' => $skck,
			'npwp' => $npwp,
			'konselor_id' => $this->session->userdata('konselor_id')
		];
		$this->Konseling_model->storeDokumenKonselor($data);
		// redirect ke menunggu verifikasi
		redirect('konselingcontroller/verifikasi');
	}
	function get_kab_kota()
    {
        // $id = $this->input->post('id');
        // $data = $this->data_model->getKabKota($id);
        // echo json_encode($data);


        // Ambil data ID Provinsi yang dikirim via ajax post
		$this->load->model('Konseling_model','kabkota');
        $id_provinsi = $this->input->post('id_provinsi');
        $kota = $this->kabkota->getKabKota($id_provinsi);


        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value='' selected='true' disabled='disabled'>Pilih Kab/Kota</option>";
        foreach ($kota as $data) {
            $lists .= "<option value='" . $data->nama . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
            // $lists = $data->nama;
        }
        $callback = array('list_kota' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }


	public function testDasarKonselor()
	{
		$data['kategori'] = $this->Konseling_model->getAllKategoriTestDasar();
		// Load view data
		$this->load->view('home_konseling/partials/head.php',$data);
		$this->load->view('home_konseling/partials/header.php',$data);
		$this->load->view('home_konseling/v_test_konselor.php',$data);
		$this->load->view('home_konseling/partials/footer.php',$data);
		$this->load->view('home_konseling/partials/js.php',$data);
	}
	
	// public function storeDaftarKonseling()
	// {
	// 	$dataJadwal = [
	// 		'tanggal' => $this->input->post('tanggal',TRUE),
	// 		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
	// 		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
	// 	];
	// 	$this->load->model('Jadwal_konseling_model','jadwal_konseling');
	// 	$jadwal_id = $this->jadwal_konseling->storeJadwalAndReturnId($dataJadwal);
	// 	$dataDaftarKonseling = [
	// 		'nama' => $this->input->post('nama'),
	// 		'email' => $this->input->post('email'),
	// 		'no_wa' => $this->input->post('no_wa'),
	// 		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
	// 		'usia' => $this->input->post('usia'),
	// 		'domisili' => $this->input->post('domisili'),
	// 		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
	// 		'keluhan' => $this->input->post('keluhan'),
	// 		'jadwal_konseling_id' => $jadwal_id
	// 	];
	// 	$this->load->model('Client_konseling_model','client_konseling');
	// 	$this->client_konseling->storeClientKonseling($dataDaftarKonseling);
	// }

	public function storeSkillKonselor()
	{
		$idKonselor = $this->session->userdata('konselor_id');
		$data = array();
		$data['konselor_id'] = $idKonselor;
		if ($this->input->post()) {
			$data['id']=$this->input->post('id',true);
			$data['subkategori_id']=$this->input->post('subkategori_id',true);
	
			$this->Konseling_model->storeSkillKonselor($data);
			redirect('konselingcontroller/dokumenKonselor');
		}
		redirect('konselingcontroller/testDasarKonselor');
	}

	public function deleteSkillKonselor()
	{
		$subkategori = $this->input->post('subkategori_id');
		$this->load->model('Konseling_model');
		$this->Konseling_model->deleteSkillKonselorById($subkategori);
	}

	public function verifikasi(){
		// SendEmail Konfirmasi
		// $idKonselor = $this->session->userdata('konselor_id');
		// $konselor = $this->konseling_model->getKonselorById($idKonselor);
		// $body = [
		// 	'email' => $konselor['email'],
		// 	'subject' => 'Selamat anda telah menjadi Konselor di Punyalink!',
		// ];
		// $this->Sendmail_model->sendmailKonselor($body);
		$this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_verifikasi.php');
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');

	}

	public function pilih_konselor(){
			// load view
			$data['kategori_konseling'] = $this->Konseling_model->getAllKategori();
		// Yang ini nanti di viewnya nanti getLayananKonselingByCategoryId
        $this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_pilih_konselor.php',$data);
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');
    }

	public function tos(){
        $this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_tos.php');
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');
    }

	public function storeTOS()
	{
		$tos = $this->input->post('tos');
		$tos = '1';
		$idKonselor = $this->session->userdata('konselor_id');
		$data = array(
			'TOS' => $tos,
		);
		$this->konseling_model->updateTOSKonselor($idKonselor,$data);
	}

	public function storePilihKategori(){
		for($total = 0; $total < count($this->input->post('chat')); $total++){
			$data[$total] = [
				'kategori_konseling_id' => $this->input->post('chat_id'),
				'materi_id' => $this->input->post('chat')[$total],
				'konselor_id' => $this->session->userdata('konselor_id')
			];
		};
		// total dh 3
		for($index = 0; $index < count($this->input->post('call')); $index++){
			$data[$index+$total] = [
				'kategori_konseling_id' => $this->input->post('call_id'),
				'materi_id' => $this->input->post('call')[$index],
				'konselor_id' => $this->session->userdata('konselor_id')
			];
		};
		$total = $index + $total;
		for($index = 0; $index < count($this->input->post('vc')); $index++){
			$data[$index+$total] = [
				'kategori_konseling_id' => $this->input->post('vc_id'),
				'materi_id' => $this->input->post('vc')[$index],
				'konselor_id' => $this->session->userdata('konselor_id')
			];
		};
		$this->Konseling_model->storeBatchMateriKonseling($data);
		// redirect ke berikutnya
	}

	// Client Konseling
	public function daftarKonseling()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
		$this->form_validation->set_rules('no_wa','Nomor WA','required|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('usia','Usia','required|numeric');
		$this->form_validation->set_rules('domisili','Domisili','required');
		$this->form_validation->set_rules('pendidikan_terakhir','Pendidikan Terakhir','required');
		$this->form_validation->set_rules('keluhan','Keluhan','required');
		if($this->form_validation->run() == FALSE) {
			// load view
			$this->load->view('home_konseling/partials/head.php');
			$this->load->view('home_konseling/partials/header.php');
			$this->load->view('home_konseling/v_daftar_konseling.php');
			$this->load->view('home_konseling/partials/footer.php');
			$this->load->view('home_konseling/partials/js.php');
		}else {
			$dataClientKonseling = [
				'nama' => $this->input->post('nama',TRUE),
				'email' => $this->input->post('email',TRUE),
				'no_wa' => $this->input->post('no_wa',TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
				'usia' => $this->input->post('usia',TRUE),
				'domisili' => $this->input->post('domisili'),
				'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
				'keluhan' => $this->input->post('keluhan',TRUE),
				'jadwal_konseling_id' => $this->session->userdata('jadwal_konseling_id'),
			];
			date_default_timezone_set('Asia/Jakarta');
			$dataOrderKonseling = [
				'order_date' => date('Y/m/d H:i:s', time()),
				'batas_akhir_pembayaran' => date('Y/m/d H:i:s', time() + (60*60*24))
			];
			$this->konseling_model->storeClientKonseling($dataClientKonseling);
			$this->konseling_model->storeOrderKonseling($dataOrderKonseling);
		}
	}

	public function jadwal(){
        $this->load->view('home_konseling/partials/head.php');
        $this->load->view('home_konseling/partials/header.php');
        $this->load->view('home_konseling/v_jadwal_konselor.php');
		$this->load->view('home_konseling/partials/footer.php');
        $this->load->view('home_konseling/partials/js.php');
    }

    public function simpan_jadwal(){
        $jumlah = count($this->input->post('jam_mulai'));
        //print_r($jumlah);die();
        for($i=0;$i<$jumlah;$i++){
            $data = array(
                    'tanggal' => $this->input->post('tanggal')[$i],
                    'mulai'=> $this->input->post('jam_mulai')[$i],
                    'selesai'=> $this->input->post('jam_selesai')[$i]
                );
            
            $this->db->insert('jadwal_konselor',$data);
        }    
    }
}
