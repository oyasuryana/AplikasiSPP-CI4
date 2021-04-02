<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;

class PetugasController extends BaseController
{	
	// form login
	public function index()
	{
		return view('v_login');
	}

	// proses login
	public function login()
	{
		helper(['form']);
		$aturan=[
		'txtUsername'=>'required',
		'txtPassword'=>'required'	
		];

		if($this->validate($aturan)){
		$Datapetugas = New Petugas;
		//$_POST['txtUsername'];
		$syarat = [ 
			'username'=> $this->request->getPost('txtUsername'),
		     'password'=> md5($this->request->getPost('txtPassword'))
		];	

		// select * from petugas where username'' and pass=''	
		$Userpetugas = $Datapetugas->where($syarat)->find();
		
		if(count($Userpetugas)==1){
			// menyiapkan var sesion
			$session_data=[
				'id_petugas' 	=> $Userpetugas[0]['id_petugas'],
				'username' 	=> $Userpetugas[0]['username'],
				'level'	=> $Userpetugas[0]['level'],
				'sudahkahLogin' => TRUE
			];
			// membuat session
			session()->set($session_data);
			return redirect()->to('/petugas/dashboard');

		}else{
			return redirect()->to('/petugas');
		}

	}
}

	public function logout(){
		session()->destroy();
		return redirect()->to('/petugas');
	}

	public function tampilPetugas(){
		// cek sudah logn atau belum
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		$Datapetugas = New Petugas;
		$data['ListPetugas'] = $Datapetugas->findAll();		
		return view('Petugas/tampil-petugas',$data);
	}

	public function tambahPetugas(){
		// untuk cek logim
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		return view('Petugas/tambah-petugas');
	}

	public function simpanPetugas(){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		helper(['form']);
		$Datapetugas = New Petugas;
		$datanya=[
			'nama_petugas'=>$this->request->getPost('txtInputNama'),
			'username'=>$this->request->getPost('txtInputUser'),
			'password'=>md5($this->request->getPost('txtInputPassword')),
			'level'=>$this->request->getPost('selectLevel')
		];
		$Datapetugas->insert($datanya);
		return redirect()->to('/petugas/tampil');
	}

	public function hapusPetugas($idPetugas){
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}
		
		
		if(petugasInPembayaran($idPetugas)==0){
			$Datapetugas = New Petugas;
			$Datapetugas->where('id_petugas',$idPetugas)->delete();
			return redirect()->to('/petugas/tampil');
		} else {
			return redirect()->to('/petugas/tampil')->with('pesan-error','<div class="alert alert-danger">Gagal Hapus ! User tersebut telah melakukan proses input data pembayaran</div>');
		}
		
	}

	public function editPetugas($idPetugas){
		// cek apakah sudah login ?
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		$Datapetugas = New Petugas;
		$data['detailPetugas']=$Datapetugas->where('id_petugas',$idPetugas)->findAll();
		return view('Petugas/edit-petugas',$data);
	}

	public function updatePetugas(){
		// cek apakah sudah login
		if(!session()->get('sudahkahLogin')){
			return redirect()->to('/petugas');
			exit;
		}

		// cek apakah yang login bukan admin ?
		if(session()->get('level')!='admin'){
			return redirect()->to('/petugas/dashboard');
			exit;		
		}

		$Datapetugas = New Petugas;
		// jika kotak password tidak dikosongkan	
		if($this->request->getPost('txtInputPassword')){
			$data=[
				'nama_petugas'=>$this->request->getPost('txtInputNama'),
				'password'=>md5($this->request->getPost('txtInputPassword')),
				'level'=>$this->request->getPost('selectLevel')
				];
		} else {
		// jika kotak password  dikosongkan	
		$data=[
				'nama_petugas'=>$this->request->getPost('txtInputNama'),
				'level'=>$this->request->getPost('selectLevel')
			];
		}
		// UPDATE petugas SET nama_petugas='', level='' WHERE username='' 
		// 
		$Datapetugas->update($this->request->getPost('txtInputUser'),$data);
		return redirect()->to('/petugas/tampil');
	}
}
