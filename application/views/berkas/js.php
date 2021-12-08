    
    <script>
        $(document).ready(function(){
            getStatus();
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
                $.ajax({
                    url: "<?php echo base_url('berkas/ajax_upload/') ?>"+target,
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
                    },
                    success: function(data){
                        const obj = JSON.parse(data);
                        var res = obj.message;
                        if (obj.status == true){
                            mySwalalert('Berhasil Upload Data', 'success');
                            btn.attr('disabled',false);
                            btn.html('Upload');
                            getStatus();
                        } else {
                            mySwalalert('Gagal Upload Data', 'error');
                            btn.attr('disabled',false);
                            btn.html('Upload');
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


        function delete_file(key_value){
            var explode = key_value.split("/");
            Swal.fire({
                title: 'Anda Yakin Hapus File ini ?',
                html: "Data yang di hapus, tidak dapat di pulihkan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {                    
                    $.ajax({
                        url : "<?= base_url('berkas/delete_file/') ?>"+key_value,
                        type: "POST",
                        data:{
                            folder: explode[0],
                            file: explode[1],
                        },
                        dataType: "JSON",
                        success: function(data)
                        {
                            if(data.status == true){
                                mySwalalert('Berhasil Menghapus Data', 'success');
                                location.reload();
                            } else {
                                mySwalalert('Gagal Menghapus Data', 'error');
                                location.reload();
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            mySwalalert('Gagal Menghapus Data', 'error');
                            location.reload();
                        }
                    });
                }
            })
        }

        function show_file(key_value){
            $('#modalImage').modal('show');
            var myImageLink = "<?= base_url('uploads/');?>"+key_value;
            $(".modal-body #img_link").attr("src", myImageLink);
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
                                '<div class="input-group">'
                                    +'<input type="text" class="form-control" value="Tidak Perlu Upload" readonly>'
                                +'</div>';
                            } else {
                                var ss = 
                                '<div class="input-group">'
                                    +'<button class="btn btn-success" type="button" onClick="show_file('+"'"+link+"'"+')">Lihat File</button>'
                                    +'<input type="text" class="form-control" value="File Sudah Di Upload" readonly>'
                                    +'<button class="btn btn-danger" type="button" onClick="delete_file('+"'"+link+"'"+')">Hapus File</button>'
                                +'</div>';
                            }

                            var keys = "#result_"+key;
                            $(keys).html(ss);
                        }
                    });
                }
            });
        }
        </script>