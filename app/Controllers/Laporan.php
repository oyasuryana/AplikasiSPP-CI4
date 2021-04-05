<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
	public function index()
	{
		return view('/Laporan/histori-pembayaran');
	}

	public function historiBayar(){

		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('siswa.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->orderBy('tgl_bayar','asc')->findAll();

		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];

		$htmlData=null;
		$no=null;
		$htmlData .='<p>Berikut adalah histori pembayaran siswa NISN '.$this->request->getPost('txtNoIndukSiswaNasional').' :</p>';

		$htmlData .='<table class="table table-sm">';
		$htmlData .='<thead class="bg-light">
						<tr>
							<th>No</th>
							<th>Tahun</th>
							<th>Bulan</th>
							<th>Tanggal Bayar</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td>'.$no.'</td>';
			$htmlData .='<td>'.$row['tahun_bayar'].'</td>';
			$htmlData .='<td>'.$arrBulan[$row['bulan_bayar']].'</td>';
			$htmlData .='<td>'.$row['tgl_bayar'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';
		}
		$htmlData .='
					</tbody>
					</table>';

		echo $htmlData;
	}

	public function penerimaanSpp(){
		return view('Laporan/penerimaan-spp');
	}

	public function tampilkanPenerimaan(){

		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('pembayaran.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->orderBy('tgl_bayar','asc')->findAll();
		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		$htmlData=null;
		$no=null;
		$htmlData .='<p>Berikut adalah histori pembayaran siswa NISN '.$this->request->getPost('txtNoIndukSiswaNasional').' :</p>';

		$htmlData .='<table class="table table-sm">';
		$htmlData .='<thead class="bg-light">
						<tr>
							<th>No</th>
							<th>Tahun</th>
							<th>Bulan</th>
							<th>Tanggal Bayar</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td>'.$no.'</td>';
			$htmlData .='<td>'.$row['tahun_bayar'].'</td>';
			$htmlData .='<td>'.$arrBulan[$row['bulan_bayar']].'</td>';
			$htmlData .='<td>'.$row['tgl_bayar'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';
		}
		$htmlData .='
					</tbody>
					</table>';

		echo $htmlData;
	}

	public function penerimaanTampil(){
		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('pembayaran.tgl_bayar',$this->request->getPost('txtTglBayar'))->findAll();

		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		
		$htmlData=null;
		$no=null;
		$total_bayar=null;

		$htmlData .='<p>Berikut adalah laporan penerimaan SPP tanggal '.$this->request->getPost('txtTglBayar').' :</p>';

		$htmlData .='<table class="table table-sm">';
		$htmlData .='<thead class="bg-light">
						<tr>
							<th>No</th>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Kelas</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td>'.$no.'</td>';
			$htmlData .='<td>'.$row['nisn'].'</td>';
			$htmlData .='<td>'.$row['nama'].'</td>';
			$htmlData .='<td>'.$row['nama_kelas'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';

			$total_bayar=$total_bayar + $row['jumlah_bayar'];
		}
		$htmlData .='
					<tr class="bg-light">
					<td colspan="4" class="text-center font-weight-bold">Total Penerimaan</td>
					<td class="text-right font-weight-bold">'.number_format($total_bayar,0,',','.').'</td>
					</tr>
					</tbody>
					</table>';

		$htmlData .='<p>
		<a href="/laporan/download-excel/'.$this->request->getPost('txtTglBayar').'" class="btn btn-success btn-sm mr-2">Export Ke Excel</a>
		<a href="/laporan/download-pdf/'.$this->request->getPost('txtTglBayar').'" class="btn btn-danger btn-sm">Export Ke PDF</a>
		</p>';			

		echo $htmlData;		
	}	


	public function tunggakanSPP(){
		$data['listKelas']=$this->kelas->findAll();
		return view('Laporan/tunggakan-spp',$data);
	}

	public function dataTunggakan(){
		/* 
		SELECT siswa.nama,siswa.id_kelas,pembayaran.nisn, pembayaran.bulan_bayar,pembayaran.tahun_bayar,
		spp.nominal, sum(pembayaran.jumlah_bayar) as total_bayar FROM pembayaran 
		JOIN spp ON spp.id_spp=pembayaran.id_spp
		JOIN siswa ON siswa.nisn=pembayaran.nisn
		WHERE pembayaran.tahun_bayar=2021 AND pembayaran.bulan_bayar=4 AND siswa.id_kelas=4
		GROUP BY pembayaran.nisn, pembayaran.bulan_bayar,pembayaran.tahun_bayar
		*/		
		
		$where=[
			'id_kelas' =>1,
			'tahun_bayar'=>2021,
			'bulan_bayar'=>4
		];

		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('siswa.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->orderBy('tgl_bayar','asc')->findAll();
		//echo $this->request->getPost('txtIdKelas').'-'.$this->request->getPost('txtThnLaporan');
	}

}
