        <script>
        
        $(document).ready(function(){
            getStatus();
        });

        function save(){
            var form = $('#form')[0];
            var btn = $('#btnSave');
            var formData = new FormData(form);
            var nik = $('#nik').val()
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
                    url: "<?php echo cdn_file('file/upload/') ?>",
                    type:"POST",
                    data:formData,
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    beforeSend: function() {
                        btn.attr('disabled',true);
                        btn.html('Uploading...');
                        $("body").css("cursor", "progress");
                    },
                    success: function(data){
                        const objdata = JSON.parse(data);
                        if (objdata.status == true){

                            $.ajax({
                                type: "GET",
                                url: '<?= base_url('pembayaran/ajax_update/'); ?>'+nik,
                                success: function (data2) {
                                    $("body").css("cursor", "default");
                                    mySwalalert(objdata.msg, 'success');
                                    btn.attr('disabled',false);
                                    btn.html('Upload');
                                    form.reset();
                                    getStatus();

                                },error: function (jqXHR, textStatus, errorThrown){
                                    $("body").css("cursor", "default");
                                    mySwalalert(objdata2.msg, 'error');
                                    btn.attr('disabled',false);
                                    btn.html('Upload');
                                    form.reset();
                                    getStatus();

                                }
                            });

                        } else {

                            $("body").css("cursor", "default");
                            mySwalalert(objdata.msg, 'error');
                            btn.attr('disabled',false);
                            btn.html('Upload');
                            form.reset();
                            getStatus();
                        }

                    },error: function (jqXHR, textStatus, errorThrown){
                        
                        $("body").css("cursor", "default");
                        mySwalalert('Gagal Upload Data', 'error');
                        btn.attr('disabled',false);
                        btn.html('Upload');
                        form.reset();
                        getStatus();
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

        function show_file(key_value){

        var url = "<?= cdn_file(); ?>uploads/"+key_value;

        newwindow=window.open(url,'View File','height=720,width=1280');
            if (window.focus) {newwindow.focus()}
        return false;
        }
        </script>