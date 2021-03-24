$(document).ready(function(){

        $("#btnCari").click(function(){
            var nisn=$('#txtNisn').val();
            var url = window.location.origin+'/bayar/detailsiswa';
            $.post(url,{txtNoIndukSiswaNasional:nisn},function(data){	
                if($.parseJSON(data)[0]!=null){					
                    $('#txtNamaSiswa').val($.parseJSON(data)[0].nama);  
                    $('#txtKelasSiswa').val($.parseJSON(data)[0].nama_kelas);
                    $('#txtTarifSpp').val($.parseJSON(data)[0].nominal);
                    $('#txtIdKelasSiswa').val($.parseJSON(data)[0].id_kelas);
                    $('#txtIdTarifSpp').val($.parseJSON(data)[0].id_spp);
                    $('#btnSimpan').prop('disabled',false);
                } else {
						// Jika Data Tidak Ditemukan
						$('#txtNamaSiswa').val('');
						$('#txtKelasSiswa').val('');
                        $('#txtIdTarifSpp').val('');
						$('#txtTarifSpp').val('');
						$('#txtIdKelasSiswa').val('');
                        // menampilkan pesan di modal
                        $('#myModal').modal('show');

                        $('#myModal').on('hidden.bs.modal', function () {
                            $('#btnSimpan').prop('disabled',true);
                            $('#txtNisn').val('');
                            $('#txtNisn').focus();
                        });
                }
            });
        });


    $('#cariHistori').click(function(){
        var nisn=$('#txtNisn').val();
        var url = window.location.origin+'/laporan/histori';
        $.post(url,{txtNoIndukSiswaNasional:nisn},function(data){
            if(data!=null){					
                $('#hasilCariHistori').html(data);  
            }
        });	

    });


    $('#tampilLaporan').click(function(){
        var tglBayarSpp=$('#txtTglBayar').val();
        var url = window.location.origin+'/laporan/data-penerimaan';
        $.post(url,{txtTglBayar:tglBayarSpp},function(data){
            if(data!=null){
                $('#hasilCariLaporan').html(data);
            }
        });
    });

    






});