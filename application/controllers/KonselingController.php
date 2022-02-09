<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonselingController extends CI_Controller {

<<<<<<< HEAD
	public function home()
=======
	public function index()
	{
		$this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_home_konseling.php');
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');
	}
	
	public function home($id = '1')
>>>>>>> 745dc71702377033d713672830e902ee4737ebe9
	{
		$id = $this->input->post('id', TRUE);
		$this->load->model('Kategori_layanan_konseling_model','kategori_layanan_konseling');
		$this->load->model('Layanan_konseling_model','layanan_konseling');
		$data['kategori_layanan_konseling'] = $this->kategori_layanan_konseling->getAllKategori();
		$data['layanan_konseling'] = $this->layanan_konseling->getLayananKonselingByCategoryId($id);
		// tinggal load viewnya
	}

	public function daftarKonseling()
	{
		$this->load->view('');
	}
	
	public function storeDaftarKonseling()
	{
		$dataJadwal = [
			'tanggal' => $this->input->post('tanggal'),
			'jam_mulai' => $this->input->post('jam_mulai'),
			'jam_selesai' => $this->input->post('jam_selesai'),
		];
		$this->load->model('Jadwal_konseling_model','jadwal_konseling');
		$jadwal_id = $this->jadwal_konseling->storeJadwalAndReturnId($dataJadwal);
		$dataDaftarKonseling = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_wa' => $this->input->post('no_wa'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'usia' => $this->input->post('usia'),
			'domisili' => $this->input->post('domisili'),
			'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
			'keluhan' => $this->input->post('keluhan'),
			'jadwal_konseling_id' => $jadwal_id
		];
		$this->load->model('Client_konseling_model','client_konseling');
		$this->client_konseling->storeClientKonseling($dataDaftarKonseling);
	}

	public function daftarKonselor()
	{
		$this->load->view('');
	}

	public function storeDaftarKonselor()
	{
		$dataInformasiPribadi = [
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'no_hp' => $this->input->post('no_hp'),
			'no_ktp' => $this->input->post('no_ktp'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten_kota' => $this->input->post('kabupaten_kota'),
			'alamat' => $this->input->post('alamat'),
		];
		$dataPendidikanPengalaman = [
			'gelar_S1' => $this->input->post('gelar_S1'),
			'universitas_S1' => $this->input->post('universitas_S1'),
			'jurusan_S1' => $this->input->post('jurusan_S1'),
			'angkatan_S1' => $this->input->post('angkatan_S1'),
			'dari_S1' => $this->input->post('dari_S1'),
			'sampai_S1' => $this->input->post('sampai_S1'),
			'gelar_S2' => $this->input->post('gelar_S2'),
			'universitas_S2' => $this->input->post('universitas_S2'),
			'jurusan_S2' => $this->input->post('jurusan_S2'),
			'angkatan_S2' => $this->input->post('angkatan_S2'),
			'dari_S2' => $this->input->post('dari_S2'),
			'sampai_S2' => $this->input->post('sampai_S2'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'organisasi' => $this->input->post('organisasi'),
		];
		$dataInformasiRekeningBank = [
			'nama' => $this->input->post('nama_bank'),
			'alamat_cabang' => $this->input->post('alamat_cabang'),
			'nama_rekening' => $this->input->post('nama_rekening'),
			'nomor_rekening' => $this->input->post('nomor_rekening')
		];
		$this->load->model('Konselor_model','konselor');
		$informasiPribadiId = $this->konselor->storeInformasiPribadiKonselor($dataInformasiPribadi);
		$pendidikanPengalamanId = $this->konselor->storePendidikanPengalaman($dataPendidikanPengalaman);
		$informasiRekeningBankId = $this->konselor->storeInformasiRekeningBankKonselor($dataInformasiRekeningBank);

		$dataKonselor = [
			'informasi_pribadi_konselor_id' => $informasiPribadiId,
			'informasi_rekening_bank_konselor_id' => $informasiRekeningBankId,
			'pendidikan_pengalaman_konselor_id' => $pendidikanPengalamanId
		];
		$this->konselor->storeKonselor($dataKonselor);
	}

}
