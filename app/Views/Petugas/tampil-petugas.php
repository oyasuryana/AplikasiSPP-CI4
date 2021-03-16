<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Data Petugas</h2>
<p>Berikut ini daftar petugas pengelola aplikasi SPP yang sudah terdaftar dalam database.</p>

<p>
<a href="/petugas/tambah" class="btn btn-primary btn-sm">Tambah Petugas</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
    <tr>
        <th>No</th>
        <th>Nama Petugas</th>
        <th>Username</th>
        <th>Level User</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
    $htmlData=null;
    $nomor=null;
    foreach ($ListPetugas as $row){
     $nomor++;
     $htmlData ='<tr>';
     $htmlData .='<td>'.$nomor.'</td>';
     $htmlData .='<td>'.$row['nama_petugas'].'</td>';
     $htmlData .='<td>'.$row['username'].'</td>';
     $htmlData .='<td>'.$row['level'].'</td>';
     $htmlData .='<td class="text-center">';
     $htmlData .='<a href="/petugas/edit/'.$row['id_petugas'].'" class="btn btn-info btn-sm mr-1">..</a>';
     $htmlData .='<a href="/petugas/hapus/'.$row['id_petugas'].'" class="btn btn-danger btn-sm">x</a>';
     $htmlData .='</td>';
     $htmlData .='</tr>';
      
     echo $htmlData;
    }
?>
</tbody>
</table>

<?= $this->endSection() ?>

