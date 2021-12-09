    
    <script>
        $(document).ready(function(){

            $('#ujian_via').change(function(){
                if($(this).val() == 'online'){
                    var res = "Note : <b>Link akan di kirimkan H-1 sebelum jadwal Ujian Wawancara anda, melalui WhatsApp, atau kami akan menghubungi anda, jadi pastikan nomor WhatsApp anda selalu aktif</b>";
                    $('#result').html(res);
                    
                } else {
                    $('#result').html('');
                }
            });

        });
        
        
        function save()
        {   
            $('#form-lokasi').validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($('#form-lokasi').valid()){
                $('#btnsave').text('Saving...'); //change button text
                $('#btnsave').attr('disabled',true); //set button disable
                
                var jsonObj = $('#form-lokasi').serialize();
                
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('cetak/ajax_lokasi'); ?>',
                    data: jsonObj,
                    success: function (data,status,xhr) {
                        mySwalalert('Berhasil Menyimpan Data', 'success');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        mySwalalert('Gagal Menyimpan Data', 'error');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                    }
                });
            }else{
                mySwalalert('Periksa Kembali Form anda, ada yang belum lengkap', 'info');
            }
            return false;
        }
    </script>