<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

	public function daftarKonseling()
	{
		$this->load->model('Konseling_model','provinsi');
		$data['provinsi'] = $this->provinsi->getProvinsi();

		$this->load->view('home_konseling/partials/head.php');
		$this->load->view('home_konseling/partials/header.php');
		$this->load->view('home_konseling/v_daftar_konselor', $data);
		$this->load->view('home_konseling/partials/footer.php');
		$this->load->view('home_konseling/partials/js.php');
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
	
	public function storeDaftarKonseling()
	{
		$dataJadwal = [
			'tanggal' => $this->input->post('tanggal',TRUE),
			'jam_mulai' => $this->input->post('jam_mulai',TRUE),
			'jam_selesai' => $this->input->post('jam_selesai',TRUE),
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
			'nama' => $this->input->post('nama_bank',TRUE),
			'alamat_cabang' => $this->input->post('alamat_cabang',TRUE),
			'nama_rekening' => $this->input->post('nama_rekening',TRUE),
			'nomor_rekening' => $this->input->post('nomor_rekening',TRUE)
		];
		var_dump($dataInformasiPribadi , $dataInformasiRekeningBank);
		die();
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
