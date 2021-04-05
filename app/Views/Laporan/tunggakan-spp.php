<?=$this->extend('Dashboard');?>
<?=$this->section('content');?>
<h2>Laporan Tunggakan SPP</h2>
<p>Untuk menampilkan laporan tunggakan SPP, silahkan pilih kelas dan masukan tahun penerimaan SPP.</p>

    <div class="form-group">
        <label class="font-weight-bold">Kelas</label>
        <select class="form-control" id="txtIdKelas">
        <?php
        foreach($listKelas as $row){
            echo '<option value="'.$row['id_kelas'].'">'.$row['nama_kelas'].'</option>';

        }
        ?>
        </select>
    </div>

    <div class="form-group">
    <label class="font-weight-bold">Tahun Penerimaan SPP</label>
        <div class="input-group">
            <input type="text" class="form-control" id="txtThnLaporan" autofocus autocomplete="off">
            <div class="input-group-append">
                <button type="button" class="btn btn-primary" id="tampilTunggakan">Tampilkan</button>
            </div>
        </div>
    </div>

<div id="hasilCariLaporan"></div>
<?=$this->endSection();?>
