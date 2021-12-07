        <script>
        
        $(document).ready(function(){
            getStatus();
        });

        function save(){
            var form = $('#form')[0];
            var formData = new FormData(form);
            $("#form").validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($("#form").valid()){
                $.ajax({
                    url: "<?php echo base_url('pembayaran/ajax_upload') ?>",
                    type:"POST",
                    data:formData,
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    beforeSend: function() {
                        $('#btnSave').attr('disabled',true);
                        $('#btnSave').html('Uploading...');
                    },
                    success: function(data){
                        const obj = JSON.parse(data);
                        var res = obj.message;
                        if (obj.status == true){
                            mySwalalert('Berhasil Upload Data', 'success');
                            $('#btnSave').attr('disabled',false);
                            $('#btnSave').html('Upload');
                            form.reset();
                            getStatus();
                        } else {
                            mySwalalert('Gagal Upload Data', 'error');
                            $('#btnSave').attr('disabled',false);
                            $('#btnSave').html('Upload');
                            form.reset();
                            getStatus();
                        }
                        

                    },error: function (jqXHR, textStatus, errorThrown){

                        mySwalalert('Gagal Upload Data', 'error');
                    },
                });
            }else{
                mySwalalert('Anda Belum Memilih File', 'info');
            }
            return false;  
        }

        function getStatus()
        {
            var nik = $("#nik").val();
            $.ajax({
                url : "<?= base_url('pembayaran/get_status/');?>"+nik,
                method : "GET",
                async : true,
                success: function(data){
                    const obj = JSON.parse(data);

                    if (obj.status == true){
                        $("#status_file").html(obj.message);
                        $("#input_file").addClass('d-none');
                    } else {
                        $("#status_file").html(obj.message);
                        $("#input_file").removeClass('d-none');
                    }
                   
                }
            });
            return false;
        }
        </script>