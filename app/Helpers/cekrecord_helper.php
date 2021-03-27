<?php

    use App\Models\Modelsiswa;
    
    // untuk mengecek apakah 
    // id_kelas sudah digunakan di tabel siswa
    function kelasInSiswa($key){
        $siswa=New Modelsiswa;
        $jml=$siswa->where('id_kelas',$key)->findAll();
        return count($jml);
     } 
?>