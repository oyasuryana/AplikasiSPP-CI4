<?php

    use App\Models\Modelsiswa;
    use App\Models\Modelbayar;
    use App\Models\Modelspp;

    // untuk mengecek apakah 
    // kelas sudah digunakan di tabel siswa
    function kelasInSiswa($idKelas){
        $siswa=New Modelsiswa;
        $jml=$siswa->where('id_kelas',$idKelas)->findAll();
        return count($jml);
     } 

    // untuk mengecek apakah 
    // petugas sudah menginput pembayaran
    function petugasInPembayaran($idPetugas){
        $dataBayar=New Modelbayar;
        $jml=$dataBayar->where('id_petugas',$idPetugas)->findAll();
        return count($jml);
     } 
        
     // untuk mengecek apakah 
    // siswa sudah melakukan pembayaran
     function siswaInBayar($nisn){
        $dataBayar=New Modelbayar;
        $jml=$dataBayar->where('nisn',$nisn)->findAll();
        return count($jml);
     }

     //untuk mengecek apakah tarif SPP
     // sudah digunakan
     function tarifInSiswa($idTarif){
      $dataSiswa=New Modelsiswa;
      $jml=$dataSiswa->where('id_spp',$idTarif)->findAll();
      return $jml;
     }

   function cekJmlBayarSiswa($nis,$bln,$tahun){
      $dataBayar= New Modelbayar;
      

      $where=[
      'nisn'   => $nis,
      'bulan_bayar' =>$bln,
      'tahun_bayar' =>$tahun
      ];

         $dataSpp=$dataBayar->where($where)->findAll();
         $total_bayar=null;
         
         foreach($dataSpp as $row){
            $total_bayar = $total_bayar + $row['jumlah_bayar'];
         }
      return $total_bayar;
   }


?>