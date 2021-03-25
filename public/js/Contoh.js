$(document).ready(function(){

    $('#btnCari').click(function(){
       var nisn= $('#txtNisn').val();
       var url = window.location.origin+'/bayar/detailsiswa';
       
       $.post(url,{txtNoIndukSiswaNasional:nisn},function(data){	
            if($.parseJSON(data)[0]!=null){					
                   $('#txtNamaSiswa').val($.parseJSON(data)[0]['nama']); 
                   $('#txtKelasSiswa').val($.parseJSON(data)[0]['nama_kelas']); 
                   $('#txtTarifSpp').val($.parseJSON(data)[0]['nominal']);
                   $('#txtIdTarifSpp').val($.parseJSON(data)[0]['id_spp']);
                   $('#btnSimpan').prop('disabled',false);
                   console.log(data); 

            } else {
                $('#txtNamaSiswa').val(''); 
                $('#txtKelasSiswa').val(''); 
                $('#txtTarifSpp').val('');
                $('#txtIdTarifSpp').val('');

                $('#myModal').on('hidden.bs.modal', function () {
                    $('#btnSimpan').prop('disabled',true);
                    $('#txtNisn').val('');
                    $('#txtNisn').focus();
                });
     }  
        });

    });






});