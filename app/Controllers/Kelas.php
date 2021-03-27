<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kelas extends BaseController
{

	public function index()
	{

				
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
	
		
		$data['listKelas']=$this->kelas->findAll();
		return view('/Kelas/tampil',$data);
	}

	public function tambahKelas(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		return view('/Kelas/tambah');

	}

	public function simpanKelas(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		// 2 menampung data dari form
		$data=[
			'nama_kelas'=>$this->request->getPost('txtNamaKelas'),
			'kompetensi_keahlian'=>$this->request->getPost('txtInputKompetensi')	
		];
		// 3 menyimpan kedalam tbl
		$this->kelas->save($data);
		// 4 arahkan kembali ke tampil kelas
		return redirect()->to('/kelas');
	}


	public function editKelas($idKelas){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		// 2 ambil data kelas berdasarkan yg di klik
		$data['detailKelas']=$this->kelas->where('id_kelas',$idKelas)->find();
		return view('/Kelas/edit',$data);
	}

	public function updateKelas(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		// 2 menampung data dari form
		$data=[
			'nama_kelas'=>$this->request->getPost('txtNamaKelas'),
			'kompetensi_keahlian'=>$this->request->getPost('txtInputKompetensi')	
		];
		// 3 menjalanka proses update
		$this->kelas->update($this->request->getPost('txtIdKelas'),$data);
		// 4 arahkan ke halaman tampil kelas
		return redirect()->to('/kelas');	
	}


	public function hapusKelas($idKelas){


		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		if(kelasInSiswa($idKelas)==0){
			// 2 menjalankan perintah hapus 
			$this->kelas->where('id_kelas',$idKelas)->delete();
			return redirect()->to('/kelas');
		} else {
			return redirect()->to('/kelas')->with('pesan-error','<div class="alert alert-danger alert-duplikat">Data sudah digunakan di master siswa</div>');
		}
		// 3 jika berhasil arahkan kembali ke tampil kelas
	}


}
