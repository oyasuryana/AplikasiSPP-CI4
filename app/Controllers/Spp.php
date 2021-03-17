<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Spp extends BaseController
{
	
	public function index()
	{
		$data['ListTarifSPP'] = $this->spp->orderBy('tahun','desc')->findAll();
		return view('Spp/tampil',$data);
	}
	
	public function tambahSpp(){
		return view('Spp/tambah');
	}

	public function simpanSpp(){
		$datanya=[
			'tahun'=>$this->request->getPost('txtThnAngkatan'),
			'nominal'=>$this->request->getPost('txtInputNominal')
		];
		$this->spp->save($datanya);
		return redirect()->to('/spp');
	}

	public function hapusSPP($idSPP){
		$this->spp->where('id_spp',$idSPP)->delete();
		return redirect()->to('/spp');
	}
}
