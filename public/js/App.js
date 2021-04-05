$(document).ready(function(){

        $("#btnCari").click(function(){
            var nisn=$('#txtNisn').val();
            var url = window.location.origin+'/bayar/detailsiswa';
            $.post(url,{txtNoIndukSiswaNasional:nisn},function(data){	
                if($.parseJSON(data)[0]!=null){					
                    $('#txtNamaSiswa').val($.parseJSON(data)[0].nama);  
                    $('#txtKelasSiswa').val($.parseJSON(data)[0].nama_kelas);
                    $('#txtTarifSpp').val($.parseJSON(data)[0].nominal);
                    $('#txtJmlBayar').val($.parseJSON(data)[0].nominal);
                    $('#txtIdKelasSiswa').val($.parseJSON(data)[0].id_kelas);
                    $('#txtIdTarifSpp').val($.parseJSON(data)[0].id_spp);
                    $('#btnSimpan').prop('disabled',false);
                } else {
						// Jika Data Tidak Ditemukan
						$('#txtNamaSiswa').val('');
						$('#txtKelasSiswa').val('');
                        $('#txtIdTarifSpp').val('');
						$('#txtTarifSpp').val('');
						$('#txtJmlBayar').val('');
						$('#txtIdKelasSiswa').val('');
                        $('#myModal').find('.modal-body').text('Maaf data tidak ditemukan !');
                        // menampilkan pesan di modal
                        $('#myModal').modal('show');
                        $('#dataConfirmOK').hide();

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

    
    $('a[data-confirm]').click(function(){
        var href = $(this).attr('href');
        var url = window.location.origin ;
        $('#myModal').find('.modal-title').text('Konfirmasi');
        $('#myModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#myModal').find('.btn-custom').text('Batal');
        $('#myModal').modal('show');
        $('#dataConfirmOK').show();
        $('#dataConfirmOK').attr('href',href)
        return false;
    });

    $('#tampilTunggakan').click(function(){
        var idKelas=$('#txtIdKelas').val();
        var thnLaporan=$('#txtThnLaporan').val();
        var url=window.location.origin+'/laporan/data-tunggakan';
        $.post(url,{txtIdKelas:idKelas,txtThnLaporan:thnLaporan},function(data){
            if(data!=null){
                $('#hasilCariLaporan').html(data);
            }
        })
    });

    $(".alert").delay(2000).slideUp(200, function() {
        $(this).alert('close');
    });


});