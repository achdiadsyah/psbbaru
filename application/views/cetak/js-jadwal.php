    
    <script>
        $(document).ready(function(){
            doAjax();
            setInterval(doAjax, 15000);
        });

        function doAjax() {
            $.ajax({
                url : "<?= base_url('cetak/ajax_get_jadwal');?>",
                async : true,
                dataType : 'json',
                beforeSend: function()
                {
                    Swal.fire({
                        title: "<div class='spinner-border text-primary' role='status'></div>",
                        html: "Mendapatkan Status Jadwal Ujian",
                        timer: 2000,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timerProgressBar: true

                    });
                },
                success: function(data){

                    var html = '<option value="">-Silahkan Pilih Jadwal-</option>';
                    var i;
                    for(i=0; i<data.result.length; i++){
                        html += '<option value="'+data.result[i].key+'"'+data.result[i].status+'>'+data.result[i].value+data.result[i].msg+'</option>';
                    }
                    
                    $('#jadwal_ujian').html(html).change();

                }
            });
        }
        
        
        function save()
        {   
            $('#form-jadwal').validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($('#form-jadwal').valid()){
                $('#btnsave').text('Saving...'); //change button text
                $('#btnsave').attr('disabled',true); //set button disable
                
                var jsonObj = $('#form-jadwal').serialize();
                
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('cetak/ajax_save_jadwal'); ?>',
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