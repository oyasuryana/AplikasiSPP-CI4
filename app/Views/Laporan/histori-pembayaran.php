<?=$this->extend('Dashboard');?>
<?=$this->section('content');?>
<h2>Laporan Histori Pembayaran SPP</h2>
<p>Untuk menampilkan histori pembayaran SPP, silahkan masukan nomor induk siswa pada form dibawah ini.</p>

    <div class="form-group">
    <label class="font-weight-bold">Nomor Induk Siswa Nasional</label>
        <div class="input-group">
            <input type="text" class="form-control" id="txtNisn" placeholder="Masukan NISN" autofocus autocomplete="off">
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" id="cariHistori">Cari Siswa</button>
            </div>
        </div>
    </div>

<div id="hasilCariHistori"></div>
<?=$this->endSection();?>
