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
                    <input type="text" class="form-control" name="txtNisn" id="txtNisn" placeholder="Masukan nomor induk" autocomplete="off" autofocus>
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
                <input type="hidden" class="form-control" name="txtIdKelasSiswa" id="txtIdKelasSiswa" readonly>
                <input class="form-control" id="txtKelasSiswa" readonly>
            </div>    

            <div class="form-group">
                <label class="font-weight-bold">Jumlah Tagihan</label>
                <input class="form-control" name="txtTarifSpp" id="txtTarifSpp" readonly>
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Jumlah Bayar</label>
                <input type="hidden" class="form-control" name="txtIdTarifSpp" id="txtIdTarifSpp" readonly>               

                <input class="form-control" name="txtJmlBayar" id="txtJmlBayar" autocomplete="off">
            </div>    

            <div class="form-group">
                 <button class="btn btn-primary btn-sm" id="btnSimpan" disabled>Simpan Pembayaran</button>   
            </div>    
        </form>

    </div>


    <!-- bagian kanan -->
    <div class="col-md-6">
        <p>Berikut data siswa yang membayar SPP tanggal <?=date('d M Y');?> :</p>
        <?=session()->getFlashData('pesan');?>

        <table class="table table-sm">
            <thead class="bg-light text-center">
                <tr>
                    <th>#</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jml. bayar</th>
                    <th>Aksi<th>
                    </tr>
            </thead>
            <tbody>
            <?php
            $htmlData=null;
            $no=null;
            $total=null;
            foreach($listPembayaran as $bayar){
                $no++;
                $htmlData ='<tr>';
                $htmlData .='<td>'.$no.'.</td>';
                $htmlData .='<td>'.$bayar['nisn'].'</td>';
                $htmlData .='<td>'.$bayar['nama'].'</td>';
                $htmlData .='<td>'.$bayar['nama_kelas'].'</td>';
                $htmlData .='<td class="text-right">Rp. '.number_format($bayar['jumlah_bayar'],0,',','.').'</td>';
                $htmlData .='<td class="text-center">';
                $htmlData .='<a href="/bayar/hapus/'.$bayar['id_pembayaran'].'" data-confirm="Anda yakin akan menghapus data"><i class="fas fa-trash-alt"></i></a>';
        
                $htmlData .='</td>';
                $htmlData .='</tr>';
                $total=$total+$bayar['jumlah_bayar'];
                echo $htmlData;
            }
            ?>
            <tr class="font-weight-bold">
                <td colspan="4">Total</td>
                <td  class="text-right">Rp. <?=number_format($total,0,',','.');?></td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table>
    </div>

</div>

<?=$this->endSection();?>