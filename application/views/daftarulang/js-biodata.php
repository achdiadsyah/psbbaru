    
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
                    $('.status_wali').val(data.status_wali);
                    $('#nik').html(data.nik);
                    $('#nama').html(data.nama);
                    $('#nik_2').val(data.nik);

                    if(data.status_ayah == 'masih'){
                        $('#nik_ayah').prop('readonly',false);
                        $('#agama_ayah').prop('readonly',false);
                    } else {
                        $('#nik_ayah').prop('readonly',true);
                        $('#nik_ayah').prop('required',false);
                        $('#agama_ayah').prop('readonly',true);
                    }

                    if(data.status_ibu == 'masih'){
                        $('#nik_ibu').prop('readonly',false);
                        $('#agama_ibu').prop('readonly',false);
                    } else {
                        $('#nik_ibu').prop('readonly',true);
                        $('#nik_ibu').prop('required',false);
                        $('#agama_ibu').prop('readonly',true);
                    }
                    
                }
            });


            // DOM AYAH
            $('.sel_dom_ayah').change(function(){
                if($(this).val() == 'beda'){
                    $('#alamat_ayah').prop('readonly',false);
                    $('#alamat_ayah').val('');
                } else if($(this).val() == 'sama'){
                    $('#alamat_ayah').prop('readonly',true);
                    $('#alamat_ayah').val(my_alamat);
                } else if($(this).val() == 'meninggal'){
                    $('#alamat_ayah').prop('readonly',true);
                    $('#alamat_ayah').val('Sudah Meninggal');
                }
            });

            // DOM IBU
            $('.sel_dom_ibu').change(function(){
                if($(this).val() == 'beda'){
                    $('#alamat_ibu').prop('readonly',false);
                    $('#alamat_ibu').val('');
                } else if($(this).val() == 'sama'){
                    $('#alamat_ibu').prop('readonly',true);
                    $('#alamat_ibu').val(my_alamat);
                } else if($(this).val() == 'meninggal'){
                    $('#alamat_ibu').prop('readonly',true);
                    $('#alamat_ibu').val('Sudah Meninggal');
                }
            });

            // DOM WALI
            $('.sel_dom_wali').change(function(){
                if($(this).val() == 'beda'){
                    $('#alamat_wali').prop('readonly',false);
                    $('#alamat_wali').val('');
                } else {
                    $('#alamat_wali').prop('readonly',true);
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
                
                
                var jsonObj = $('#form-biodata').serialize();
                
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('daftarulang/ajax_update_biodata'); ?>',
                    data: jsonObj,
                    beforeSend: function()
                    {
                        $('#btnsave').text('Saving...'); //change button text
                        $('#btnsave').attr('disabled',true); //set button disable
                    },
                    success: function (data) {
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