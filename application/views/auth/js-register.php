<script>
        $(document).ready(function(){

            $('#jalur').change(function(){
                if($(this).val() == 'undangan'){
                    $('#kode_title').removeClass('d-none');
                    $('#kode_form').removeClass('d-none');

                    $("#kode_undangan").prop('required',true);

                    $('#akademi_title').removeClass('d-none');
                    $('#akademi_form').removeClass('d-none');
                } else  {
                    $('#kode_title').addClass('d-none');
                    $('#kode_form').addClass('d-none');

                    $("#kode_undangan").prop('required',false);

                    $('#akademi_title').addClass('d-none');
                    $('#akademi_form').addClass('d-none');
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