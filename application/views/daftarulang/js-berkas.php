

    <script>
        $(document).ready(function(){
            getStatus();

            $("input[type='file']").on("change", function () {
                if(this.files[0].size > 5000000) {
                    mySwalalert('File Lebih dari 5MB, Silahkan memperkecil ukuran file', 'warning');
                $(this).val('');
                }
            });
        });

        function save(target){
            var form = $('#form_'+target)[0];
            var btn = $('#btnSave_'+target);
            var formData = new FormData(form);

            var nik = $('#nik').val();                    

            $(form).validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($(form).valid()){
                Swal.fire({
                title: 'Anda Yakin File Sudah Benar ?',
                html: "Data yang di upload, tidak dapat di hapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upload it!'
                }).then((result) => {
                    if (result.value) {                    
                        $.ajax({
                            url: "<?php echo cdn_file('file/upload/') ?>"+target,
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

                                    var datajson = {
                                        nik: nik,
                                        target : target,
                                        file_name : objdata.result.file_name
                                    };

                                    $.ajax({
                                        type: "POST",
                                        url: '<?= base_url('daftarulang/ajax_update_file'); ?>',
                                        data: datajson,
                                        success: function (data2) {
                                            $("body").css("cursor", "default");
                                            const objdata2 = JSON.parse(data2);
                                            mySwalalert(objdata2.msg, 'success');
                                            btn.attr('disabled',false);
                                            btn.html('Upload');
                                            getStatus();

                                        },error: function (jqXHR, textStatus, errorThrown){

                                            mySwalalert(objdata2.msg, 'error');
                                            btn.attr('disabled',false);
                                            btn.html('Upload');
                                            form.reset();
                                            getStatus();

                                        }
                                    });
                                } else {

                                    mySwalalert(objdata.msg, 'error');
                                    btn.attr('disabled',false);
                                    btn.html('Upload');
                                    form.reset();
                                    getStatus();

                                }
                                

                            },error: function (jqXHR, textStatus, errorThrown){
                                
                                mySwalalert('Gagal Upload Data', 'error');
                                btn.attr('disabled',false);
                                btn.html('Upload');
                                form.reset();
                                getStatus();
                            },
                        });
                    }
                })
            }else{
                mySwalalert('Anda Belum Memilih File', 'info');
            }
            return false;  
        }

        function show_file(key_value){

            var url = "<?= cdn_file(); ?>uploads/"+key_value;
            
            newwindow=window.open(url,'View File','height=720,width=1280');
                if (window.focus) {newwindow.focus()}
            return false;
        }

        function getStatus()
        {
            $.ajax({
                url : "<?= base_url('berkas/get_status/');?>",
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    
                    $.each( data, function( key, value ) {
                        if (value !== ""){
                            var link = key+"/"+value;
                            if (value == "no_image.jpg"){
                                var ss = 
                                '<center>'
                                    +'<h1><i class="fas fa-check"></i></h3>'
                                    +'<p>Tidak Perlu Upload</p>'
                                +'</center>';
                            } else {
                                var ss = 
                                '<center>'
                                    +'<h1><i class="fas fa-check"></i></h3>'
                                    +'<p>File Sudah Upload</p>'
                                    +'<span class="badge bg-success" onClick="show_file('+"'"+link+"'"+')" type="button">Lihat File</span>'
                                +'</center>';
                            }

                            var keys = "#result_"+key;
                            $(keys).html(ss);
                        }
                    });
                }
            });
        }
        </script>