    
    <script src="<?= base_url('assets/js/'); ?>party.min.js"></script>
    <script>
        party.element(document.getElementById("lulus"), {
            count: 80,
            countVariation: 1,
            angleSpan: 80,
            yVelocity: -300,
            yVelocityVariation: 1,
            rotationVelocityLimit: 6,
            scaleVariation: 0.8
        });

        function alih_jalur(nik)
        {
            Swal.fire({
                title: 'Anda Yakin ?',
                html: "Beralih Ke Jalur REGULER",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, move it!'
            }).then((result) => {
                if (result.value) {
                    // ajax delete data to database
                    $.ajax({
                        url : "<?php echo base_url('pengumuman/ajax_beralih') ?>/"+nik,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            mySwalalert('Berhasi Beralih Jurusan, Lanjutkan Pembayaran di Menu <b>PEMBAYARAN</b>', 'success');
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            mySwalalert('Gagal Beralih Jurusan', 'error');
                        }
                    });
                }
            })
        }
    </script>