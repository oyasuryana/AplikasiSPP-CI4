<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// inheritance dari BaseController
class Spp extends BaseController
{
	
	public function index()
	{
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		$data['ListTarifSPP'] = $this->spp->orderBy('tahun','desc')->findAll();
		return view('Spp/tampil',$data);
	}
	
	public function tambahSpp(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		return view('Spp/tambah');
	}

	public function simpanSpp(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		$datanya=[
			'tahun'=>$this->request->getPost('txtThnAngkatan'),
			'nominal'=>$this->request->getPost('txtInputNominal')
		];
		$this->spp->save($datanya);
		return redirect()->to('/spp');
	}

	public function hapusSPP($idSPP){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		if(tarifInSiswa($idSPP)==0){		
			$this->spp->where('id_spp',$idSPP)->delete();
			return redirect()->to('/spp');
		} else {
			return redirect()->to('/spp')->with('pesan-error','<div class="alert alert-danger">Gagal Hapus ! Tarif SPP sudah digunakan </div>');
		}
	}

	public function editSpp($idSPP){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		$data['detailTarifSPP'] = $this->spp->where('id_spp',$idSPP)->findAll();
		return view('Spp/edit',$data);
	}

	public function updateSpp(){
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		$datanya=[
			'tahun'=>$this->request->getPost('txtThnAngkatan'),
			'nominal'=>$this->request->getPost('txtInputNominal')
		];
		$this->spp->update($this->request->getPost('txtIdSpp'),$datanya);
		return redirect()->to('/spp');
	}

	public function testCekBayar(){
		echo jmlBayarSiswa('001','3','2021');

	}


}
