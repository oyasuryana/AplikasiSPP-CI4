$(document).ready(function(){

        $("#btnCari").click(function(){
            var nisn=$('#txtNisn').val();
            var url = window.location.origin+'/bayar/detailsiswa';
            $.post(url,{txtNoIndukSiswaNasional:nisn},function(data){	
                if($.parseJSON(data)[0]!=null){					
                    $('#txtNamaSiswa').val($.parseJSON(data)[0].nama);  
                    $('#txtKelasSiswa').val($.parseJSON(data)[0].nama_kelas);
                    $('#txtTarifSpp').val($.parseJSON(data)[0].nominal);
                } else {
						// Jika Data Tidak Ditemukan
						$('#txtNamaSiswa').val('');
						$('#txtKelasSiswa').val('');
						$('#txtTarifSpp').val('');
                        $('#myModal').modal('show');
                        $('#txtNisn').focus();

                        $('#myModal').on('hidden.bs.modal', function () {
                            $('#txtNisn').val('');
                            $('#txtNisn').focus();
                          });
                }
            });
        });

});
