

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

                                    $("body").css("cursor", "default");
                                    const objdata = JSON.parse(data);
                                    mySwalalert(objdata.msg, 'success');
                                    btn.attr('disabled',false);
                                    btn.html('Upload');
                                    getStatus();

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
            var ses_nik = $("#sesnik").val();
            $.ajax({
                url : "<?= cdn_file('file/get_by_nik/');?>",
                method : "POST",
                async : true,
                data : {nik: ses_nik},
                success: function(data){
                    
                    $.each( data.result, function( key, value ) {
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