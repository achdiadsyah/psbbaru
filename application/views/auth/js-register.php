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
                            var x = 'Nomor Whatsapp Terdaftar</b>';
                            $("#no_telepon").removeClass('is-invalid');
                            $("#no_telepon").addClass('is-valid');
                        } else {
                            var x = 'Nomor Whatsaap Tidak Terdaftar</b>';
                            $("#no_telepon").removeClass('is-valid');
                            $("#no_telepon").addClass('is-invalid');
                            $("#no_telepon").val('');
                        }
                        $("#checkWA").html(x);
                    }, error: function (data) {
                        $("#checkWA").html('Gagal Mengakses server WhatsApp</b>');
                    }
                });
                return false;
            });

        });
        
</script>