<?=$this->extend('Dashboard');?>
<?=$this->section('content');?>
<h2>Form Pembayaran SPP</h2>


<div class="row">
    <!-- bagian kiri -->
    <div class="col-md-6">
        <p>Silahkan masukan data pembayaran SPP pada form dibawah ini</p>
        <form method="POST" action="/bayar/simpan">

        <div class="form-group">
                <label class="font-weight-bold">Nomor Induk Siswa Nasional</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="txtNisn" placeholder="Masukan nomor induk" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" id="btnCari">Cari</button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Tanggal </label>
                <input type="text" class="form-control" value="<?=date('d M Y H:i:s');?>" readonly>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Nama Siswa</label>
                <input class="form-control" id="txtNamaSiswa" readonly>
            </div>    

            <div class="form-group">
                <label class="font-weight-bold">Kelas</label>
                <input class="form-control" id="txtKelasSiswa" readonly>
            </div>    

            <div class="form-group">
                <label class="font-weight-bold">Tarif SPP</label>
                <input class="form-control" id="txtTarifSpp" readonly>
            </div>    

            <div class="form-group">
                 <button class="btn btn-primary btn-sm">Simpan Pembayaran</button>   
            </div>    
        </form>
    </div>


    <!-- bagian kanan -->
    <div class="col-md-6">
        <p>Berikut data siswa yang membayar SPP hari ini :</p>
        <table class="table table-sm">
            <thead class="bg-light">
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jml. bayar</th>
                    </tr>
            </thead>
        </table>
    </div>

</div>

<?=$this->endSection();?>