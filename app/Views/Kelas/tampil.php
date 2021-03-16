<?= $this->extend('Dashboard') ?>
<!-- pembuka section content-->
<?= $this->section('content') ?>
<h2>Daftar Kelas</h2>
<p>Berikut daftar kelas yang sudah tersimpan dalam database</p>


<a href="/kelas/tambah" class="btn btn-primary btn-sm font-weight-bold">Tambah Kelas</a>

<table class="table table-sm mt-3">
<thead class="bg-light">
    <tr>
        <th>No.</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$htmlData=null;
$noUrut=null;
if(isset($listKelas)){
    foreach($listKelas as $row){
        $noUrut++;
        $htmlData ='<tr>';
        $htmlData .='<td>'.$noUrut.'</td>';     
        $htmlData .='<td>'.$row['nama_kelas'].'</td>';     
        $htmlData .='<td>'.$row['kompetensi_keahlian'].'</td>';     
        $htmlData .='<td>';
        $htmlData .='<a href="/kelas/edit/'.$row['id_kelas'].'" class="btn btn-info btn-sm mr-2">..</a>';
        $htmlData .='<a href="/kelas/hapus/'.$row['id_kelas'].'" class="btn btn-danger btn-sm">x</a>';
        $htmlData .='</td>';
        $htmlData .='</tr>';     

        echo $htmlData;
    }
}
?>
</tbody>
</table>
<?= $this->endSection() ?>
<!-- penutup section content-->

