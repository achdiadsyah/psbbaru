    
    <script>
        $(document).ready(function(){

            // Get Data
            var my_alamat = "";            

            $.ajax({
                type: "GET",
                url: '<?= base_url('daftarulang/ajax_get'); ?>',
                async : true,
                dataType : 'json',
                success: function (data) {
                    
                    my_alamat = data.alamat;    
                    
                    $('.nama_wali').val(data.nama_wali);
                    $('#nik').html(data.nik);
                    $('#nama').html(data.nama);
                    $('#checksum').val(data.checksum);

                    if (data.status_ayah == "masih"){
                        $('#nik_ayah').prop('required',true);
                        $('#nik_ayah').prop('readonly',false);
                        
                    } else {
                        $('#nik_ayah').prop('required',false);
                        $('#nik_ayah').prop('readonly',true);
                        $('#nik_ayah').val('0');
                    }

                    if (data.status_ibu == "masih"){
                        $('#nik_ibu').prop('required',true);
                        $('#nik_ibu').prop('readonly',false);
                        
                    } else {
                        $('#nik_ibu').prop('required',false);
                        $('#nik_ibu').prop('readonly',true);
                        $('#nik_ibu').val('0');
                    }
                    
                }
            });


            // DOM AYAH
            $('.sel_dom_ayah').change(function(){
                if($(this).val() == 'beda'){
                    $('#domisili_ayah').removeClass('d-none'); 
                    $('#alamat_ayah').val('');
                } else {
                    $('#domisili_ayah').addClass('d-none');                    
                    $('#alamat_ayah').val(my_alamat);
                }
            });

            // DOM IBU
            $('.sel_dom_ibu').change(function(){
                if($(this).val() == 'beda'){
                    $('#domisili_ibu').removeClass('d-none'); 
                    $('#alamat_ibu').val('');
                } else {
                    $('#domisili_ibu').addClass('d-none');                    
                    $('#alamat_ibu').val(my_alamat);                    
                }
            });

            // DOM WALI
            $('.sel_dom_wali').change(function(){
                if($(this).val() == 'beda'){
                    $('#domisili_wali').removeClass('d-none'); 
                    $('#alamat_wali').val('');
                } else {
                    $('#domisili_wali').addClass('d-none');                    
                    $('#alamat_wali').val(my_alamat);                    
                }
            });
        });



        function save()
        {   
            $('#form-biodata').validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($('#form-biodata').valid()){
                $('#btnsave').text('Saving...'); //change button text
                $('#btnsave').attr('disabled',true); //set button disable
                
                var jsonObj = $('#form-biodata').serialize();
                
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('daftarulang/ajax_update_biodata'); ?>',
                    data: jsonObj,
                    success: function (data,status,xhr) {
                        mySwalalert('Berhasil Menyimpan Data', 'success');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                        $('#form-biodata')[0].reset();
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        mySwalalert('Gagal Menyimpan Data', 'error');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                    }
                });
            }else{
                mySwalalert('Periksa Kembali Form Biodata anda, ada yang belum lengkap', 'info');
            }
            return false;
        }
    </script>