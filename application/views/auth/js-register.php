<script>
        $(document).ready(function(){

            $('#nik').change(function(){
                var niklength = $(this).val().length;
                if (niklength < 16){
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    mySwalalert('NIK Anda Kurang dari 16 Digit', 'info');
                } else if (niklength > 16){
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                    mySwalalert('NIK Anda tidak boleh lebih dari 16 Digit', 'info');
                } else {
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }
            });

            $('#no_telepon').change(function(){ 
                $("#checkWA").removeClass('d-none');
                $("#checkWA").html('<b>Memerika Nomor Nomor...</b>');
                var nowa=$(this).val();
                $.ajax({
                    url : "<?= base_url('api/checkNumberWA/');?>"+nowa,
                    method : "GET",
                    async : true,
                    success: function(data){
                        const obj = JSON.parse(data);
                        var onwa = obj.onwhatsapp;
                        if (onwa == "true"){
                            $("#no_telepon").removeClass('is-invalid');
                            $("#no_telepon").addClass('is-valid');
                        } else {
                            mySwalalert('Nomor Whatsaap Tidak Terdaftar', 'info');
                            $("#no_telepon").removeClass('is-valid');
                            $("#no_telepon").addClass('is-invalid');
                            $("#no_telepon").val('');
                        }
                    }, error: function (data) {
                        mySwalalert('Gagal Mengakses server WhatsApp', 'error');
                    }
                });
                return false;
            });

            $('#kode_undangan').change(function(){ 
                var kode=$(this).val();
                $.ajax({
                    url : "<?= base_url('api/kodeUndangan/');?>"+kode,
                    method : "GET",
                    async : true,
                    success: function(data){
                        const obj = JSON.parse(data);
                        var sts = obj.status;
                        if (sts == false){
                            mySwalalert('Kode Undagan Salah', 'error');
                            $("#kode_undangan").addClass('is-invalid');
                            $("#kode_undangan").val('');
                        } else if (sts == true){
                            $("#kode_undangan").removeClass('is-invalid');
                            $("#kode_undangan").addClass('is-valid');
                        }
                        
                    }
                });
                return false;
            });

        });
        
</script>