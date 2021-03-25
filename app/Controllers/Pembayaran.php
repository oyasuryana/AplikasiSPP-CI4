<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pembayaran extends BaseController
{
	public function index()
	{
		// ambil data pembayar pada tgl tsb
		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('tgl_bayar',date('Y-m-d'))->findAll();
		$data['waktu']=$this->waktu;

		return view('Bayar/form-bayar',$data);
	}

	public function simpanBayar(){
		date_default_timezone_set('Asia/Jakarta');
		$dataPembayaran=[
			'id_petugas'	=> session()->get('id_petugas'),
			'nisn'			=> $this->request->getPost('txtNisn'),
			'tgl_bayar'		=> date('Y-m-d'),
			'bulan_bayar'	=> date('n'),
			'tahun_bayar'	=> date('Y'),
			'id_spp'		=> $this->request->getPost('txtIdTarifSpp'),
			'jumlah_bayar'	=> $this->request->getPost('txtTarifSpp') 			
		];	
		$this->bayar->insert($dataPembayaran);
		return redirect()->to('/bayar');	
	}

	public function detailSiswa(){
		$this->siswa->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$this->siswa->join('spp','spp.id_spp=siswa.id_spp');
		$data=$this->siswa->where('nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->find();

		echo json_encode($data,JSON_FORCE_OBJECT);
	}

	public function hapusBayar($idBayar){
		$this->bayar->delete($idBayar);
		return redirect()->to('/bayar');	
	}
}
