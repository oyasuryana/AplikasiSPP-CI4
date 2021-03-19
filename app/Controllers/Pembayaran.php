<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
	public function index()
	{
		$data['listKelas']=$this->kelas->findAll();
		return view('Bayar/form-bayar',$data);
	}

	public function detailSiswa(){
		$this->siswa->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$this->siswa->join('spp','spp.id_spp=siswa.id_spp');
		$data=$this->siswa->where('nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->find();
		echo json_encode($data,JSON_FORCE_OBJECT);
	}
}
