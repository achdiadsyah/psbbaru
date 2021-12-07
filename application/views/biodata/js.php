
        <script>
        $(document).ready(function(){

            // Get Data
            $.ajax({
                type: "GET",
                url: '<?= base_url('biodata/ajax_get'); ?>',
                async : true,
                dataType : 'json',
                success: function (data) {
                    $('#checksum').val(data.checksum);
                    $('#nik').val(data.nik).attr('readonly','readonly');
                    $('#no_telepon').val(data.no_telepon);
                    $('#nama').val(data.nama);
                }
            });

            // Get Provinsi
            $.ajax({
                type: "GET",
                url: '<?= base_url('wilayah/ajax_prov'); ?>',
                async : true,
                dataType : 'json',
                success: function (data) {
                    var html = '<option value="">Pilih Provinsi</option>';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    $('#provinsi').html(html);
                }
            });
            
            // Get Kabupaten
            $('#provinsi').on('change', function() {
                $.ajax({
                    type: "GET",
                    url: '<?= base_url('wilayah/ajax_kabupaten/'); ?>'+this.value,
                    async : true,
                    dataType : 'json',
                    success: function (data) {
                        var html = '<option value="">Pilih Kabupaten</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        $('#kabupaten').html(html);
                    }
                });
            });

            // Get Kecamatan
            $('#kabupaten').on('change', function() {
                $.ajax({
                    type: "GET",
                    url: '<?= base_url('wilayah/ajax_kecamatan/'); ?>'+this.value,
                    async : true,
                    dataType : 'json',
                    success: function (data) {
                        var html = '<option value="">Pilih Kecamatan</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        $('#kecamatan').html(html);
                    }
                });
            });

            // Get Desa
            $('#kecamatan').on('change', function() {
                $.ajax({
                    type: "GET",
                    url: '<?= base_url('wilayah/ajax_desa/'); ?>'+this.value,
                    async : true,
                    dataType : 'json',
                    success: function (data) {
                        var html = '<option value="">Pilih Desa</option>';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        }
                        $('#desa').html(html);
                    }
                });
            });

        });

        function save()
        {   
            $('#form-biodata').validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                }
            });
            if($('#form-biodata').valid()){
                $('#btnsave').text('Saving...'); //change button text
                $('#btnsave').attr('disabled',true); //set button disable
                
                var jsonObj = $('#form-biodata').serialize();
                
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('biodata/ajax_add'); ?>',
                    data: jsonObj,
                    success: function (data,status,xhr) {
                        mySwalalert('Berhasil Menyimpan Data', 'success');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                        $('#form-biodata')[0].reset();
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        mySwalalert('Gagal Menyimpan Data', 'error');
                        $('#btnsave').text('Save');
                        $('#btnsave').attr('disabled',false);
                    }
                });
            }else{
                mySwalalert('Periksa Kembali Form Laporan anda, ada yang belum lengkap', 'info');
            }
            return false;
        }

        </script>