<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Penambahan Tarif SPP</h2>
<p>Silahkan gunakan form dibawah ini untuk menambah tarif SPP.</p>


<form method="POST" action="/spp/update">
<div class="form-group">
    <label class="font-weight-bold">Tahun Angkatan</label>
    <input type="hidden" name="txtIdSpp" value="<?=$detailTarifSPP[0]['id_spp'];?>" class="form-control">
    <input type="text" name="txtThnAngkatan" value="<?=$detailTarifSPP[0]['tahun'];?>" class="form-control" placeholder="Masukan tahun angkatan, misal : 2020" autocomplete="off" autofocus>
</div>

<div class="form-group">
    <label class="font-weight-bold">Tarif SPP</label>
    <input type="text" name="txtInputNominal" value="<?=$detailTarifSPP[0]['nominal'];?>" class="form-control" placeholder="Masukan besarnya tarif, misal 200000" autocomplete="off">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-sm">Simpan Tarif SPP</button>
</div>

</form>
<?= $this->endSection() ?>

