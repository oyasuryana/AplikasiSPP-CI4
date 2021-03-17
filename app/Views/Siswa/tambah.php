<?=$this->extend('Dashboard')?>
<?=$this->section('content');?>
<h2>Penambahan Data Siswa</h2>
<p>Silahkan masukan data siswa baru pada form dibawah ini.</p> 

<form method="POST" action='/siswa/simpan'>

<div class="form-group">
    <label class="font-weight-bold">Nomor Induk Siswa Nasional</label>
    <input type="text" name="txtInputNisn" class="form-control" placholder="Masukan NISN anda" autocomplete="off" required autofocus/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nomor Induk Siswa</label>
    <input type="text" name="txtInputNis" class="form-control" placholder="Masukan No Induk anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nama Lengkap</label>
    <input type="text" name="txtInputNama" class="form-control" placholder="Masukan Nama Lengkap Anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Kelas</label>
    <select class="form-control" name="txtPilihanKelas">
    <?php
        foreach($listKelas as $row){
            echo '<option value="'.$row['id_kelas'].'">'.$row['nama_kelas'].'</option>';  
        }
    ?>
    </select>
</div>

<div class="form-group">
    <label class="font-weight-bold">Alamat Lengkap</label>
    <textarea  name="txtInputAlamat" class="form-control" placholder="Masukan Alamat Lengkap Anda" required></textarea>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nomor Handphone</label>
    <input type="text" name="txtInputHandphone" class="form-control" placholder="Masukan Nomor Handphone Anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Kelas</label>
    <select class="form-control" name="txtPilihanTarif">
    <?php
        foreach($listTarifSpp as $row){
            echo '<option value="'.$row['id_spp'].'">Rp '.number_format($row['nominal'],0,',','.').'</option>';  
        }
    ?>
    </select>
</div>

<div class="form-group">
     <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>   
</div>

</form>
<?=$this->endSection();?>