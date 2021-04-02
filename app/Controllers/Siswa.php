<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Siswa extends BaseController
{
	public function index()
	{
		
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		// 2. query builder data siswa

		$this->siswa->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$this->siswa->join('spp','spp.id_spp=siswa.id_spp');

		// 2. jalankan query builder
		$data['listSiswa']=$this->siswa->findAll();
		
		// 3. kirim ke view
		return view('Siswa/tampil',$data);
	}

	public function tambahSiswa(){
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		// 2. ambil data kelas
		$data['listKelas']=$this->kelas->findAll();
		
		// 3. ambil data spp
		$data['listTarifSpp']=$this->spp->findAll();

		// 3. tampilkan form
		return view('Siswa/tambah',$data);
	} 

	public function simpanSiswa(){
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		$dataSiswa=[
			'nisn'=>$this->request->getPost('txtInputNisn'),
			'nis'=>$this->request->getPost('txtInputNis'),
			'nama'=>$this->request->getPost('txtInputNama'),
			'id_kelas'=>$this->request->getPost('txtPilihanKelas'),
			'alamat'=>$this->request->getPost('txtInputAlamat'),
			'no_telp'=>$this->request->getPost('txtInputHandphone'),
			'id_spp'=>$this->request->getPost('txtPilihanTarif'),
			'password'=>md5('123')
		];

		$this->siswa->insert($dataSiswa);
		return redirect()->to('/siswa');
	}

	public function hapusSiswa($nisn){
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		if(siswaInBayar($nisn)==0){
			$this->siswa->where('nisn',$nisn)->delete();
			return redirect()->to('/siswa');
		} else {
			return redirect()->to('/siswa')->with('pesan-error','<div class="alert alert-danger">Gagal Hapus ! Siswa sudah melakukan pembayaran </div>');
		}
	}

	public function editSiswa($nisn){
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		// 2. ambil data kelas
		$data['listKelas']=$this->kelas->findAll();
		
		// 3. ambil data spp
		$data['listTarifSpp']=$this->spp->findAll();

		// 4. ambil data siswa
		$data['detailSiswa']=$this->siswa->where('nisn',$nisn)->find();

		// 5. tampilkan form
		return view('Siswa/edit',$data);

	}

	public function updateSiswa(){
		// 1. cek apakah yang login bukan admin
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		$dataSiswa=[
			'nis'=>$this->request->getPost('txtInputNis'),
			'nama'=>$this->request->getPost('txtInputNama'),
			'id_kelas'=>$this->request->getPost('txtPilihanKelas'),
			'alamat'=>$this->request->getPost('txtInputAlamat'),
			'no_telp'=>$this->request->getPost('txtInputHandphone'),
			'id_spp'=>$this->request->getPost('txtPilihanTarif')
		];

		$this->siswa->update($this->request->getPost('txtInputNisn'),$dataSiswa);
		return redirect()->to('/siswa');
	}

	public function loginSiswa(){

		$syarat = [ 
			'nisn'=> $this->request->getPost('txtUsername'),
		    'password'=> md5($this->request->getPost('txtPassword'))
		];	

		$dataSiswa=$this->siswa->where($syarat)->find();

		if(count($dataSiswa)==1){
			$dataSession=[
				'nisn'=>$dataSiswa[0]['nisn'],
				'nama'=>$dataSiswa[0]['nama'],
				'sudahkahSiswaLogin' => TRUE
			];


			session()->set($dataSession);
			return redirect()->to('/dashboard/siswa');
		} else {
			return redirect()->to('/');
		}
	}

	public function dashboardSiswa(){
		$data['intro']='<div class="jumbotron mt-5">
		<h1>Hai, '.session()->get('nama').'</h1>
		<p>Silahkan gunakan halaman ini untuk menampilkan informasi SPP anda !</p>
		<p>Tanggal Login : '.date('d M Y').', waktu menunjukan : '.date('H:i:s').' wib.</p>
	  </div>';
		return view('/Home/Dashboard',$data);
	}

	public function historiPembayaran(){
		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['historiBayar']=$this->bayar->where('pembayaran.nisn',session()->get('nisn'))->findAll();

		$data['arrBulan']=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
	
		return view('/Home/HistoriBayar',$data);
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/');
	}

}
