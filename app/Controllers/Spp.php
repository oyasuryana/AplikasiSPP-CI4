<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelspp;

class Spp extends BaseController
{
	public function index()
	{
		$dataSPP = New Modelspp;
		$data['ListTarifSPP'] = $dataSPP->orderBy('tahun','desc')->findAll();
		return view('Spp/tampil',$data);
	}
	
	public function tambahSpp(){
		return view('Spp/tambah');
	}

	public function simpanSpp(){
		$dataSPP = New Modelspp;
		$datanya=[
			'tahun'=>$this->request->getPost('txtThnAngkatan'),
			'nominal'=>$this->request->getPost('txtInputNominal')
		];
		$dataSPP->save($datanya);
		return redirect()->to('/spp');
	}

	public function hapusSPP($idSPP){
		$dataSPP = New Modelspp;
		$dataSPP->where('id_spp',$idSPP)->delete();
		return redirect()->to('/spp');
	}
}
