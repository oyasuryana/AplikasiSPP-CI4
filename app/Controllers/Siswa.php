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
//		$this->buildersiswa->join('kelas','kelas.id_kelas=siswa.id_kelas');
//		$this->buildersiswa->join('spp','spp.id_spp=siswa.id_spp');

		$this->siswa->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$this->siswa->join('spp','spp.id_spp=siswa.id_spp');

		// 2. jalankan query builder
//		$data['listSiswa']=$this->buildersiswa->get()->getResult();
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

		try{
			$this->siswa->where('nisn',$nisn)->delete();
		} catch (\Exception $e) {
			throw new \Exception("Some message goes here");
		}

		return redirect()->to('/siswa');
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

}
