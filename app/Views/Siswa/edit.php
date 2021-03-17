<?=$this->extend('Dashboard')?>
<?=$this->section('content');?>
<h2>Penambahan Data Siswa</h2>
<p>Silahkan masukan data siswa baru pada form dibawah ini.</p> 




<form method="POST" action='/siswa/update'>

<div class="form-group">
    <label class="font-weight-bold">Nomor Induk Siswa Nasional</label>
    <input type="text" name="txtInputNisn" class="form-control" value="<?=$detailSiswa[0]['nisn'];?>" placholder="Masukan NISN anda" autocomplete="off" required autofocus/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nomor Induk Siswa</label>
    <input type="text" value="<?=$detailSiswa[0]['nis'];?>" name="txtInputNis" class="form-control" placholder="Masukan No Induk anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nama Lengkap</label>
    <input type="text" value="<?=$detailSiswa[0]['nama'];?>" name="txtInputNama" class="form-control" placholder="Masukan Nama Lengkap Anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Kelas</label>
    <select class="form-control" name="txtPilihanKelas">
    <?php
        foreach($listKelas as $row){
            $detailSiswa[0]['id_kelas'] == $row['id_kelas'] ? $pilih='selected' : $pilih=null;
            echo '<option value="'.$row['id_kelas'].'" '.$pilih.'>'.$row['nama_kelas'].'</option>';  
        }
    ?>
    </select>
</div>

<div class="form-group">
    <label class="font-weight-bold">Alamat Lengkap</label>
    <textarea  name="txtInputAlamat" class="form-control" placholder="Masukan Alamat Lengkap Anda" required><?=$detailSiswa[0]['alamat'];?></textarea>
</div>

<div class="form-group">
    <label class="font-weight-bold">Nomor Handphone</label>
    <input type="text" name="txtInputHandphone" value="<?=$detailSiswa[0]['no_telp'];?>" class="form-control" placholder="Masukan Nomor Handphone Anda" autocomplete="off" required/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Kelas</label>
    <select class="form-control" name="txtPilihanTarif">
    <?php
        foreach($listTarifSpp as $row){
            $detailSiswa[0]['id_spp'] == $row['id_spp'] ? $pilih='selected' : $pilih=null;
            echo '<option value="'.$row['id_spp'].'" '.$pilih.'>Rp '.number_format($row['nominal'],0,',','.').'</option>';  
        }
    ?>
    </select>
</div>

<div class="form-group">
     <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>   
</div>

</form>
<?=$this->endSection();?>