<script>
        $(document).ready(function(){

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

        function save(){
            var form = $('#form-lupapassword')[0];
            var btn = $('#btnSave');
            var formData = new FormData(form);
            

            $(form).validate({
                rules: {
                    password1: {
                        required: true,
                        minlength: 6,
                        maxlength: 256
                    },
                    password2: {
                        required: true,
                        equalTo: "#password1",
                        minlength: 6,
                        maxlength: 256
                    }
                },

                messages: {
                    password1: {
                        required: "Wajib di isi",
                        minlength: "Harus lebih dari 6 Digit"
                    },
                    password2: {
                        required: "Wajib di isi",
                        minlength: "Harus lebih dari 6 Digit",
                        equalTo: "Password Harus Sama"
                    }
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }

            });

            if($(form).valid()){
                $.ajax({
                    url: "<?php echo base_url('auth/do_resetpass/') ?>",
                    type:"POST",
                    data:formData,
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    beforeSend: function() {
                        btn.attr('disabled',true);
                        btn.html('Saving...');
                    },
                    success: function(data){
                        const obj = JSON.parse(data);
                        var sts = obj.status;
                        var msg = obj.msg;
                        mySwalalert(msg, sts);
                        window.location.href = "<?php echo base_url('auth/login'); ?>";
                    },error: function (jqXHR, textStatus, errorThrown){
                        mySwalalert('Gagal Memperbaharui Password, Coba lagi', 'warning');
                    },
                });
            }
            return false;  
        }
        
</script>