<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Daftar Tarif SPP</h2>
<p>Berikut ini daftar tarif SPP yang sudah terdaftar dalam database.</p>

<p>
<a href="/spp/tambah" class="btn btn-primary btn-sm">Tambah Tarif SPP</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
    <tr>
        <th>No</th>
        <th>Tahun Angkatan</th>
        <th>Tarif SPP</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
    $htmlData=null;
    $nomor=null;
    if(isset($ListTarifSPP)){
    foreach ($ListTarifSPP as $row){
     $nomor++;
     $htmlData ='<tr>';
     $htmlData .='<td class="text-center">'.$nomor.'</td>';
     $htmlData .='<td class="text-center">'.$row['tahun'].'</td>';
     $htmlData .='<td class="text-right">Rp. '.number_format($row['nominal'],0,',','.').'</td>';
     $htmlData .='<td class="text-center">';
     $htmlData .='<a href="/spp/edit/'.$row['id_spp'].'" class="btn btn-info btn-sm mr-1">..</a>';
     $htmlData .='<a href="/spp/hapus/'.$row['id_spp'].'" class="btn btn-danger btn-sm">x</a>';
     $htmlData .='</td>';
     $htmlData .='</tr>';
      
     echo $htmlData;
    }
}
?>
</tbody>
</table>

<?= $this->endSection() ?>

