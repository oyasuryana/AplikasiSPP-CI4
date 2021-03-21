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
		$data['listPembayaran']=$this->bayar->where('siswa.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->findAll();
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
		//echo json_encode($data,JSON_FORCE_OBJECT);
	}

}
