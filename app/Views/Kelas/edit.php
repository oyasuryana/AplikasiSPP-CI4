<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Data Kelas</h2>
<p>Silahkan ubah data kelas pada form dibawah ini</p>
<form method="POST" action="/kelas/update">
<div class="form-group">
    <label class="font-weight-bold">Nama Kelas</label>

    <input type="hidden" name="txtIdKelas" class="form-control" value="<?=$detailKelas[0]['id_kelas'];?>">

    <input type="text" name="txtNamaKelas" class="form-control" placeholder="Masukan nama kelas, misal : X RPL 1" value="<?=$detailKelas[0]['nama_kelas'];?>" autocomplete="off" autofocus required>
</div>

<div class="form-group">
    <label class="font-weight-bold"> 	Kompetensi Keahlian</label>
    <input type="text" name="txtInputKompetensi" class="form-control" placeholder="Masukan nama kompetensi keahlian, misal Rekayasa Perangkat Lunak" value="<?=$detailKelas[0]['kompetensi_keahlian'];?>" autocomplete="off" required>
</div>

<div class="form-group">
    <button class="btn btn-primary">Update Kelas</button>
</div>

</form>
<?=$this->endSection();?>